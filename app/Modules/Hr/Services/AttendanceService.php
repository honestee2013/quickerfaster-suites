<?php

namespace App\Modules\Hr\Services;


use App\Modules\Hr\Models\DailyAttendance;
use App\Modules\Hr\Models\EmployeeProfile;
use App\Modules\Hr\Models\Shift; // Assuming you have a Shift model
use App\Modules\Hr\Models\AttendanceSession;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
// Consider custom exceptions:
// use App\Exceptions\ShiftNotFoundException;
// use App\Exceptions\AttendanceSequenceException;

use App\Modules\Hr\Models\DailyEarning;
use App\Modules\Hr\Models\RoleSchedule; // Import RoleSchedule

use Illuminate\Support\Facades\Log; // For logging warnings/errors


class AttendanceService
{
    /*protected PayrollCalculatorService $payrollCalculator;

    public function __construct(PayrollCalculatorService $payrollCalculatorService)
    {
        $this->payrollCalculator = $payrollCalculatorService;
    }*/


public function record(array $data): AttendanceSession
{
    return DB::transaction(function () use ($data) {

        $employeeId     = $data['employee_id'];
        $attendanceDate = $data['attendance_date'] ?? now()->toDateString();
        $checkInTime    = $data['check_in_time'] ?? null;
        $checkOutTime   = $data['check_out_time'] ?? null;

        if ($checkInTime)
            $checkInTime = Carbon::parse($checkInTime)->format('H:i:s');
        if ($checkOutTime)
            $checkOutTime = Carbon::parse($checkOutTime)->format('H:i:s');



        $employeeProfile = EmployeeProfile::with(['shift', 'role']) //, 'roleSchedules.shift'])
            ->where('employee_id', $employeeId)
            ->firstOrFail();


        // Load RoleSchedule
        $roleSchedule = $this->getRoleScheduleForDate($employeeProfile, $attendanceDate);


        if ($checkInTime && !$checkOutTime) {
            $session = AttendanceSession::firstOrCreate(
                [
                    'employee_id'     => $employeeId,
                    'attendance_date' => $attendanceDate,
                    'check_in_time'   => $checkInTime,
                ],
                [
                    'status'        => 'pending',
                    'device_id'     => $data['device_id'] ?? null,
                    'device_name'   => $data['device_name'] ?? null,
                    'location_name' => $data['location_name'] ?? null,
                    'timezone'      => $data['timezone'] ?? null,
                    'latitude'      => $data['latitude'] ?? null,
                    'longitude'     => $data['longitude'] ?? null,
                    'notes'         => $data['notes'] ?? null,
                ]
            );


            $this->validateCheckInTime($session, $roleSchedule, $employeeProfile);
            $this->updateAttendanceWithScheduledTimes($session, $roleSchedule, $employeeProfile);
            return $session; // response()->json(['message' => 'Check-in recorded', 'data' => $session]);
        }

        if ($checkInTime && $checkOutTime) {
            $session = AttendanceSession::firstOrCreate(
                [
                    'employee_id'     => $employeeId,
                    'attendance_date' => $attendanceDate,
                    'check_in_time'   => $checkInTime,
                ]
            );

            $session->update([
                'check_out_time' => $checkOutTime,
                'status'         => 'completed',
                'notes'          => $data['notes'] ?? $session->notes,
            ]);

            $this->handleCheckOut($session, $data);
            $this->validateCheckOutTime($session, $roleSchedule, $employeeProfile);
            $this->updateAttendanceWithScheduledTimes($session, $roleSchedule, $employeeProfile);
            return  $session; //response()->json(['message' => 'Check-out recorded', 'data' => $session]);
        }

        return null; // response()->json(['error' => 'Invalid data'], 422);
    });
}






    protected function getRoleScheduleForDate(EmployeeProfile $employeeProfile, string $dateString): ?RoleSchedule
    {
        $date = Carbon::parse($dateString);
        $dayOfWeekIso = $date->dayOfWeekIso; // 1=Mon, ..., 7=Sun

        return RoleSchedule::with('shift') // Eager load the shift related to the role_schedule
                            ->where('role_id', $employeeProfile->role_id)
                            ->where('shift_id', $employeeProfile->shift_id) // Assuming shift_id is directly on EmployeeProfile
                            //->where('day_of_week_id', $dayOfWeekIso)
                            /*->where('is_active', true)
                            ->where('effective_date', '<=', $dateString)
                            ->where(function ($query) use ($dateString) {
                                $query->whereNull('end_date')
                                      ->orWhere('end_date', '>=', $dateString);
                            })*/
                            ->first();
    }



protected function updateAttendanceWithScheduledTimes(AttendanceSession $attendance, ?RoleSchedule $roleSchedule, EmployeeProfile $employeeProfile): void
{
    [$scheduledStart, $scheduledEnd, $isOvernight] = $this->getEffectiveShiftTimes(
        Carbon::parse($attendance->attendance_date)->startOfDay(),
        $roleSchedule
    );

    if (!$roleSchedule) {
        $scheduledStart = $employeeProfile->shift->start_time;
        $scheduledEnd   = $employeeProfile->shift->end_time;
    }

    $attendance->update([
        'scheduled_start' => Carbon::parse($scheduledStart)->format('H:i:s'),
        'scheduled_end'   => Carbon::parse($scheduledEnd)->format('H:i:s'),
    ]);
}



protected function validateCheckInTime(AttendanceSession $checkIn, ?RoleSchedule $roleSchedule, EmployeeProfile $employeeProfile): void
{

    [$scheduledStart, $scheduledEnd, $isOvernight] = $this->getEffectiveShiftTimes(
        Carbon::parse($checkIn->attendance_date)->startOfDay(),
        $roleSchedule
    );

    if (!$roleSchedule) {
        $scheduledStart = Carbon::parse($employeeProfile->shift->start_time);
        $scheduledEnd   = Carbon::parse($employeeProfile->shift->end_time);
    }

    $lateGraceMinutes = $roleSchedule?->late_grace_minutes ?? 0;

    $actualCheckIn = Carbon::parse($checkIn->check_in_time);
    $difference = $scheduledStart->diffInMinutes($actualCheckIn, false);

    $status = match (true) {
        $difference < -$lateGraceMinutes => 'early',
        $difference >= -$lateGraceMinutes && $difference <= $lateGraceMinutes => 'on_time',
        $difference > $lateGraceMinutes => 'late',
        default => null,
    };

    $checkIn->update([
        'check_in_status'       => $status,
        'check_in_diff_mins' => $difference,
    ]);

    //dd($status, $difference);
}


    protected function getEffectiveShiftTimes(Carbon $baseDate, ?RoleSchedule $roleSchedule): array
    {
        $shiftStartTime = null;
        $shiftEndTime = null;
        $isOvernight = $roleSchedule?->shift?->is_overnight?? false;

        if ($roleSchedule) {
            // Prioritize override times from RoleSchedule
            if ($roleSchedule->override_start_time && $roleSchedule->override_end_time) {
                $shiftStartTime = Carbon::parse($roleSchedule->override_start_time);
                $shiftEndTime = Carbon::parse($roleSchedule->override_end_time);
            } else if ($roleSchedule->shift) {
                // Fallback to linked Shift times
                $shiftStartTime = Carbon::parse($roleSchedule->shift->start_time);
                $shiftEndTime = Carbon::parse($roleSchedule->shift->end_time);
            }
        }

        if (!$shiftStartTime || !$shiftEndTime) {
            // Fallback if no roleSchedule or shift times are found.
            // This case should ideally be prevented or handled with a default.
            // For now, return default Carbon times at start/end of day or throw error.
            Log::warning("No effective shift times found for date {$baseDate->toDateString()} and employee.");
            return [
                $baseDate->copy()->startOfDay(),
                $baseDate->copy()->endOfDay(),
                false // Assuming not overnight for a fallback
            ];
        }

        $effectiveStart = $baseDate->copy()->setTimeFromTimeString($shiftStartTime->format('H:i:s'));
        $effectiveEnd = $baseDate->copy()->setTimeFromTimeString($shiftEndTime->format('H:i:s'));

        // Adjust for overnight shift if applicable (either from override or shift flag)
        if ($isOvernight || ($roleSchedule && $roleSchedule->override_start_time && $roleSchedule->override_end_time && $shiftStartTime->greaterThan($shiftEndTime))) {
            $effectiveEnd->addDay();
        }

        return [$effectiveStart, $effectiveEnd, $isOvernight];
    }



protected function validateCheckOutTime(
    AttendanceSession $checkOut,
    ?RoleSchedule $roleSchedule,
    EmployeeProfile $employeeProfile
): void {

    // Resolve effective shift times based on attendance_date
    [$scheduledStart, $scheduledEnd, $isOvernight] = $this->getEffectiveShiftTimes(
        Carbon::parse($checkOut->attendance_date)->startOfDay(),
        $roleSchedule
    );

    // If no RoleSchedule, fallback to employee profile shift
    if (!$roleSchedule) {
        $scheduledStart = Carbon::parse($employeeProfile->shift->start_time);
        $scheduledEnd   = Carbon::parse($employeeProfile->shift->end_time);
        $isOvernight    = $scheduledEnd->lessThan($scheduledStart);
    }

    // Extend scheduledEnd into the next day if overnight shift
    /*if ($isOvernight) { Already handled by getEffectiveShiftTimes()
        $scheduledEnd = $scheduledEnd->copy()->addDay();
    }*/

    $actualCheckOut = Carbon::parse($checkOut->check_out_time);
    $earlyLeaveGraceMinutes = $roleSchedule?->early_leave_grace_minutes ?? 5;

    // Compare difference (negative = early, positive = late)
    $difference = $scheduledEnd->diffInMinutes($actualCheckOut, false);

    $status = match (true) {
        $difference < -$earlyLeaveGraceMinutes => 'early_checkout',
        $difference >= -$earlyLeaveGraceMinutes && $difference <= $earlyLeaveGraceMinutes => 'on_time_checkout',
        $difference > $earlyLeaveGraceMinutes => 'late_checkout',
        default => null,
    };

    // Overtime check (only if roleSchedule defines overtime_after_hours)
    if (!empty($roleSchedule?->overtime_after_hours) && $roleSchedule->overtime_after_hours > 0) {
        if (!$isOvernight)
            $overtimeThreshold = $scheduledEnd->copy()->addHours($roleSchedule->overtime_after_hours);
        else
            $overtimeThreshold = $scheduledEnd;

        if ($actualCheckOut->greaterThan($overtimeThreshold)) {
            $status = 'overtime';
        }
    }

    $checkOut->update([
        'check_out_status'    => $status,
        'check_out_diff_mins' => $difference,
    ]);
}









/*protected function handleCheckOut(AttendanceSession $session, array $data): void
{
    $checkOutTime = $data['check_out_time'] ?? now();

    // 1. Save checkout time & session minutes
    $session->check_out_time = $checkOutTime;
    $session->session_minutes = Carbon::parse($session->check_in_time)
        ->diffInMinutes(Carbon::parse($checkOutTime));
    $session->save();

    // 2. Aggregate total minutes for the day (per employee & date)
    $attendanceDate = $session->attendance_date;
    $employeeId = $session->employee_id;

    $totalMinutesToday = AttendanceSession::where('employee_id', $employeeId)
        ->whereDate('attendance_date', $attendanceDate)
        ->sum('session_minutes');

    $totalHoursToday = round($totalMinutesToday / 60, 2);

    // 3. Fetch employee profile with relations (shift/role/schedules)
    $employeeProfile = EmployeeProfile::with(['shift', 'role']) //, 'roleSchedules.shift'])
        ->where('employee_id', $employeeId)
        ->firstOrFail();


    // 4. Calculate earnings (delegated to service)
    $earnings = app(DailyEarningsService::class)
        ->calculate($employeeProfile, $totalHoursToday);

    // 5. Persist/update daily earnings record
    DailyEarning::updateOrCreate(
        [
            'employee_id' => $employeeId,
            'work_date'   => $attendanceDate,
        ],
        [
            'regular_hours'    => $earnings['regular_hours'],
            'overtime_hours'   => $earnings['overtime_hours'],
            'total_hours'      => $earnings['total_hours'],
            'regular_amount'   => $earnings['regular_amount'],
            'overtime_amount'  => $earnings['overtime_amount'],
            'total_amount'     => $earnings['total_amount'],
        ]
    );
}*/



protected function handleCheckOut(AttendanceSession $session, array $data): void
{
    $checkOutTime = $session->check_out_time ?? now();

    // 1. Save checkout time & session minutes
    //$session->check_out_time = $checkOutTime;
    $session->session_minutes = Carbon::parse($session->check_in_time)
        ->diffInMinutes(Carbon::parse($checkOutTime));
    $session->save();

    // 2. Aggregate total minutes for the day (per employee & date)
    $attendanceDate = $session->attendance_date;
    $employeeId = $session->employee_id;

    $totalMinutesToday = AttendanceSession::where('employee_id', $employeeId)
        ->whereDate('attendance_date', $attendanceDate)
        ->sum('session_minutes');

    $totalHoursToday = round($totalMinutesToday / 60, 2);

    // 3. Fetch employee profile with relations (shift/role/schedules)
    $employeeProfile = EmployeeProfile::with(['shift', 'role']) //, 'roleSchedules.shift'])
        ->where('employee_id', $employeeId)
        ->firstOrFail();


    // 4. Calculate earnings (delegated to service)
    $earnings = app(DailyEarningsService::class)
        ->calculate($employeeProfile, $totalHoursToday);

    // 5. Persist/update daily earnings record
    DailyEarning::updateOrCreate(
        [
            'employee_id' => $employeeId,
            'work_date'   => $attendanceDate,
        ],
        [
            'regular_hours'    => $earnings['regular_hours'],
            'overtime_hours'   => $earnings['overtime_hours'],
            'total_hours'      => $earnings['total_hours'],
            'regular_amount'   => $earnings['regular_amount'],
            'overtime_amount'  => $earnings['overtime_amount'],
            'total_amount'     => $earnings['total_amount'],
        ]
    );
}







    private function adjustOverHours(DailyEarning $earning, $employeeId): DailyEarning
    {
        $employeeProfile = EmployeeProfile::where('employee_id', $employeeId)->first();

        $start = Carbon::parse($employeeProfile->shift->start_time);
        $end = Carbon::parse($employeeProfile->shift->end_time);

        $shiftDurationMinutes = $start->diffInMinutes($end);
        $shiftDurationHours = $shiftDurationMinutes / 60;

        if ($earning->total_hours >= $shiftDurationHours) {
            $earning->overtime_hours = $earning->total_hours - $shiftDurationHours;
            $earning->regular_hours = $shiftDurationHours;
        }

        return $earning;
    }




    // `determineShiftWorkDate` stays as is, using Shift model's start/end times for now,
    // as it determines the *payroll day* based on the underlying shift pattern.
    // Overrides affect calculation, but not necessarily which calendar day is considered the "work day".
    protected function determineShiftWorkDate(Carbon $checkInTime, ?Shift $assignedShift): Carbon
    {
        if (!$assignedShift) {
            return $checkInTime->copy()->startOfDay();
        }

        $shiftStartTime = Carbon::parse($assignedShift->start_time);
        $shiftEndTime = Carbon::parse($assignedShift->end_time);

        if (!$assignedShift->is_overnight) { // Use the new flag
            return $checkInTime->copy()->startOfDay();
        }

        // Overnight shift logic: work date is the day shift started
        $checkInTimeOnly = $checkInTime->copy()->format('H:i:s');
        if ($checkInTimeOnly < $assignedShift->end_time) { // If check-in is "next day" portion
            return $checkInTime->copy()->subDay()->startOfDay();
        } else { // If check-in is "start day" portion
            return $checkInTime->copy()->startOfDay();
        }
    }
}

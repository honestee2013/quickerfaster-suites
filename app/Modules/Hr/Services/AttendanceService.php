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

        $employeeId = $data['employee_id'];
        

        $employeeProfile = EmployeeProfile::where('employee_id', $employeeId)
            ->with(['shift', 'user.roles'])
            ->first();

        if (!$employeeProfile) {
            throw new InvalidArgumentException("Employee with ID {$employeeId} not found.");
        }


        if (!isset($data["check_in_time"]) && !isset($data["check_out_time"])) {
            throw new InvalidArgumentException("Invalid attendance type. neither check_in_time nor check_out_time was provided");
        }

        $sessionDate = $data["attendance_date"]?? today()->format('Y-m-d');

        $session = null;
        if (isset($data["check_in_time"])) {
            // 1. Create new session (open session)
            $session = AttendanceSession::create([
                'employee_id' => $employeeId,
                'attendance_date' => $sessionDate,
                'check_in_time' => $data["check_in_time"],
            ]);

        }

        if (isset($data["check_out_time"])) {
            // 2. Find last open session for today
            $session = AttendanceSession::where('employee_id', $employeeId)
                ->where('attendance_date', $sessionDate)
                ->whereNull('check_out_time')
                ->orderBy('check_in_time', 'desc')
                ->first();

            if (!$session) {
                throw new InvalidArgumentException("No active session found for checkout.");
            }

            // 3. Close session & update earnings
            $this->handleCheckOut($session, $data);

        }

        if ($session)
            return $session;
        else
            throw new InvalidArgumentException("Unhandled attendance type: check_in_time/check_out_time");
        
    });
}



    /**
     * Retrieves the RoleSchedule for a given employee and date.
     * This method is crucial for getting the correct rules.
     */
    protected function getRoleScheduleForDate(EmployeeProfile $employeeProfile, string $dateString): ?RoleSchedule
    {
        $date = Carbon::parse($dateString);
        $dayOfWeekIso = $date->dayOfWeekIso; // 1=Mon, ..., 7=Sun

        return RoleSchedule::with('shift') // Eager load the shift related to the role_schedule
                            ->where('role_id', $employeeProfile->role_id)
                            ->where('shift_id', $employeeProfile->shift_id) // Assuming shift_id is directly on EmployeeProfile
                            ->where('day_of_week_id', $dayOfWeekIso)
                            /*->where('is_active', true)
                            ->where('effective_date', '<=', $dateString)
                            ->where(function ($query) use ($dateString) {
                                $query->whereNull('end_date')
                                      ->orWhere('end_date', '>=', $dateString);
                            })*/
                            ->first();
    }


    /**
     * Gets the effective start and end times considering RoleSchedule overrides and Shift defaults.
     *
     * @return array [Carbon $effectiveStart, Carbon $effectiveEnd, bool $isOvernight]
     */
    protected function getEffectiveShiftTimes(Carbon $baseDate, ?RoleSchedule $roleSchedule): array
    {
        $shiftStartTime = null;
        $shiftEndTime = null;
        $isOvernight = false;

        if ($roleSchedule) {
            // Prioritize override times from RoleSchedule
            if ($roleSchedule->override_start_time && $roleSchedule->override_end_time) {
                $shiftStartTime = Carbon::parse($roleSchedule->override_start_time);
                $shiftEndTime = Carbon::parse($roleSchedule->override_end_time);
            } else if ($roleSchedule->shift) {
                // Fallback to linked Shift times
                $shiftStartTime = Carbon::parse($roleSchedule->shift->start_time);
                $shiftEndTime = Carbon::parse($roleSchedule->shift->end_time);
                $isOvernight = $roleSchedule->shift->is_overnight; // Use the flag from shift
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


    /**
     * Updates the attendance record with calculated scheduled start and end times based on the RoleSchedule.
     */
    protected function updateAttendanceWithScheduledTimes(DailyAttendance $attendance, ?RoleSchedule $roleSchedule, EmployeeProfile $employeeProfile): void
    {
        list($scheduledStart, $scheduledEnd, $isOvernight) = $this->getEffectiveShiftTimes(
            $attendance->attendance_time->copy()->startOfDay(), // Use attendance date as base
            $roleSchedule
        );

        if (!$roleSchedule) {
            $scheduledStart = $employeeProfile->shift->start_time;
            $scheduledEnd = $employeeProfile->shift->end_time;
        }

        $attendance->update([
            'scheduled_start' => Carbon::parse($scheduledStart)->format('H:i:s'),
            'scheduled_end' => Carbon::parse($scheduledEnd)->format('H:i:s'),
        ]);
    }





protected function validateCheckInTime(AttendanceSession $session, ?RoleSchedule $roleSchedule, EmployeeProfile $employeeProfile): void
{
    list($scheduledStart, $scheduledEnd, $isOvernight) = $this->getEffectiveShiftTimes(
        $session->check_in_time->copy()->startOfDay(),
        $roleSchedule
    );

    if (!$roleSchedule) {
        $scheduledStart = Carbon::parse($employeeProfile->shift->start_time);
        $scheduledEnd   = Carbon::parse($employeeProfile->shift->end_time);
    }

    $lateGraceMinutes = $roleSchedule ? $roleSchedule->late_grace_minutes : 0;

    $actualCheckIn = $session->check_in_time;
    $difference    = $scheduledStart->diffInMinutes($actualCheckIn, false);

    $status = match (true) {
        $difference < -$lateGraceMinutes => 'early',
        $difference >= -$lateGraceMinutes && $difference <= $lateGraceMinutes => 'on_time',
        $difference > $lateGraceMinutes => 'late',
        default => null,
    };

    $session->update([
        'check_in_status'    => $status,
        'check_in_diff_mins' => $difference,
    ]);
}

protected function validateCheckOutTime(AttendanceSession $session, ?RoleSchedule $roleSchedule, EmployeeProfile $employeeProfile): void
{
    list($scheduledStart, $scheduledEnd, $isOvernight) = $this->getEffectiveShiftTimes(
        $session->check_out_time->copy()->startOfDay(),
        $roleSchedule
    );

    if (!$roleSchedule) {
        $scheduledStart = Carbon::parse($employeeProfile->shift->start_time);
        $scheduledEnd   = Carbon::parse($employeeProfile->shift->end_time);
    }

    if ($isOvernight && $session->check_out_time->isSameDay($scheduledStart->copy()->addDay())) {
        $scheduledEnd = $scheduledEnd->copy()->addDay();
    }

    $actualCheckOut        = $session->check_out_time;
    $earlyLeaveGraceMinutes = $roleSchedule ? $roleSchedule->early_leave_grace_minutes : 5;

    $difference = Carbon::parse($scheduledEnd)->diffInMinutes($actualCheckOut, false);

    $status = match (true) {
        $difference < -$earlyLeaveGraceMinutes => 'early_checkout',
        $difference >= -$earlyLeaveGraceMinutes && $difference <= $earlyLeaveGraceMinutes => 'on_time_checkout',
        $difference > $earlyLeaveGraceMinutes => 'late_checkout',
        default => null,
    };

    // Overtime check
    if (!empty($roleSchedule?->overtime_after_hours)) {
        $overtimeThreshold = $scheduledEnd->copy()->addHours($roleSchedule->overtime_after_hours);
        if ($actualCheckOut->greaterThan($overtimeThreshold)) {
            $status = 'overtime';
        }
    }

    $session->update([
        'check_out_status'    => $status,
        'check_out_diff_mins' => $difference,
    ]);
}





protected function handleCheckOut(AttendanceSession $session, $data)
{
    $checkOutTime = $data["check_out_time"]; // could also default to now()

    // 1. Save checkout time & session minutes
    $session->check_out_time = $checkOutTime;
    $session->session_minutes = Carbon::parse($session->check_in_time)
        ->diffInMinutes($checkOutTime);
    $session->save();

    // 2. Calculate total hours for the day
    $attendanceDate = $session->attendance_date;
    $employeeId = $session->employee_id;

    $totalMinutesToday = AttendanceSession::where('employee_id', $employeeId)
        ->where('attendance_date', $attendanceDate)
        ->sum('session_minutes');

    $totalHoursToday = round($totalMinutesToday / 60, 2);

    // 3. Get employee profile
    $employeeProfile = EmployeeProfile::with(['shift', 'role', 'roleSchedules'])
        ->where('employee_id', $employeeId)
        ->firstOrFail();

    // 4. Use DailyEarningsService to calculate pay breakdown
    $earnings = app(DailyEarningsService::class)
        ->calculate($employeeProfile, $totalHoursToday);

    // 5. Save/update daily earnings record
    DailyEarning::updateOrCreate(
        [
            'employee_id' => $employeeId,
            'work_date'        => $attendanceDate
        ],
        [
            'regular_hours'   => $earnings['regular_hours'],
            'overtime_hours'  => $earnings['overtime_hours'],
            'total_hours'     => $earnings['total_hours'],
            'regular_amount'     => $earnings['regular_amount'],
            'overtime_amount'    => $earnings['overtime_amount'],
            'total_amount'       => $earnings['total_amount']
        ]
    );
}







    /*protected function handleCheckOut(DailyAttendance $checkout): void
    {
        $employeeId = $checkout->employee_id;

        $checkIn = DailyAttendance::where('employee_id', $employeeId)
            ->where('attendance_type', 'check-in')
            ->where('attendance_time', '<', $checkout->attendance_time)
            //->whereNull('checkin_id')
            ->orderBy('attendance_time', 'desc')
            ->first();

        if (!$checkIn) {
            Log::warning("No matching check-in found for employee ID {$employeeId} at {$checkout->attendance_time}");
            return;
        }

        $checkout->update(['checkin_id' => $checkIn->id]);

        $employeeProfile = EmployeeProfile::where('employee_id', $employeeId)
                                            ->with(['shift', 'user.roles'])
                                            ->first();

        if (!$employeeProfile) {
            Log::error("EmployeeProfile not found for employee ID: {$employeeId} during checkout calculation.");
            return;
        }

        // Pass the actual roleSchedule to the payroll calculator
        $roleSchedule = $this->getRoleScheduleForDate($employeeProfile, $checkIn->attendance_time);


        // Determine the work_date for aggregation (important for overnight shifts)
        $workDate = $this->determineShiftWorkDate(Carbon::parse($checkIn->attendance_time), $employeeProfile->shift); // Still relies on shift for work_date logic
        // Use the PayrollCalculatorService to get paid minutes
        $calculatedHours = $this->payrollCalculator->calculatePaidHours($checkIn, $checkout, $employeeProfile, $roleSchedule);


        $regularMinutes = $calculatedHours['regular_minutes'];
        $overtimeMinutes = $calculatedHours['overtime_minutes'];


        $hourlyRate = $employeeProfile->hourly_rate ?? 100;
        $overtimeRateMultiplier = 1; //this should be configurable
        if (!$roleSchedule?->overtime_after_hours) {
            $overtimeMinutes = 0;
        } else {
            $overtimeRateMultiplier = $roleSchedule->overtimeRateMultiplier? $roleSchedule->overtimeRateMultiplier: 1; //this should be configurable
        }


        $regularHours = round($regularMinutes / 60, 2);
        $overtimeHours = round($overtimeMinutes / 60, 2);
        $totalPaidHours = $regularHours + $overtimeHours;

        $regularAmount = $regularHours * $hourlyRate;
        $overtimeAmount = $overtimeHours * ($hourlyRate * $overtimeRateMultiplier);
        $totalAmountEarned = $regularAmount + $overtimeAmount;

        $earning = DailyEarning::firstOrNew([
            'employee_id' => $employeeId,
            'work_date' => $workDate->toDateString(),
        ]);


        $earning->regular_hours = ($earning->regular_hours ?? 0) + $regularHours;
        $earning->overtime_hours = ($earning->overtime_hours ?? 0) + $overtimeHours;
        $earning->total_hours = ($earning->total_hours ?? 0) + $totalPaidHours;


        if (!$roleSchedule?->overtime_after_hours) {
            // Handle overtime by default when roleSchedule is not configure by admin
            // $earning = $this->adjustOverHours($earning, $employeeId);
        }



        $earning->regular_amount = ($earning->regular_amount ?? 0) + $regularAmount;
        $earning->overtime_amount = ($earning->overtime_amount ?? 0) + $overtimeAmount;
        $earning->total_amount = ($earning->total_amount ?? 0) + $totalAmountEarned;

        $earning->save();
    }*/


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

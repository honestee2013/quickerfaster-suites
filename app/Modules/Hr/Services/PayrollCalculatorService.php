<?php

namespace App\Modules\Hr\Services;


use App\Modules\Hr\Models\DailyAttendance;
use App\Modules\Hr\Models\EmployeeProfile;
use App\Modules\Hr\Models\RoleSchedule;
use App\Modules\Hr\Models\BreakRule;
use Carbon\Carbon;


use Illuminate\Support\Facades\Log; // For logging warnings/errors

class PayrollCalculatorService
{
    /**
     * Calculates the paid hours (regular and overtime) for a given check-in/check-out pair,
     * applying role schedules and break rules.
     *
     * @param DailyAttendance $checkIn
     * @param DailyAttendance $checkOut
     * @param EmployeeProfile $employeeProfile
     * @param RoleSchedule|null $roleSchedule The specific RoleSchedule for the period, passed from AttendanceService
     * @return array Contains 'regular_minutes', 'overtime_minutes', 'unpaid_break_minutes'
     */
public function calculatePaidHours($checkIn, $checkOut, $employeeProfile, $roleSchedule): array
{
    if (!$checkIn || !$checkOut || $checkIn->check_status === 'invalid' || $checkOut->check_status === 'invalid') {
        return [
            'work_minutes' => 0,
            'overtime_minutes' => 0,
            'paid_minutes' => 0,
        ];
    }




    // Handle time crossing midnight
    $checkInTime = Carbon::parse($checkIn->attendance_time);
    $checkOutTime = Carbon::parse($checkOut->attendance_time);

    if ($checkOutTime->lessThan($checkInTime)) {
        $checkOutTime->addDay();
    }

    $totalWorkMinutes = $checkInTime->diffInMinutes($checkOutTime);

    if (!$roleSchedule) {
        return $this->calculateBaseOnEmployeeProfileShift($checkIn, $checkOut, $employeeProfile);
    }



    // Apply late grace
    $shiftStartTime = $checkInTime->copy()->startOfDay()->setTimeFromTimeString($roleSchedule->override_start_time ?? '08:00:00');
    $graceStart = $shiftStartTime->copy()->addMinutes($roleSchedule->late_grace_minutes ?? 0);
    if ($checkInTime->gt($graceStart)) {
        $lateMinutes = $checkInTime->diffInMinutes($shiftStartTime);
    } else {
        $lateMinutes = 0;
    }

    // Apply early leave grace
    $shiftEndTime = $checkInTime->copy()->startOfDay()->setTimeFromTimeString($roleSchedule->override_end_time ?? '17:00:00');
    if ($shiftEndTime->lessThan($shiftStartTime)) {
        $shiftEndTime->addDay(); // Overnight shift
    }
    $graceEnd = $shiftEndTime->copy()->subMinutes($roleSchedule->early_leave_grace_minutes ?? 0);
    if ($checkOutTime->lt($graceEnd)) {
        $earlyLeaveMinutes = $shiftEndTime->diffInMinutes($checkOutTime);
    } else {
        $earlyLeaveMinutes = 0;
    }

    // Subtract break time (if any)
    $breakMinutes = 0;
    if ($roleSchedule->break_rule) {
        $breakMinutes = $roleSchedule->break_rule->total_break_minutes ?? 0;
    }

    // Final paid minutes
    $paidMinutes = max($totalWorkMinutes - $breakMinutes - $lateMinutes - $earlyLeaveMinutes, 0);

    // Overtime logic
    $overtimeAfter = $roleSchedule->overtime_after_hours ? $roleSchedule->overtime_after_hours * 60 : null;
    $maxOvertime = $roleSchedule->max_paid_overtime_hours ? $roleSchedule->max_paid_overtime_hours * 60 : null;
    $maxDaily = $roleSchedule->max_daily_hours? $roleSchedule->max_daily_hours * 60 : $shiftStartTime->diffInMinutes($shiftEndTime);;

    $overtimeMinutes = 0;
    if ($overtimeAfter && $paidMinutes > $overtimeAfter) {
        $overtimeMinutes = $paidMinutes - $overtimeAfter;
        if ($maxOvertime) {
            $overtimeMinutes = min($overtimeMinutes, $maxOvertime);
        }
    }

    // Enforce max daily cap
    if ($maxDaily && $paidMinutes > $maxDaily) {
        $paidMinutes = $maxDaily;
    }

    return [
        'work_minutes' => $totalWorkMinutes,
        'overtime_minutes' => $overtimeMinutes,
        'paid_minutes' => $paidMinutes,
    ];
}





    /**
     * Helper method to get effective start and end times for a schedule,
     * prioritizing role_schedule overrides over shift defaults.
     *
     * @param Carbon $baseDate The date component to combine with time strings.
     * @param RoleSchedule|null $roleSchedule The RoleSchedule object.
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
                // For overrides, we must determine if it's overnight based on the override times themselves
                if ($shiftStartTime->greaterThan($shiftEndTime)) {
                    $isOvernight = true;
                }
            } else if ($roleSchedule->shift) {
                // Fallback to linked Shift times
                $shiftStartTime = Carbon::parse($roleSchedule->shift->start_time);
                $shiftEndTime = Carbon::parse($roleSchedule->shift->end_time);
                $isOvernight = $roleSchedule->shift->is_overnight; // Use the flag from shift
            }
        }

        if (!$shiftStartTime || !$shiftEndTime) {
            // This should ideally be handled by ensuring a roleSchedule always exists or by strict validation.
            // As a last resort, return a default range or throw an exception.
            Log::warning("No effective shift times found for date {$baseDate->toDateString()} in PayrollCalculatorService.");
            return [$baseDate->copy()->startOfDay(), $baseDate->copy()->endOfDay(), false];
        }

        $effectiveStart = $baseDate->copy()->setTimeFromTimeString($shiftStartTime->format('H:i:s'));
        $effectiveEnd = $baseDate->copy()->setTimeFromTimeString($shiftEndTime->format('H:i:s'));

        if ($isOvernight) {
            $effectiveEnd->addDay();
        }

        return [$effectiveStart, $effectiveEnd, $isOvernight];
    }

    // Keep calculateUnpaidBreakMinutes as is
    protected function calculateUnpaidBreakMinutes(int $totalWorkedMinutes, BreakRule $breakRule): int
    {
        if ($breakRule->break_type === 'paid') {
            return 0; // No unpaid breaks
        }

        if ($totalWorkedMinutes < $breakRule->min_shift_minutes) {
            return 0; // Not enough hours for a mandatory break
        }

        $unpaidBreaks = 0;

        if ($breakRule->max_breaks > 0 && $breakRule->break_interval_minutes) {
            $intervalThreshold = $breakRule->break_interval_minutes;
            $durationPerBreak = $breakRule->break_duration_minutes;

            $intervalsCrossed = floor($totalWorkedMinutes / $intervalThreshold);
            $possibleBreaks = min($intervalsCrossed, $breakRule->max_breaks);

            $unpaidBreaks = $possibleBreaks * $durationPerBreak;
        } else {
            if ($breakRule->is_mandatory) {
                $unpaidBreaks = $breakRule->break_duration_minutes * min(1, $breakRule->max_breaks);
            }
        }

        return (int) $unpaidBreaks;
    }

    // This method is now primarily used by AttendanceService to determine the work_date for DailyEarning aggregation.
    // It is less about "effective shift times" for calculation and more about the payroll period alignment.
    // So, it can remain in AttendanceService using the base Shift times.
    protected function determineShiftWorkDate(Carbon $checkInTime, ?\App\Models\Shift $assignedShift): Carbon
    {
        // This method determines the work date for payroll aggregation.
        // It relies on the *core* shift definition, not potential overrides,
        // to consistently assign a single "work day" to an overnight shift.
        if (!$assignedShift) {
            return $checkInTime->copy()->startOfDay();
        }

        if (!$assignedShift->is_overnight) {
            return $checkInTime->copy()->startOfDay();
        }

        // Overnight shift: if check-in is after midnight but before shift end time (of next day),
        // the work date is the previous day (shift start day).
        $shiftStartTime = Carbon::parse($assignedShift->start_time);
        $shiftEndTime = Carbon::parse($assignedShift->end_time);

        // To correctly check if checkInTime is within the "next day" portion of an overnight shift,
        // we compare it to the shift's end time, assuming the shift end time is on the next calendar day.
        $checkInTimeOnly = $checkInTime->copy()->format('H:i:s');
        if ($checkInTimeOnly < $assignedShift->end_time) {
            return $checkInTime->copy()->subDay()->startOfDay();
        } else {
            return $checkInTime->copy()->startOfDay();
        }
    }




    private function calculateBaseOnEmployeeProfileShift(DailyAttendance $checkIn, DailyAttendance $checkOut,  EmployeeProfile $employeeProfile): array {
            Log::warning("No RoleSchedule found for employee ID {$employeeProfile->employee_id} for date {$checkIn->attendance_time}. Calculating all hours as regular.");

            $shiftStart =  $employeeProfile->shift->start_time;
            $shiftStart = Carbon::today()->startOfDay()->setTimeFromTimeString($shiftStart);

            $shiftEnd = $employeeProfile->shift->end_time;
            $shiftEnd = Carbon::today()->startOfDay()->setTimeFromTimeString($shiftEnd);

            $shiftDuration = $shiftStart->diffInMinutes($shiftEnd);


            $checkOutTime = Carbon::today()->startOfDay()->setTimeFromTimeString($checkOut->attendance_time);
            $checkInTime = Carbon::today()->startOfDay()->setTimeFromTimeString($checkIn->attendance_time);


            if ($checkOutTime->lessThan($checkInTime)) {
                $checkOutTime->addDay(); // Handle crossing midnight
            }

            if ($checkInTime->lessThan($shiftStart)) {
                $shiftStart = $checkInTime; // Adjust shift start to actual check-in time
            }

            $totalWorkMinutes = $checkInTime->diffInMinutes($checkOutTime);


            if ($totalWorkMinutes < $shiftDuration) {
                // If total worked minutes are less than shift duration, no overtime
                return [
                    'work_minutes' => $totalWorkMinutes,
                    'overtime_minutes' => 0,
                    'paid_minutes' => $totalWorkMinutes,
                ];
            } else {

                $alwaysPayOvertime = true; // This can be a config or parameter to control overtime behavior
                if ($alwaysPayOvertime) {
                    $overtime = $totalWorkMinutes - $shiftDuration;
                    $paidMinutes = $totalWorkMinutes;
                } else {
                    $overtime = 0;
                    $paidMinutes = $shiftDuration;
                    $totalWorkMinutes = $shiftDuration; // Cap total work minutes to shift duration
                }

                return [
                    'work_minutes' => $totalWorkMinutes,
                    'overtime_minutes' => $overtime,
                    'paid_minutes' => $paidMinutes,
                ];

            }




    }




}

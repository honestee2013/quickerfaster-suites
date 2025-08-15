<?php

namespace App\Modules\Hr\Services;

use App\Modules\Hr\Models\AttendanceSession;
use App\Modules\Hr\Models\DailyEarning;
use App\Modules\Hr\Models\EmployeeProfile;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Modules\Hr\Models\RoleSchedule;




class DailyEarningsService
{




    public function calculate($employee, $totalWorkedHours)
    {
        // Step 1: Get role schedule (highest priority)
        $roleSchedule = $employee->roleSchedules
            ->where('is_active', 'yes')
            ->first();

        // Step 2: Determine shift source
        if ($roleSchedule) {
            $shift = $roleSchedule->shift;
        } elseif ($employee->shift) {
            $shift = $employee->shift;
        } else {
            // No schedule or shift → all hours are regular
            return $this->calculateWithoutOvertime($employee, $totalWorkedHours);
        }

        // Step 3: Determine daily regular hours limit
        if ($roleSchedule && $roleSchedule->override_start_time && $roleSchedule->override_end_time) {
            $startTime = $roleSchedule->override_start_time;
            $endTime   = $roleSchedule->override_end_time;
        } else {
            $startTime = $shift->start_time;
            $endTime   = $shift->end_time;
        }

        $dailyRegularHours = $this->calculateHoursBetween($startTime, $endTime, $shift->is_overnight);

        // Step 4: Overtime threshold
        $overtimeAfter = $roleSchedule && $roleSchedule->overtime_after_hours
            ? $roleSchedule->overtime_after_hours
            : $dailyRegularHours;

        // Step 5: Apply daily max hours cap
        if ($roleSchedule && $roleSchedule->max_daily_hours) {
            $totalWorkedHours = min($totalWorkedHours, $roleSchedule->max_daily_hours);
        }

        // Step 6: Calculate overtime for the day
        $overtimeHours = max(0, $totalWorkedHours - $overtimeAfter);

        // Cap paid overtime hours if needed
        if ($roleSchedule && $roleSchedule->max_paid_overtime_hours) {
            $overtimeHours = min($overtimeHours, $roleSchedule->max_paid_overtime_hours);
        }

        $regularHours = $totalWorkedHours - $overtimeHours;

        // Step 7: Determine hourly rates
        $hourlyRate = $roleSchedule && $roleSchedule->override_hourly_rate
            ? $roleSchedule->override_hourly_rate
            : $employee->hourly_rate;

        $overtimeRate = $roleSchedule && $roleSchedule->overtime_rate_multiplier
            ? $hourlyRate * $roleSchedule->overtime_rate_multiplier
            : $hourlyRate * 1.5;

        // Step 8: Calculate pay
        $regularPay  = $regularHours * $hourlyRate;
        $overtimePay = $overtimeHours * $overtimeRate;
        $totalPay    = $regularPay + $overtimePay;

        return [
            'regular_hours'   => round($regularHours, 2),
            'overtime_hours'  => round($overtimeHours, 2),
            'total_hours'     => round($totalWorkedHours, 2),
            'regular_amount'  => round($regularPay, 2),
            'overtime_amount' => round($overtimePay, 2),
            'total_amount'    => round($totalPay, 2),
        ];
    }

    private function calculateWithoutOvertime($employee, $totalWorkedHours)
    {
        $hourlyRate = $employee->hourly_rate;
        $totalPay = $totalWorkedHours * $hourlyRate;

        return [
            'regular_hours'   => round($totalWorkedHours, 2),
            'overtime_hours'  => 0,
            'total_hours'     => round($totalWorkedHours, 2),
            'regular_amount'  => round($totalPay, 2),
            'overtime_amount' => 0,
            'total_amount'    => round($totalPay, 2),
        ];
    }

protected function calculateHoursBetween($startTime, $endTime, $isOvernight)
{
    $start = Carbon::parse($startTime);
    $end   = Carbon::parse($endTime);

    if ($isOvernight && $end->lessThanOrEqualTo($start)) {
        $end->addDay(); // Move to next day
    }

    return $start->diffInHours($end);
}







    /*public function updateOrCreateForDay($employeeProfile, $date, $regularHours, $overtimeHours)
{
    $hourlyRate = $employeeProfile->hourly_rate;
    $overtimeRate = $hourlyRate * 1.5;

    $regularPay = $regularHours * $hourlyRate;
    $overtimePay = $overtimeHours * $overtimeRate;

    DailyEarning::updateOrCreate(
        [
            'employee_id' => $employeeProfile->employee_id,
            'work_date' => $date,
        ],
        [
            'regular_hours' => $regularHours,
            'overtime_hours' => $overtimeHours,
            'total_hours' => $regularHours + $overtimeHours,
            'regular_amount' => $regularPay,
            'overtime_amount' => $overtimePay,
            'total_amount' => $regularPay + $overtimePay,
        ]
    );
}*/






/*public function generateForEmployeeOnDate(EmployeeProfile $employee, string $date)
{

    // 1. Get total minutes from all sessions on the given date
    $totalMinutes = AttendanceSession::where('employee_id', $employee->employee_id)
        ->whereDate('attendance_date', Carbon::parse($date)->format("Y-m-d"))
        ->sum('session_minutes');
  

    if ($totalMinutes <= 0) {
        return null; // no work done
    }

    $totalHours = round($totalMinutes / 60, 2);

    // 2. Defaults
    $regularHours = $totalHours;
    $overtimeHours = 0;
    $overtimePay = 0;
    $regularPay = $totalHours * $employee->hourly_rate;

    // 3. Apply role schedule rules
    $roleSchedule = RoleSchedule::where('role_id', $employee->role_id)
        // ->where('is_active', true)
        ->first();

    if ($roleSchedule) {
       
        $maxHours = $roleSchedule->max_daily_hours ?? Carbon::parse($employee->shift->end_time)
            ->diffInHours(Carbon::parse($employee->shift->start_time));
dd($totalHours, $maxHours);
        if ($totalHours > $maxHours) {
            $overtimeHours = $totalHours - $maxHours;
            $regularHours = $maxHours;
            $overtimeRate = $roleSchedule->overtime_multiplier ?? 1.5;
            $overtimePay = $overtimeHours * $employee->hourly_rate * $overtimeRate;
            $regularPay = $regularHours * $employee->hourly_rate;
        }
    }
    // 4. If no role schedule, apply shift-based logic
    elseif ($employee->shift) {
        $shiftHours = Carbon::parse($employee->shift->end_time)
            ->diffInHours(Carbon::parse($employee->shift->start_time));

        if ($totalHours > $shiftHours) {
            $overtimeHours = $totalHours - $shiftHours;
            $regularHours = $shiftHours;
            $overtimePay = $overtimeHours * $employee->hourly_rate * 1.5;
            $regularPay = $regularHours * $employee->hourly_rate;
        }
    }

    // 5. Save daily earnings
    return DailyEarning::updateOrCreate(
        [
            'employee_id' => $employee->id,
            'date'        => $date
        ],
        [
            'regular_hours' => round($regularHours, 2),
            'overtime_hours' => round($overtimeHours, 2),
            'total_hours' => round($totalHours, 2),

            'regular_amount' => round($regularPay, 2),
            'overtime_amount' => round($overtimePay, 2),
            'total_amount' => round($regularPay + $overtimePay, 2)
        ]
    );
}*/




















    /**
     * Generate daily earnings for an employee on a given date.
     */
    /*public function generateForEmployeeOnDate(string $employeeId, string $workDate): DailyEarning
    {
        $attendances = DailyAttendance::where('employee_id', $employeeId)
            ->where('attendance_date', $workDate)
            ->orderBy('attendance_time')
            ->get();

        $pairs = $this->pairAttendances($attendances);

        $totalHours = 0;
        foreach ($pairs as $pair) {
            $totalHours += $pair['hours'];
        }

        $profile = EmployeeProfile::where('employee_id', $employeeId)->first();
        $hourlyRate = $profile?->hourly_rate ?? 0;



        $roleSchedule = $this->getRoleSchedule($profile, $workDate);

        if ($roleSchedule) {
            $overtimeAfterHours = $roleSchedule->overtime_after_hours;
            $maxOvertimeHours = $roleSchedule->max_paid_overtime_hours;
            $overtimeMultiplier = $roleSchedule->overtime_rate_multiplier ?? 1.5;

            $regularHours = min($totalHours, $overtimeAfterHours);
            $overtimeHours = max(0, $totalHours - $overtimeAfterHours);

            if ($maxOvertimeHours !== null) {
                $overtimeHours = min($overtimeHours, $maxOvertimeHours);
            }
        } elseif ($profile && $profile->shift) {
            $shift = $profile->shift;

            if ($shift) {
                $start = Carbon::parse($shift->start_time);
                $end = Carbon::parse($shift->end_time);

                if ($shift->is_overnight && $end->lessThan($start)) {
                    $end->addDay();
                }

                $shiftHours = $end->floatDiffInHours($start);

                // No overtime logic — all time is regular
                $regularHours = min($totalHours, $shiftHours);
                $overtimeHours = 0;
                $overtimeMultiplier = 0;
            }
        } else {
            // No schedule, no shift → assume all time is regular
            $regularHours = $totalHours;
            $overtimeHours = 0;
            $overtimeMultiplier = 0;
        }

        $regularAmount = round($regularHours * $hourlyRate, 2);
        $overtimeAmount = round($overtimeHours * $hourlyRate * $overtimeMultiplier, 2);
        $totalAmount = $regularAmount + $overtimeAmount;




        return DailyEarning::updateOrCreate(
            [
                'employee_id' => $employeeId,
                'work_date' => $workDate,
            ],
            [
                'regular_hours' => round($regularHours, 2),
                'overtime_hours' => round($overtimeHours, 2),
                'total_hours' => round($totalHours, 2),
                'regular_amount' => round($regularAmount, 2),
                'overtime_amount' => round($overtimeAmount, 2),
                'total_amount' => round($totalAmount, 2),
            ]
        );
    }


    protected function pairAttendances(Collection $attendances): array
    {
        $pairs = [];
        $checkIn = null;

        foreach ($attendances as $attendance) {
            if (strtolower($attendance->attendance_type) === 'check-in') {
                $checkIn = $attendance;
            } elseif (strtolower($attendance->attendance_type) === 'check-out' && $checkIn) {
                $in = Carbon::parse($checkIn->attendance_date . ' ' . $checkIn->attendance_time);
                $out = Carbon::parse($attendance->attendance_date . ' ' . $attendance->attendance_time);

                // Overnight shift handling
                if ($out->lessThan($in)) {
                    $out->addDay();
                }

                $hours = round($out->floatDiffInHours($in), 2);

                $pairs[] = [
                    'in' => $checkIn,
                    'out' => $attendance,
                    'hours' => $hours,
                ];

                $checkIn = null; // reset for next pair
            }
        }

        return $pairs;
    }


    public function getRoleSchedule(?EmployeeProfile $profile, string $workDate): ?RoleSchedule
    {
        if (!$profile || !$profile->role_id) {
            return null;
        }

        $dayOfWeek = Carbon::parse($workDate)->dayOfWeekIso; // 1 (Mon) - 7 (Sun)

        return RoleSchedule::where('role_id', $profile->role_id)
            ->where('day_of_week_id', $dayOfWeek)
            ->where('is_active', true)
            ->whereDate('effective_date', '<=', $workDate)
            ->where(function ($q) use ($workDate) {
                $q->whereNull('end_date')
                    ->orWhereDate('end_date', '>=', $workDate);
            })
            ->first();
    }*/
}


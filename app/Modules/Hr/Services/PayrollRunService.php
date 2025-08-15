<?php 
namespace App\Modules\Hr\Services;


use App\Modules\Hr\Models\DailyAttendance;
use App\Modules\Hr\Models\EmployeeProfile;
use App\Modules\Hr\Models\PayrollRun;
use App\Modules\Hr\Models\ExemptedRole;
use App\Modules\Hr\Models\RoleAllowance;
use App\Modules\Hr\Models\RoleBonus;
use App\Modules\Hr\Models\RoleDeduction;
use App\Modules\Hr\Models\RoleTax;
use App\Modules\Hr\Models\Shift;
use App\Modules\Hr\Services\DailyEarningsService;
use Carbon\CarbonPeriod;
use App\Modules\Hr\Models\CheckInOnlyRole;


use App\Modules\Hr\Models\RoleSchedule;
use App\Modules\Hr\Models\BreakRule;
use Carbon\Carbon;


use App\Modules\Hr\Models\AttendanceSession;




class PayrollRunService
{
    protected $dailyEarningsService;

    public function __construct(DailyEarningsService $dailyEarningsService)
    {
        $this->dailyEarningsService = $dailyEarningsService;
    }

    public function calculate(PayrollRun $payrollRun)
    {
        $results = [];

        $fromDate = \Carbon\Carbon::parse($payrollRun->from_date);
        $toDate   = \Carbon\Carbon::parse($payrollRun->to_date);
        $daysInPeriod = $fromDate->diffInDays($toDate) + 1;

        $exemptedRoleIds    = ExemptedRole::pluck('role_id')->toArray();
        $checkInOnlyRoleIds = CheckInOnlyRole::pluck('role_id')->toArray();

        $employeeProfiles = EmployeeProfile::with('role')->get();
        $dailyRegularAmountTotal = 0;
        $dailyOvertimeAmountTotal = 0;

        foreach ($employeeProfiles as $employeeProfile) {
            if (in_array($employeeProfile->role_id, $exemptedRoleIds)) {
                // Paid for all days without attendance
                $dailyRate = $this->getDailyRate($employeeProfile);
             
                $dailyRegularAmountTotal = $dailyRate * $daysInPeriod;

            } elseif (in_array($employeeProfile->role_id, $checkInOnlyRoleIds)) {

                // Paid for each day they checked in
                $checkInDays = AttendanceSession::where('employee_id', $employeeProfile->employee_id)
                    ->whereBetween('attendance_date', [$payrollRun->from_date, $payrollRun->to_date])
                    ->whereNotNull('check_in_time')
                    ->distinct('attendance_date')
                    ->count('attendance_date');

                $dailyRate = $this->getDailyRate($employeeProfile);
                $dailyRegularAmountTotal = $dailyRate * $checkInDays;

            } else {
                // Regular role - normal calculation




                // Regular role - normal calculation (per day)
                    $currentDate = $fromDate->copy();


                    while ($currentDate->lte($toDate)) {
                        // Get total hours info, worked on this day
                        $result = $this->generateForEmployeeOnDate($employeeProfile, $currentDate);
                        
                        // Get daily rate max hours/paymrnt applies 
                        //$dailyRate = $this->getDailyRate($employee);
                        $dailyRegularAmountTotal += $result["regular_amount"]; // Also $result['regular_hours'];
                        $dailyOvertimeAmountTotal += $result["overtime_amount"]; // Also $result['overtime_hours'];
                        
                        $currentDate->addDay();
                    }                
            }




         //'', '', '', '', 'total_other_deductions', '', '', '',

            $allowances = $this->getRoleAllowances($employeeProfile->role_id, $payrollRun->id);
            $bonuses    = $this->getRoleBonuses($employeeProfile->role_id, $payrollRun->id);
            $taxes      = $this->getRoleTaxes($employeeProfile->role_id, $payrollRun->id);
            $deductions = $this->getRoleDeductions($employeeProfile->role_id, $payrollRun->id);

            $grossPay = $dailyRegularAmountTotal + $dailyOvertimeAmountTotal + $allowances + $bonuses;
            $netPay   = $grossPay - $taxes - $deductions;



            $results[] = [
                'employee_id' => $employeeProfile->employee_id,
                'base_salary' => $dailyRegularAmountTotal,
                'total_overtime' => $dailyOvertimeAmountTotal,

                'total_allowances' => $allowances,
                'total_bonuses' => $bonuses,
                'total_taxes' => $taxes,
                'total_deductions' => $deductions,

                'gross_pay'   => round($grossPay, 2),
                'net_pay'     => round($netPay, 2)
            ];
        }

        return $results;
    }




public function generateForEmployeeOnDate($employeeProfile, $date)
{
    $date = Carbon::parse($date)->toDateString();



$attendances = AttendanceSession::with(['employee.roleSchedules'])
    ->where('employee_id', $employeeProfile->employee_id)
    ->whereDate('attendance_date', $date)
    ->orderBy('check_in_time')
    ->get()
    ->groupBy('attendance_date');



    if (!$attendances->has($date)) {
        return [
            'regular_hours'   => 0,
            'regular_amount'  => 0,
            'overtime_hours'  => 0,
            'overtime_amount' => 0
        ];
    }

    $dayRecords = $attendances->get($date);

    $totalRegularHours = 0;
    $totalOvertimeHours = 0;

    $roleSchedule = $this->getRoleSchedule($employeeProfile);

    foreach ($dayRecords as $record) {
        $checkIn = Carbon::parse($record->check_in_time);
        if (!$record->check_out_time)
            continue; // Missing punch. This should be logged to missing punched record
        $checkOut = Carbon::parse($record->check_out_time); 
       

        // total hours for a single attendance record
        $hoursWorked = $checkOut->diffInMinutes($checkIn) / 60;


        $roleSchedule = $this->getRoleSchedule($employeeProfile);// RoleSchedule::where('role_id', $employeeProfile->role_id)
            //->where('day_of_week', strtolower($checkIn->format('l'))) // This should be configurable (single/all days)
            //->first();

        $regularHours = min($hoursWorked, $this->getDailyRegularHours($employeeProfile)); 
        $overtimeHours = min($hoursWorked, $this->getOvertimeHours($employeeProfile, $hoursWorked)); 

        $totalRegularHours += $regularHours;
        $totalOvertimeHours += $overtimeHours;
    }

    
    $hourlyRate = $roleSchedule->override_hourly_rate?? $employeeProfile->hourly_rate;

    return [
        'regular_hours'   => $totalRegularHours,
        'regular_amount'  => $totalRegularHours * $hourlyRate,
        'overtime_hours'  => $totalOvertimeHours,
        'overtime_amount' => $totalOvertimeHours * $hourlyRate * ($roleSchedule->overtime_rate_multiplier?? 1)
    ];
}



    private function getRoleSchedule(EmployeeProfile $employee) {
        return RoleSchedule::where('role_id', $employee->role_id)
            //->where('day_of_week', strtolower($checkIn->format('l'))) // This should be configurable (single/all days)
            ->first();
    }

    private function getDailyRegularHours(EmployeeProfile $employee, ) {
        $schedule = $this->getRoleSchedule($employee);

        $startTime = $schedule->override_start_time?? $employee->shift->start_time;
        $endTime = $schedule->override_start_time?? $employee->shift->end_time;

        $dailyHours = Carbon::parse($startTime)->diffInHours(Carbon::parse($endTime));
        $dailyHours = min($dailyHours, ($schedule->max_daily_hours?? $dailyHours));
        return $dailyHours; // Allowed daily work hours
    }


    private function getOvertimeHours(EmployeeProfile $employee, $hoursWorked) {
        $overtimeHours = 0;
        $dailyRegularHours = $this->getDailyRegularHours($employee);
        $schedule = $this->getRoleSchedule($employee);
        if (!$schedule) // No overtime if no roleShedule defined. 
            return $overtimeHours; // This may need to be configurable to allow adding hours on the dailyRegularHours as overtime

        $overtimeHours = $hoursWorked - ($schedule->overtime_after_hours?? $dailyRegularHours);
        return min($overtimeHours, ($schedule->max_paid_overtime_hours?? $overtimeHours));
    }


    protected function getDailyRate(EmployeeProfile $employee)
    {
        $schedule = $this->getRoleSchedule($employee);
        $hourlyRate = $schedule->override_hourly_rate?? $employee->hourly_rate;
        $dailyRegularHours = $this->getDailyRegularHours($employee);
        return $dailyRegularHours * $hourlyRate;
        
    }


protected function calculateDailyTotals($employee, $payrollRun)
{
    $dateRange = CarbonPeriod::create($payrollRun->from_date, $payrollRun->to_date);
    $total = 0;
    return $total;
}


    protected function getRoleAllowances($roleId, $payrollRunId)
    {
        return RoleAllowance::where('role_id', $roleId)
            ->where('payroll_run_id', $payrollRunId)
            ->sum('amount');
    }

    protected function getRoleBonuses($roleId, $payrollRunId)
    {
        return RoleBonus::where('role_id', $roleId)
            ->where('payroll_run_id', $payrollRunId)
            ->sum('amount');
    }

    protected function getRoleTaxes($roleId, $payrollRunId)
    {
        return RoleTax::where('role_id', $roleId)
            ->where('payroll_run_id', $payrollRunId)
            ->sum('amount');
    }

    protected function getRoleDeductions($roleId, $payrollRunId)
    {
        return RoleDeduction::where('role_id', $roleId)
            ->where('payroll_run_id', $payrollRunId)
            ->sum('amount');
    }
}


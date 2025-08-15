<?php 


namespace App\Modules\Hr\Tests\Unit;

use App\Modules\Access\Models\Role;
use App\Modules\Hr\Models\BreakRule;
use App\Modules\Hr\Models\AttendanceSession;
use App\Modules\Hr\Models\JobTitle;
use App\Modules\Hr\Models\EmployeeProfile;
use App\Modules\Hr\Models\CheckInOnlyRole;
use App\Modules\Hr\Models\ExemptedRole;
use App\Modules\Hr\Models\DayOfWeek;
use App\Modules\Hr\Models\Shift;
use App\Modules\Hr\Models\RoleSchedule;
use App\Modules\Hr\Services\DailyEarningsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Modules\Hr\Models\PayrollRun;
use App\Modules\Hr\Models\RoleAllowance;
use App\Modules\Hr\Models\RoleBonus;
use App\Modules\Hr\Models\RoleTax;
use App\Modules\Hr\Models\RoleDeduction;
use App\Modules\Hr\Services\PayrollRunService;
use App\Modules\Hr\Services\AttendanceService;
use Illuminate\Support\Carbon;



class PayrollRunServiceTest extends TestCase
{
    use RefreshDatabase;


    protected AttendanceService $attendanceService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->attendanceService = new AttendanceService();
    }

    public function test_it_calculates_pay_for_regular_checkinonly_and_exempted_roles()
    {
        $payrollRun = PayrollRun::factory()->create([
            'from_date' => '2025-08-01',
            'to_date'   => '2025-08-03'
        ]);


        $shift = Shift::factory()->create([
            'name' => 'Day Shift',
            'start_time'   => '08:00:00',
            'end_time'   => '16:00:00'
        ]);




        $regularRole      = Role::factory()->create();
        $checkInOnlyRole  = Role::factory()->create();
        $exemptedRole     = Role::factory()->create();

        CheckInOnlyRole::create(['role_id' => $checkInOnlyRole->id, 'payment_type' => 'Cash', 'fixed_amount' => 0]);
        ExemptedRole::create(['role_id' => $exemptedRole->id, 'payment_type' => 'Cash', 'fixed_amount' => 0]);

        RoleSchedule::create(['name' => 'Test Name', 'role_id' => $checkInOnlyRole->id, 'override_hourly_rate' => 50]);
        RoleSchedule::create(['name' => 'Test Name', 'role_id' => $exemptedRole->id, 'override_hourly_rate' => 10]);
        RoleSchedule::create(['name' => 'Test Name', 'role_id' => $regularRole->id, 'max_daily_hours' => 8, 'override_hourly_rate' => 10]);

        $regularEmployee = EmployeeProfile::factory()->create(['role_id' => $regularRole->id, 'shift_id' => $shift->id]);
        $checkInOnlyEmp  = EmployeeProfile::factory()->create(['role_id' => $checkInOnlyRole->id, 'shift_id' => $shift->id]);
        $exemptedEmp     = EmployeeProfile::factory()->create(['role_id' => $exemptedRole->id, 'shift_id' => $shift->id]);

        // Regular role — 2 days full attendance
        $this->logSession($regularEmployee->employee_id, '2025-08-01', '08:00:00', '16:00:00');
        $this->logSession($regularEmployee->employee_id, '2025-08-02', '08:00:00', '16:00:00');

        // Check-in-only role — 2 days check-in
        $this->logSession($checkInOnlyEmp->employee_id, '2025-08-01', '09:00:00', null);
        $this->logSession($checkInOnlyEmp->employee_id, '2025-08-03', '09:00:00', null);

        // Exempted role — no attendance

        $payrollService = app(PayrollRunService::class);
        $results = $payrollService->calculate($payrollRun);
 
        $pays = collect($results)->pluck('gross_pay', 'employee_id');


        $this->assertEquals(160, $pays[$regularEmployee->employee_id]); // 2 days * 8 hours * 10$
        $this->assertEquals(800, $pays[$checkInOnlyEmp->employee_id]);  // 2 days * 8 hours * 50$
        $this->assertEquals(240, $pays[$exemptedEmp->employee_id]);     // 3 days * 8 hours * 10$
    }
    







    private function logSession($employeeId, $date, $checkIn, $checkOut)
    {
        
        $this->attendanceService->record([
            'employee_id'      => $employeeId,
            'check_in_time'    => $checkIn,
            'check_out_time'   => $checkOut,
            'attendance_date'  => $date,
        ]);

        /*$this->attendanceService->record([
            'employee_id'      => $employeeId,
            'check_out_time'   => $checkOut,
            'attendance_date'  => $date,
        ]);*/

    }
}

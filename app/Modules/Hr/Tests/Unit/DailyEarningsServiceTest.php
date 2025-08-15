<?php

namespace App\Modules\Hr\Tests\Unit;

use App\Modules\Access\Models\Role;
use App\Modules\Hr\Models\BreakRule;
use App\Modules\Hr\Models\DailyAttendance;
use App\Modules\Hr\Models\DailyEarning;
use App\Modules\Hr\Models\EmployeeProfile;
use App\Modules\Hr\Models\JobTitle;
use App\Modules\Hr\Models\DayOfWeek;
use App\Modules\Hr\Models\Shift;
use App\Modules\Hr\Models\RoleSchedule;
use App\Modules\Hr\Services\DailyEarningsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Illuminate\Support\Carbon;





class DailyEarningsServiceTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new DailyEarningsService();
    }

    private function mockEmployee($hourlyRate = 10, $shift = null, $roleSchedule = null)
    {
        $employee = new EmployeeProfile();
        $employee->hourly_rate = $hourlyRate;
        $employee->setRelation('shift', $shift);
        $employee->setRelation('roleSchedules', collect($roleSchedule ? [$roleSchedule] : []));
        return $employee;
    }

    private function makeShift($start = '09:00', $end = '17:00', $isOvernight = false)
    {
        $shift = new Shift();
        $shift->start_time = $start;
        $shift->end_time = $end;
        $shift->is_overnight = $isOvernight; // now boolean instead of 'yes'/'no'
        return $shift;
    }

    private function makeRoleSchedule($overrides = [])
    {
        $roleSchedule = new RoleSchedule();
        foreach ($overrides as $k => $v) {
            $roleSchedule->$k = $v;
        }
        return $roleSchedule;
    }

    /** @test */
    public function it_calculates_regular_pay_without_overtime()
    {
        $shift = $this->makeShift();
        $employee = $this->mockEmployee(10, $shift);

        $totalWorkedHours = Carbon::parse('09:00')->diffInHours('17:00');
        $result = $this->service->calculate($employee, $totalWorkedHours);

        $this->assertEquals(8, $result['total_hours']);
        $this->assertEquals(80, $result['total_amount']);
        $this->assertEquals(0, $result['overtime_hours']);
    }

    /** @test */
    public function it_calculates_overtime_when_exceeding_threshold()
    {
        $shift = $this->makeShift();
        $employee = $this->mockEmployee(10, $shift);


        $totalWorkedHours = Carbon::parse('09:00')->diffInHours('19:00');
        $result = $this->service->calculate($employee, $totalWorkedHours);

        
        $this->assertEquals(8, $result['regular_hours']);
        $this->assertEquals(2, $result['overtime_hours']);
        $this->assertEquals(80 + (2 * 15), $result['total_amount']); // default OT 1.5x
    }

    /** @test */
    public function it_uses_role_schedule_override_times_and_rates()
    {
        $shift = $this->makeShift();
        $roleSchedule = $this->makeRoleSchedule([
            'override_start_time' => '08:00',
            'override_end_time' => '16:00',
            'overtime_after_hours' => 6,
            'override_hourly_rate' => 20,
            'overtime_rate_multiplier' => 2,
            'is_active' => 'yes'
        ]);
        $roleSchedule->setRelation('shift', $shift);

        $employee = $this->mockEmployee(10, $shift, $roleSchedule);

        $totalWorkedHours = Carbon::parse('08:00')->diffInHours('18:00');
        $result = $this->service->calculate($employee, $totalWorkedHours);


        $this->assertEquals(4, $result['overtime_hours']); // after 6 hrs
        $this->assertEquals(120, $result['regular_amount']); // override_hourly_rate:20 * 6 hrs
        $this->assertEquals(160, $result['overtime_amount']); // overtime_rate_multiplier:2 * override_hourly_rate:20 overtime_hours:4   
       
    }

    /** @test */
    public function it_caps_max_daily_hours()
    {
        $shift = $this->makeShift();
        $roleSchedule = $this->makeRoleSchedule([
            'max_daily_hours' => 8,
            'is_active' => 'yes'
        ]);
        $roleSchedule->setRelation('shift', $shift);

        $employee = $this->mockEmployee(10, $shift, $roleSchedule);

        $totalWorkedHours = Carbon::parse('09:00')->diffInHours('20:00');
        $result = $this->service->calculate($employee, $totalWorkedHours);


        $this->assertEquals(8, $result['total_hours']);
    }

    /** @test */
    public function it_caps_max_paid_overtime_hours()
    {
        $shift = $this->makeShift();
        $roleSchedule = $this->makeRoleSchedule([
            'overtime_after_hours' => 8,
            'max_paid_overtime_hours' => 2,
            'is_active' => 'yes'
        ]);
        $roleSchedule->setRelation('shift', $shift);

        $employee = $this->mockEmployee(10, $shift, $roleSchedule);

        $totalWorkedHours = Carbon::parse('09:00')->diffInHours('20:00');
        $result = $this->service->calculate($employee, $totalWorkedHours);


        $this->assertEquals(2, $result['overtime_hours']);
    }

    /** @test */
    public function it_handles_overnight_shifts_correctly()
    {
        $shift = $this->makeShift('22:00', '06:00', true);
        $employee = $this->mockEmployee(10, $shift);

        $totalWorkedHours = Carbon::parse('2025-08-11 22:00')->diffInHours(Carbon::parse('2025-08-12 06:00'));
        $result = $this->service->calculate($employee, $totalWorkedHours);

        $this->assertEquals(8, $result['total_hours']);
    }

    /** @test */
    public function it_calculates_without_shift_or_role_schedule()
    {
        $employee = $this->mockEmployee(12, null); // no shift, no role schedule
        $totalWorkedHours = Carbon::parse('09:00')->diffInHours('15:00');
        $result = $this->service->calculate($employee, $totalWorkedHours);

        $this->assertEquals(6, $result['total_hours']);
        $this->assertEquals(72, $result['total_amount']);
        $this->assertEquals(0, $result['overtime_hours']);
    }
}

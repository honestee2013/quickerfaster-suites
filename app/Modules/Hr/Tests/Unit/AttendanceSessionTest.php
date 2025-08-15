<?php


namespace App\Modules\Hr\Tests\Unit;


use Tests\TestCase;
use App\Modules\Hr\Models\AttendanceSession;
use App\Modules\Hr\Models\EmployeeProfile;
use App\Modules\Hr\Models\RoleSchedule;
use App\Modules\Hr\Models\Shift;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;


class AttendanceSessionTest extends TestCase
{
    use RefreshDatabase;

    protected $employee;
    protected $roleSchedule;

    protected function setUp(): void
    {
        parent::setUp();

        $this->employee = $this->mockEmployee($hourlyRate = 10, $shift = null, $roleSchedule = null);
        $this->makeShift($start = '08:00:00', $end = '16:00:00', $isOvernight = false);

        $this->roleSchedule = $this->makeRoleSchedule([
            'late_grace_minutes'        => 5,
            'early_leave_grace_minutes' => 5,
            'overtime_after_hours'      => 2
        ]);
    }

    /** @test */
    public function it_logs_multiple_check_in_and_out_sessions_for_same_day()
    {
        $day = now()->startOfDay();

        // First session 8:00 - 9:00
        AttendanceSession::create([
            'employee_id'    => $this->employee->id,
            'attendance_date'   => $day,
            'check_in_time'  => $day->copy()->setTime(8, 0),
            'check_out_time' => $day->copy()->setTime(9, 0)
        ]);

        // Second session 9:30 - 10:30
        AttendanceSession::create([
            'employee_id'    => $this->employee->id,
            'attendance_date'   => $day,
            'check_in_time'  => $day->copy()->setTime(9, 30),
            'check_out_time' => $day->copy()->setTime(10, 30)
        ]);

        $totalMinutes = AttendanceSession::where('employee_id', $this->employee->id)
            ->whereDate('attendance_date', $day)
            ->get()
            ->sum(fn($session) =>
                Carbon::parse($session->check_in_time)->diffInMinutes($session->check_out_time)
            );

        $this->assertEquals(120, $totalMinutes);
    }

    /** @test */
    public function it_allows_check_in_without_check_out()
    {
        $day = now()->startOfDay();

        AttendanceSession::create([
            'employee_id'   => $this->employee->id,
            'attendance_date'  => $day,
            'check_in_time' => $day->copy()->setTime(8, 0)
        ]);

        $this->assertDatabaseHas('attendance_sessions', [
            'employee_id'   => $this->employee->id,
            'check_out_time'=> null
        ]);
    }

    /** @test */
    public function it_calculates_total_minutes_for_completed_sessions_only()
    {
        $day = now()->startOfDay();

        // Complete session
        AttendanceSession::create([
            'employee_id'    => $this->employee->id,
            'attendance_date'   => $day,
            'check_in_time'  => $day->copy()->setTime(8, 0),
            'check_out_time' => $day->copy()->setTime(10, 0)
        ]);

        // Incomplete session
        AttendanceSession::create([
            'employee_id'   => $this->employee->id,
            'attendance_date'  => $day,
            'check_in_time' => $day->copy()->setTime(11, 0)
        ]);

        $totalMinutes = AttendanceSession::where('employee_id', $this->employee->id)
            ->whereDate('attendance_date', $day)
            ->get()
            ->filter(fn($session) => $session->check_out_time !== null)
            ->sum(fn($session) =>
                Carbon::parse($session->check_in_time)->diffInMinutes($session->check_out_time)
            );

        $this->assertEquals(120, $totalMinutes);
    }

    /** @test */
    public function it_can_handle_sessions_spanning_midnight()
    {
        $day = now()->startOfDay();

        AttendanceSession::create([
            'employee_id'    => $this->employee->id,
            'attendance_date'   => $day,
            'check_in_time'  => $day->copy()->setTime(22, 0), // 10 PM
            'check_out_time' => $day->copy()->addDay()->setTime(2, 0) // 2 AM next day
        ]);

        $totalMinutes = AttendanceSession::where('employee_id', $this->employee->id)
            ->whereDate('attendance_date', $day)
            ->get()
            ->sum(fn($session) =>
                Carbon::parse($session->check_in_time)->diffInMinutes($session->check_out_time)
            );

        $this->assertEquals(240, $totalMinutes); // 4 hours
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



}

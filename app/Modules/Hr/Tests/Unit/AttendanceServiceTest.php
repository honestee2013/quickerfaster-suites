<?php

namespace App\Modules\Hr\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;
use App\Modules\Hr\Models\EmployeeProfile;
use App\Modules\Hr\Models\AttendanceSession;
use App\Modules\Hr\Models\DailyEarnings;
use App\Modules\Hr\Services\AttendanceService;
use App\Modules\Hr\Services\PayrollCalculatorService;

class AttendanceServiceTest extends TestCase
{
    use RefreshDatabase;

    protected AttendanceService $attendanceService;

    protected function setUp(): void
    {
        parent::setUp();

        // Create mock PayrollCalculatorService
        /*$payrollCalculatorMock = $this->createMock(PayrollCalculatorService::class);
        $payrollCalculatorMock->method('calculateDaily')
            ->willReturn([
                'regular_hours' => 1.0,
                'overtime_hours' => 0.0,
                'total_hours' => 1.0,
                'regular_amount' => 10.00,
                'overtime_amount' => 0.00,
                'total_amount' => 10.00
            ]);*/

        $this->attendanceService = new AttendanceService();

        // Create a fake employee
        EmployeeProfile::factory()->create([
            'employee_id' => 'EMP001'
        ]);
    }

    /** @test */
    public function it_creates_a_session_on_check_in()
    {
        $result = $this->attendanceService->record([
            'employee_id' => 'EMP001',
            'check_in_time' => '2025-08-11 08:00:00',
            'device_id' => 'DEV01',
            // 'attendance_date' => '2025-01-01'
        ]);

        $this->assertDatabaseHas('attendance_sessions', [
            'employee_id' => 'EMP001',
            'check_in_time' => '2025-08-11 08:00:00'
        ]);
        $this->assertNull($result->check_out_time);
    }

    /** @test */
    public function it_updates_session_and_earnings_on_check_out()
    {
        // First check-in
        AttendanceSession::create([
            'employee_id' => 'EMP001',
            'attendance_date' => '2025-08-11',
            'check_in_time' => Carbon::parse('2025-08-11 08:00:00')
        ]);

        $result = $this->attendanceService->record([
            'employee_id' => 'EMP001',
            'attendance_date' => '2025-08-11',
            'check_out_time' => '2025-08-11 09:00:00'
        ]);

        $this->assertNotNull($result->check_out_time);
        $this->assertDatabaseHas('daily_earnings', [
            'employee_id' => 'EMP001',
            'work_date' => '2025-08-11',
            'total_hours' => 1.00
        ]);
    }

    /** @test */
    public function it_handles_multiple_check_in_and_out_in_one_day()
    {
        // Morning session
        $this->attendanceService->record([
            'employee_id' => 'EMP001',
            'check_in_time' => '08:00:00',
            'attendance_date' => '2025-08-11'
        ]);
        $this->attendanceService->record([
            'employee_id' => 'EMP001',
            'check_out_time' => '09:00:00',
            'attendance_date' => '2025-08-11'
        ]);

        // Afternoon session
        $this->attendanceService->record([
            'employee_id' => 'EMP001',
            'check_in_time' => '14:00:00',
            'attendance_date' => '2025-08-11'
        ]);
        $this->attendanceService->record([
            'employee_id' => 'EMP001',
            'check_out_time' => '15:30:00',
            'attendance_date' => '2025-08-11'
        ]);

        $this->assertDatabaseHas('daily_earnings', [
            'employee_id' => 'EMP001',
            'work_date' => '2025-08-11',
            'total_hours' => 2.50 // 1 + 1.5
        ]);
    }

    /** @test */
    public function it_throws_exception_if_no_open_session_on_check_out()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("No active session found for checkout.");

        $this->attendanceService->record([
            'employee_id' => 'EMP001',
            'check_out_time' => '09:00:00',
            'attendance_date' => '2025-08-11'
        ]);
    }
}

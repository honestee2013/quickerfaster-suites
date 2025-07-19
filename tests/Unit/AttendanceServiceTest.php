<?php

namespace Tests\Unit;



use Tests\TestCase;

use App\Modules\Hr\Services\PayrollCalculatorService;
use App\Modules\Hr\Models\DailyAttendance;
use App\Modules\Hr\Models\EmployeeProfile;

use App\Modules\Hr\Database\Factories\EmployeeProfileFactory;
use App\Modules\Hr\Database\Factories\ShiftFactory;
use App\Modules\Hr\Database\Factories\RoleFactory;
use App\Modules\Hr\Database\Factories\DayOfWeekFactory;
use App\Modules\Hr\Database\Factories\BreakRuleFactory;
use App\Modules\Hr\Database\Factories\RoleScheduleFactory;



use App\Modules\Hr\Models\Shift;
use App\Modules\Hr\Models\Role;
use App\Modules\Hr\Models\DayOfWeek;
use App\Modules\Hr\Models\RoleSchedule;
use App\Modules\Hr\Models\DailyEarning;
use App\Modules\Hr\Models\EmployeeProfile as ModelsEmployeeProfile;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Modules\Hr\Services\AttendanceService;

use InvalidArgumentException;










class AttendanceServiceTest extends TestCase
{
    use RefreshDatabase;

    protected AttendanceService $attendanceService;
    protected PayrollCalculatorService $payrollCalculatorServiceMock;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed common lookup data
        DayOfWeek::factory()->monday()->create();
        DayOfWeek::factory()->tuesday()->create();
        DayOfWeek::factory()->wednesday()->create();
        DayOfWeek::factory()->thursday()->create();
        DayOfWeek::factory()->friday()->create();
        DayOfWeek::factory()->saturday()->create();
        DayOfWeek::factory()->sunday()->create();

        // Mock the PayrollCalculatorService as its logic is tested separately
        $this->payrollCalculatorServiceMock = $this->createMock(PayrollCalculatorService::class);
        $this->attendanceService = new AttendanceService($this->payrollCalculatorServiceMock);
    }

    /** @test */
    public function it_records_a_check_in_successfully()
    {
        /*$employee = Employee::factory()->create();
        $shift = Shift::factory()->dayShift()->create();
        $role = Role::factory()->create();

        EmployeeProfile::factory()->create([
            'employee_id' => $employee->id,
            'shift_id' => $shift->id,
            'role_id' => $role->id,
        ]);*/


        $employeeProfile = EmployeeProfile::find(1);

        RoleSchedule::factory()->create([
            'role_id' => $employeeProfile->user->roles->first()->id,
            'shift_id' => $employeeProfile->shift->id,
            'day_of_week_id' => Carbon::now()->dayOfWeekIso,
        ]);

        $data = [
            'employee_id' => $employeeProfile->id,
            'attendance_time' => Carbon::now()->setTime(8, 55, 0)->toDateTimeString(), // 5 mins early
            'attendance_type' => 'check-in',
            'device_id' => 'device-123',
            'latitude' => 10.0,
            'longitude' => 20.0,
            'attendance_date' => Carbon::now()->toDateString(), // From StoreDailyAttendanceRequest
        ];

        $attendance = $this->attendanceService->record($data);

        $this->assertDatabaseHas('daily_attendances', [
            'employee_id' => $employeeProfile->id,
            'attendance_type' => 'check-in',
            'check_status' => 'early', // Based on default grace period of 5 mins
            'scheduled_start' => Carbon::now()->setTime(9, 0, 0)->toDateTimeString(),
        ]);
        $this->assertInstanceOf(DailyAttendance::class, $attendance);
    }

    /** @test */
    public function it_records_a_check_out_and_calculates_daily_earnings()
    {
        $employee = Employee::factory()->create();
        $shift = Shift::factory()->dayShift()->create(); // 09:00-17:00
        $role = Role::factory()->create();
        $employeeProfile = EmployeeProfile::factory()->create([
            'employee_id' => $employee->id,
            'shift_id' => $shift->id,
            'role_id' => $role->id,
            'hourly_rate' => 100,
        ]);
        $roleSchedule = RoleSchedule::factory()->create([
            'role_id' => $role->id,
            'shift_id' => $shift->id,
            'day_of_week_id' => Carbon::now()->dayOfWeekIso,
            'break_rule_id' => null,
        ]);

        // Mock the payroll calculator service to return fixed values
        $this->payrollCalculatorServiceMock->method('calculatePaidHours')
            ->willReturn([
                'regular_minutes' => 8 * 60, // 8 hours
                'overtime_minutes' => 2 * 60, // 2 hours
                'unpaid_break_minutes' => 0,
            ]);

        $checkInTime = Carbon::now()->setTime(9, 0, 0);
        $checkOutTime = Carbon::now()->setTime(19, 0, 0); // Total 10 hours raw

        // Create a check-in first
        $checkIn = DailyAttendance::factory()->create([
            'employee_id' => $employee->id,
            'attendance_time' => $checkInTime,
            'attendance_type' => 'check-in',
            'attendance_date' => $checkInTime->toDateString(),
        ]);

        $data = [
            'employee_id' => $employee->id,
            'attendance_time' => $checkOutTime->toDateTimeString(),
            'attendance_type' => 'check-out',
            'device_id' => 'device-123',
            'latitude' => 10.0,
            'longitude' => 20.0,
            'attendance_date' => $checkOutTime->toDateString(),
        ];

        $attendance = $this->attendanceService->record($data);

        $this->assertDatabaseHas('daily_attendances', [
            'id' => $attendance->id,
            'employee_id' => $employee->id,
            'attendance_type' => 'check-out',
            'checkin_id' => $checkIn->id,
            'check_status' => 'late_checkout', // From original 17:00 end
            'scheduled_end' => Carbon::now()->setTime(17, 0, 0)->toDateTimeString(),
        ]);

        $this->assertDatabaseHas('daily_earnings', [
            'employee_id' => $employee->id,
            'work_date' => $checkInTime->toDateString(),
            'hours_worked' => 10.00, // 8 regular + 2 overtime
            'regular_hours' => 8.00,
            'overtime_hours' => 2.00,
            'amount_earned' => (8 * 100) + (2 * 100 * 1.5), // 800 + 300 = 1100
            'regular_amount' => 800.00,
            'overtime_amount' => 300.00,
        ]);
    }

    /** @test */
    public function it_handles_multiple_check_in_check_out_pairs_in_a_day()
    {
        $employee = Employee::factory()->create();
        $shift = Shift::factory()->dayShift()->create(); // 09:00-17:00
        $role = Role::factory()->create();
        $employeeProfile = EmployeeProfile::factory()->create([
            'employee_id' => $employee->id,
            'shift_id' => $shift->id,
            'role_id' => $role->id,
            'hourly_rate' => 100,
        ]);
        $roleSchedule = RoleSchedule::factory()->create([
            'role_id' => $role->id,
            'shift_id' => $shift->id,
            'day_of_week_id' => Carbon::now()->dayOfWeekIso,
            'break_rule_id' => null,
        ]);

        // Mock the payroll calculator service for this test
        $this->payrollCalculatorServiceMock->method('calculatePaidHours')
            ->willReturnOnConsecutiveCalls(
                ['regular_minutes' => 2 * 60, 'overtime_minutes' => 0, 'unpaid_break_minutes' => 0], // First session
                ['regular_minutes' => 3 * 60, 'overtime_minutes' => 0, 'unpaid_break_minutes' => 0]  // Second session
            );

        $currentDate = Carbon::create(2025, 7, 1); // Specific date for consistency

        // First Check-in/Out pair (2 hours)
        $this->attendanceService->record([
            'employee_id' => $employee->id,
            'attendance_time' => $currentDate->copy()->setTime(9, 0, 0)->toDateTimeString(),
            'attendance_type' => 'check-in',
            'attendance_date' => $currentDate->toDateString(),
        ]);
        $this->attendanceService->record([
            'employee_id' => $employee->id,
            'attendance_time' => $currentDate->copy()->setTime(11, 0, 0)->toDateTimeString(),
            'attendance_type' => 'check-out',
            'attendance_date' => $currentDate->toDateString(),
        ]);

        // Second Check-in/Out pair (3 hours)
        $this->attendanceService->record([
            'employee_id' => $employee->id,
            'attendance_time' => $currentDate->copy()->setTime(12, 0, 0)->toDateTimeString(),
            'attendance_type' => 'check-in',
            'attendance_date' => $currentDate->toDateString(),
        ]);
        $this->attendanceService->record([
            'employee_id' => $employee->id,
            'attendance_time' => $currentDate->copy()->setTime(15, 0, 0)->toDateTimeString(),
            'attendance_type' => 'check-out',
            'attendance_date' => $currentDate->toDateString(),
        ]);

        $this->assertDatabaseHas('daily_earnings', [
            'employee_id' => $employee->id,
            'work_date' => $currentDate->toDateString(),
            'hours_worked' => 5.00, // 2 hours + 3 hours
            'regular_hours' => 5.00,
            'overtime_hours' => 0.00,
            'amount_earned' => 500.00, // 5 hours * 100
        ]);
    }

    /** @test */
    public function it_throws_exception_for_invalid_attendance_type()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid attendance type');

        $employee = Employee::factory()->create();
        $shift = Shift::factory()->dayShift()->create();
        $role = Role::factory()->create();
        EmployeeProfile::factory()->create([
            'employee_id' => $employee->id,
            'shift_id' => $shift->id,
            'role_id' => $role->id,
        ]);
        RoleSchedule::factory()->create([
            'role_id' => $role->id,
            'shift_id' => $shift->id,
            'day_of_week_id' => Carbon::now()->dayOfWeekIso,
        ]);

        $data = [
            'employee_id' => $employee->id,
            'attendance_time' => Carbon::now()->toDateTimeString(),
            'attendance_type' => 'invalid-type', // Invalid type
            'attendance_date' => Carbon::now()->toDateString(),
        ];

        $this->attendanceService->record($data);
    }

    // Add more test cases for:
    // - Overnight shift `determineShiftWorkDate` (specific times)
    // - `getRoleScheduleForDate` (no schedule found, inactive, expired)
    // - Check-in/out validation rules (e.g., checkout before checkin) - though largely handled by ValidAttendanceSequence rule
}

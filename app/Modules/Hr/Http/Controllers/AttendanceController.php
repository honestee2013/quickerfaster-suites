<?php

namespace App\Modules\Hr\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Modules\Hr\Services\AttendanceService;
use App\Modules\Hr\Services\PayrollCalculatorService;

use App\Modules\Hr\Http\Requests\SyncAttendanceBatchRequest;
use App\Modules\Hr\Http\Requests\StoreDailyAttendanceRequest;
use App\Modules\Hr\Rules\ValidAttendanceSequence; // Import the rule
use Illuminate\Validation\Rule;

use App\Modules\Hr\Models\DailyAttendance;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;



class AttendanceController extends Controller
{
    protected AttendanceService $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

/*public function store(SyncAttendanceBatchRequest $request): JsonResponse
{

        $data = $request->all();

        $validator = validator($data, [
            'employee_id'     => ['required', 'exists:employee_profiles,employee_id'],
            'attendance_date' => ['required', 'date'],
            'check_in_time'   => ['nullable', 'date'],
            'check_out_time'  => ['nullable', 'date'],
            'device_id'       => ['nullable'],
            'latitude'        => ['nullable', 'numeric'],
            'longitude'       => ['nullable', 'numeric'],
        ]);

        $validator->after(function ($validator) use ($data) {
            if (!isset($data['check_in_time']) && !isset($data['check_out_time'])) {
                $validator->errors()->add('check_in_time', 'Either check_in_time or check_out_time is required.');
            }
        });

        $validated = $validator->validate();

        // Call service layer
        $attendance = $this->attendanceService->record($validated);

        return response()->json([
            'message' => 'Attendance recorded successfully',
            'data'    => $attendance
        ], 201);


}*/


// [2025-08-28 12:55:00] local.INFO: Attendance Batch Syncing.... hr/attendance/batch-store {"attendances":[{"user_id":1,"employee_id":"EMP-2025-001","attendance_date":"2025-08-28","check_in_time":"2025-08-28 12:54:59","check_out_time":null,"device_id":"c213a4332a9f801a","device_name":"INFINIX Infinix X6835B","location_name":"Jahi","latitude":9.1025398,"longitude":7.4428867,"sync_status":"pending","notes":null}]}
// [2025-08-28 12:55:13] local.INFO: Attendance Batch Syncing.... hr/attendance/batch-store {"attendances":[{"user_id":1,"employee_id":"EMP-2025-001","attendance_date":"2025-08-28","check_in_time":"2025-08-28 12:54:59","check_out_time":"2025-08-28 12:55:12","device_id":"c213a4332a9f801a","device_name":"INFINIX Infinix X6835B","location_name":"Jahi","latitude":9.1025398,"longitude":7.4428867,"sync_status":"pending","notes":null}]}


public function batchStore(SyncAttendanceBatchRequest $request): JsonResponse
{

    \Log::info("Syncing.... hr/attendance/batch-store");

    \Log::info("Attendance Batch Syncing.... hr/attendance/batch-store", $request->all());
    $data = $request->validated()['attendances'];
    \Log::info("Successfully Attendance Validated.... hr/attendance/batch-store", $data);





    DB::beginTransaction();
    try {
        foreach ($data as $record) {
            $this->attendanceService->record($record);
        }

        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => count($data) . ' attendance records synced successfully'
        ], 201);

    } catch (\Throwable $e) {
        DB::rollBack();
        \Log::error("Batch sync failed: " . $e->getMessage(), [
            'trace' => $e->getTraceAsString(),
        ]);

        return response()->json([
            'status' => 'error',
            'message' => 'Batch sync failed',
            'error'   => $e->getMessage(),
        ], 500);
    }
}







}

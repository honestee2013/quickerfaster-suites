<?php


use Illuminate\Support\Facades\Route;
use App\Modules\Hr\Http\Controllers\IdCardController;
use App\Modules\Hr\Http\Controllers\PayrollRunController;

use Illuminate\Support\Carbon;


// Example route for HR managers to view a specific employee's ID card
// This route should be protected by appropriate authorization (e.g., 'role:hr_manager')
Route::middleware(['auth'])->group(function () {
    Route::get('/employee-id-card/show/{id}', [IdCardController::class, 'showEmployeeIdCard'])->name('show.employee.id.card');
    Route::get('/employee-id-card/download/{id}', [IdCardController::class, 'downloadEmployeeIdCard'])->name('download.employee.id.card');
    Route::get('/payroll-runs/{payrollRun}/generate', [PayrollRunController::class, 'generatePayroll'])
    ->name('payroll-runs.generate');

});


Route::get("testing", function () {
    $time = "1756491473963";

    $afterNormalise = normalizeDate($time);//, false, 'Africa/Lagos');
    echo $afterNormalise; // should now be 2025-08-29 18:17:53 UTC (which equals 19:17:53 Lagos)
});



 function normalizeDate($value, bool $forceDateOnly = false, ?string $deviceTz = null): ?string
{
    if ($value === null || $value === '') {
        return null;
    }

    try {
        $tz = $deviceTz ?: config('app.local_timezone', 'Africa/Lagos');

        if (is_numeric($value)) {
            $v = (int)$value;

            // Treat device timestamp as UTC, then shift into local TZ
            if ($v > 1_000_000_000_000) {
                $carbon = Carbon::createFromTimestampMsUTC($v)->setTimezone($tz);
            } else {
                $carbon = Carbon::createFromTimestampUTC($v)->setTimezone($tz);
            }
        } else {
            // String → respect offset if present, else assume UTC then shift
            if (preg_match('/[Z\+\-]\d{2}(:?\d{2})?$/', $value)) {
                $carbon = Carbon::parse($value)->setTimezone($tz);
            } else {
                $carbon = Carbon::parse($value, 'UTC')->setTimezone($tz);
            }
        }


        // Optional Always store in UTC
        // $carbon->setTimezone('UTC');

        return $forceDateOnly
            ? $carbon->toDateString()
            : $carbon->toDateTimeString();

    } catch (\Throwable $e) {
        \Log::warning('normalizeDate failed', [
            'value' => $value,
            'error' => $e->getMessage()
        ]);
        return null;
    }
}










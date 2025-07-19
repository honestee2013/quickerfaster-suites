<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;


use App\Modules\Hr\Http\Controllers\PayrollRunController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Modules\Hr\Http\Controllers\IdCardController;


/*

Route::middleware(['auth'])->group(function () {
    Route::get('/show-employee-id-card', [IdCardController::class, 'showEmployeeIdCard'])->name('show.employee.id.card');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/download-employee-id-card', [IdCardController::class, 'downloadEmployeeIdCard'])->name('download.employee.id.card');
});







// Example route for the authenticated user to view their own ID card
Route::middleware(['auth'])->group(function () {
    Route::get('/my-id-card', [IdCardController::class, 'showMyIdCard'])->name('my.id.card');
});

// Example routes for downloading ID cards
Route::middleware(['auth'])->group(function () {
    Route::get('/download-id-card', [IdCardController::class, 'downloadMyIdCard'])->name('download.id.card');
});*/









/*
// Example route for HR managers to view a specific employee's ID card
// This route should be protected by appropriate authorization (e.g., 'role:hr_manager')
Route::middleware(['auth', 'can:view-employee-id-cards'])->group(function () {
    Route::get('/employee/{userId}/id-card', [IdCardController::class, 'showEmployeeIdCard'])->name('employee.id.card');
});


// For HR manager to download other employee's ID cards
Route::middleware(['auth', 'can:download-employee-id-cards'])->group(function () {
    Route::get('/employee/{userId}/id-card/download', [IdCardController::class, 'downloadEmployeeIdCard'])->name('employee.id.card.download');
});



*/










// routes/web.php
Route::get('/payroll-runs/{payrollRun}/generate', [PayrollRunController::class, 'generatePayroll'])
    ->name('payroll-runs.generate');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function() {
        return redirect("hr/employee-profiles");
    });
	Route::get('dashboard', function () {
		return redirect("hr/employee-profiles");
	})->name('dashboard');

    //Route::get('/', [HomeController::class, 'home']);
    /*Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');*/

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);

    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');














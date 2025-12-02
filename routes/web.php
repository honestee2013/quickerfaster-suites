<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Phase 1 Test Route
Route::get('/test-phase1', function() {
    return response()->json([
        'status' => 'success',
        'phase' => 1,
        'message' => 'Basic Laravel is working',
        'timestamp' => now(),
        'php_version' => PHP_VERSION,
    ]);
});


Route::get('/phase1-test', function() {
    return view('test.phase1');
});




// Phase 2 Test Routes
Route::get('/phase2-test', function() {
    return view('test.phase2');
});

Route::get('/test-phase2', function() {
    return response()->json([
        'status' => 'success',
        'phase' => 2,
        'message' => 'Bootstrap and Icons are working',
        'components_tested' => [
            'bootstrap_css' => true,
            'bootstrap_js' => true,
            'bootstrap_icons' => true,
            'grid_system' => true,
            'components' => ['buttons', 'dropdowns', 'alerts', 'progress_bars'],
        ],
        'timestamp' => now(),
    ]);
});

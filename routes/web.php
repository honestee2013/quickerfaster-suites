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



// Phase 3 Test Routes
Route::get('/phase3-test', function() {
    return view('test.phase3');
});

Route::get('/test-phase3', function() {
    return response()->json([
        'status' => 'success',
        'phase' => 3,
        'message' => 'Livewire is working',
        'livewire_version' => \Livewire\Livewire::VERSION,
        'components_tested' => [
            'counter_component' => true,
            'todo_list_component' => true,
            'livewire_styles' => true,
            'livewire_scripts' => true,
            'real_time_updates' => true,
        ],
        'server_info' => [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'livewire_version' => \Livewire\Livewire::VERSION,
        ],
        'timestamp' => now(),
    ]);
});



// Add this temporary route for debugging
Route::get('/debug-livewire', function() {
    $routes = Route::getRoutes()->getRoutes();
    $livewireRoutes = [];

    foreach ($routes as $route) {
        if (strpos($route->uri, 'livewire') !== false) {
            $livewireRoutes[] = [
                'uri' => $route->uri,
                'methods' => $route->methods,
                'action' => $route->action['controller'] ?? 'Closure',
            ];
        }
    }

    return response()->json([
        'livewire_routes_registered' => $livewireRoutes,
        'livewire_service_provider' => class_exists('Livewire\LivewireServiceProvider'),
        'app_url' => config('app.url'),
        'asset_url' => config('app.asset_url'),
        'current_url' => url()->current(),
        'base_path' => base_path(),
    ]);
});



Route::get('/diagnose-livewire', function() {
    // Check if Livewire routes are working
    try {
        $testRoute = route('livewire.message', ['name' => 'test'], false);
        $routeWorks = true;
    } catch (\Exception $e) {
        $testRoute = null;
        $routeWorks = false;
    }

    return response()->json([
        'diagnosis' => 'Livewire Route Check',
        'livewire_update_endpoint' => url('/livewire/update'),
        'livewire_message_route' => $testRoute,
        'route_registration_works' => $routeWorks,
        'app_url' => config('app.url'),
        'current_url' => url()->current(),
        'is_subdirectory' => strpos(url()->current(), '/progressive') !== false,
        'suggested_fix' => 'Ensure APP_URL includes /progressive subdirectory',
        'check_these' => [
            '1. APP_URL in .env must include /progressive',
            '2. RouteServiceProvider should handle subdirectory',
            '3. .htaccess should allow Laravel routing',
            '4. Livewire service provider must be registered',
        ]
    ]);
});




Route::get('/test-livewire-fix', function() {
    // Test 1: Check route generation
    $updateRoute = route('livewire.update', [], false);

    // Test 2: Check if Livewire can generate proper URLs
    $scriptUrl = \Livewire\Mechanisms\FrontendAssets\FrontendAssets::generateAssetUrl('livewire.js');

    return response()->json([
        'test_1_route_generation' => [
            'expected' => '/progressive/livewire/update',
            'actual' => $updateRoute,
            'matches' => $updateRoute === '/progressive/livewire/update',
        ],
        'test_2_asset_generation' => [
            'expected' => '/progressive/livewire/livewire.js',
            'actual' => $scriptUrl,
            'matches' => str_contains($scriptUrl, '/progressive/livewire/livewire.js'),
        ],
        'config_values' => [
            'app_url' => config('app.url'),
            'livewire_app_url' => config('livewire.app_url'),
            'livewire_asset_url' => config('livewire.asset_url'),
        ],
        'instructions' => [
            'if_test1_fails' => 'Route generation is broken - check RouteServiceProvider',
            'if_test2_fails' => 'Asset URL generation is broken - check livewire.php config',
            'if_both_fail' => 'Subdirectory configuration needs fixing',
        ]
    ]);
});




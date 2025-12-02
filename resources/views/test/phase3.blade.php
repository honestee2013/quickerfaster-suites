@extends('layouts.app')

@section('title', 'Phase 3 Test - Livewire')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card test-card shadow">
            <div class="card-header bg-white">
                <h2 class="h4 mb-0">
                    <i class="bi bi-lightning-charge-fill text-warning me-2"></i>
                    Phase 3: Livewire Components Test
                </h2>
            </div>

            <div class="card-body">
                <!-- Livewire Status Check -->
                <div class="alert alert-info mb-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle-fill me-3 display-6"></i>
                        <div>
                            <h5 class="alert-heading mb-1">Livewire Status Check</h5>
                            <p class="mb-2">Click the button below to verify Livewire is loaded:</p>
                            <button onclick="checkLivewire()" class="btn btn-sm btn-outline-info">
                                <i class="bi bi-plug me-1"></i> Check Livewire Status
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Test 1: Counter Component -->
                <h3 class="h5 mb-3 border-bottom pb-2">
                    <i class="bi bi-1-circle text-primary me-2"></i>
                    Test 1: Counter Component
                </h3>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <livewire:counter />
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="bi bi-check2-circle text-success me-2"></i>
                                    What to Test:
                                </h5>
                                <ul>
                                    <li>Click increment/decrement buttons</li>
                                    <li>Click reset button</li>
                                    <li>Type in the name field (should update live)</li>
                                    <li>Verify loading spinner appears during actions</li>
                                    <li>Check browser console for Livewire events</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Test 2: Todo List Component -->
                <h3 class="h5 mb-3 border-bottom pb-2">
                    <i class="bi bi-2-circle text-success me-2"></i>
                    Test 2: Todo List Component
                </h3>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <livewire:todo-list />
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="bi bi-check2-circle text-success me-2"></i>
                                    What to Test:
                                </h5>
                                <ul>
                                    <li>Add new tasks using the input field</li>
                                    <li>Check/uncheck tasks to toggle completion</li>
                                    <li>Delete tasks using the trash icon</li>
                                    <li>Notice live updates without page refresh</li>
                                    <li>Test Enter key to add tasks</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Test 3: Real-time Data Display -->
                <h3 class="h5 mb-3 border-bottom pb-2">
                    <i class="bi bi-3-circle text-warning me-2"></i>
                    Test 3: Server Data Display
                </h3>
                <div class="mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="card-title">
                                        <i class="bi bi-server me-2"></i>
                                        Server Information (Live from PHP)
                                    </h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <small class="text-muted d-block">PHP Version</small>
                                                <strong>{{ PHP_VERSION }}</strong>
                                            </div>
                                            <div class="mb-2">
                                                <small class="text-muted d-block">Laravel Version</small>
                                                <strong>{{ app()->version() }}</strong>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <small class="text-muted d-block">Current Time</small>
                                                <strong>{{ now()->format('Y-m-d H:i:s') }}</strong>
                                            </div>
                                            <div class="mb-2">
                                                <small class="text-muted d-block">Environment</small>
                                                <strong>{{ app()->environment() }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="display-6">
                                        <i class="bi bi-cpu"></i>
                                    </div>
                                    <small class="text-muted">Live Data</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Test Results -->
                <div class="alert @if(false) alert-danger @else alert-success @endif">
                    <h4 class="alert-heading">
                        <i class="bi bi-check-all me-2"></i>
                        Phase 3 Test Results
                    </h4>
                    <p class="mb-2">
                        <strong>Status:</strong>
                        <span class="badge bg-success">READY FOR TESTING</span>
                    </p>
                    <p class="mb-0">
                        If both Livewire components work without page refresh and all interactions
                        update in real-time, Livewire is working correctly.
                    </p>
                </div>

                <!-- Debug Information -->
                <div class="card border-warning">
                    <div class="card-header bg-warning bg-opacity-10">
                        <h5 class="mb-0">
                            <i class="bi bi-bug text-warning me-2"></i>
                            Debug Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-2">What to check in Browser Console:</h6>
                        <ol class="small">
                            <li>Open Developer Tools (F12)</li>
                            <li>Go to Console tab</li>
                            <li>Look for:
                                <ul>
                                    <li>"Phase 3: Livewire loaded successfully"</li>
                                    <li>"Livewire component mounted" messages</li>
                                    <li>No red error messages</li>
                                </ul>
                            </li>
                            <li>Go to Network tab:
                                <ul>
                                    <li>Filter for "livewire/update" requests</li>
                                    <li>Check they return 200 status</li>
                                </ul>
                            </li>
                        </ol>

                        <div class="text-center mt-3">
                            <a href="/progressive/test-phase3" class="btn btn-outline-warning">
                                <i class="bi bi-cloud-arrow-up me-1"></i>
                                Test API Endpoint
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

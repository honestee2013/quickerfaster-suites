@extends('layouts.app')

@section('title', 'Phase 2 Test - Bootstrap')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card test-card shadow">
            <div class="card-header bg-white">
                <h2 class="h4 mb-0">
                    <i class="bi bi-bootstrap text-primary me-2"></i>
                    Phase 2: Bootstrap & Icons Test
                </h2>
            </div>

            <div class="card-body">
                <!-- Test 1: Bootstrap Grid -->
                <h3 class="h5 mb-3">1. Bootstrap Grid System</h3>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="p-3 bg-primary text-white rounded">
                            <i class="bi bi-columns-gap"></i> Column 1
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-success text-white rounded">
                            <i class="bi bi-columns"></i> Column 2
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-warning text-dark rounded">
                            <i class="bi bi-grid-3x3-gap"></i> Column 3
                        </div>
                    </div>
                </div>

                <!-- Test 2: Bootstrap Components -->
                <h3 class="h5 mb-3">2. Bootstrap Components</h3>
                <div class="row g-3 mb-4">
                    <div class="col-auto">
                        <button class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i>
                            Primary Button
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-success">
                            <i class="bi bi-plus-circle me-1"></i>
                            Success Button
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-warning" data-bs-toggle="tooltip" title="Tooltip works!">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            Tooltip Button
                        </button>
                    </div>
                    <div class="col-auto">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                <i class="bi bi-list me-1"></i>
                                Dropdown
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-house me-2"></i> Home</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Test 3: Bootstrap Icons -->
                <h3 class="h5 mb-3">3. Bootstrap Icons</h3>
                <div class="row g-2 mb-4">
                    <div class="col-auto">
                        <span class="badge bg-primary">
                            <i class="bi bi-heart-fill me-1"></i> Love
                        </span>
                    </div>
                    <div class="col-auto">
                        <span class="badge bg-success">
                            <i class="bi bi-star-fill me-1"></i> Star
                        </span>
                    </div>
                    <div class="col-auto">
                        <span class="badge bg-warning">
                            <i class="bi bi-shield-fill me-1"></i> Shield
                        </span>
                    </div>
                    <div class="col-auto">
                        <span class="badge bg-danger">
                            <i class="bi bi-fire me-1"></i> Fire
                        </span>
                    </div>
                    <div class="col-auto">
                        <span class="badge bg-info">
                            <i class="bi bi-cloud-fill me-1"></i> Cloud
                        </span>
                    </div>
                </div>

                <!-- Test 4: Alerts -->
                <h3 class="h5 mb-3">4. Bootstrap Alerts</h3>
                <div class="mb-4">
                    <div class="alert alert-primary" role="alert">
                        <i class="bi bi-info-circle me-2"></i>
                        This is a primary alert with an icon.
                    </div>
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        Success! Bootstrap is working correctly.
                    </div>
                    <div class="alert alert-warning" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Warning: Check browser console for any issues.
                    </div>
                </div>

                <!-- Test 5: Progress Bars -->
                <h3 class="h5 mb-3">5. Progress Indicators</h3>
                <div class="mb-4">
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar" role="progressbar" style="width: 25%">
                            25% Complete
                        </div>
                    </div>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%">
                            50% Complete
                        </div>
                    </div>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%">
                            75% Complete
                        </div>
                    </div>
                </div>

                <!-- Test Results -->
                <div class="alert alert-success">
                    <h4 class="alert-heading">
                        <i class="bi bi-check-all me-2"></i>
                        Phase 2 Test Results
                    </h4>
                    <p class="mb-2">
                        <strong>Status:</strong>
                        <span class="badge bg-success">READY FOR TESTING</span>
                    </p>
                    <p class="mb-0">
                        If you can see all components above with proper styling and icons,
                        Bootstrap is working correctly. Check the browser console for any errors.
                    </p>
                </div>

                <!-- Next Steps -->
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-arrow-right-circle text-primary me-2"></i>
                            What to Test:
                        </h5>
                        <ol>
                            <li>All buttons should have proper styling</li>
                            <li>Icons should display correctly</li>
                            <li>Dropdown should work when clicked</li>
                            <li>Tooltip should appear when hovering the warning button</li>
                            <li>Check browser console for JavaScript errors</li>
                            <li>Verify page is responsive (try mobile view)</li>
                        </ol>
                        <div class="text-center mt-3">
                            <a href="/progressive/test-phase2" class="btn btn-outline-primary">
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

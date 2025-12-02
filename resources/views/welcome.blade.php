@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="text-center py-5">
    <div class="mb-4">
        <i class="bi bi-lightning-charge-fill display-1 text-warning"></i>
    </div>
    <h1 class="display-5 fw-bold">Progressive SaaS</h1>
    <p class="lead mb-4">
        Step-by-step deployment testing. Currently on <strong>Phase 3: Livewire</strong>
    </p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <a href="/progressive/phase1-test" class="btn btn-outline-secondary btn-lg px-4">
            <i class="bi bi-1-circle me-1"></i> Phase 1
        </a>
        <a href="/progressive/phase2-test" class="btn btn-outline-primary btn-lg px-4">
            <i class="bi bi-2-circle me-1"></i> Phase 2
        </a>
        <a href="/progressive/phase3-test" class="btn btn-warning btn-lg px-4">
            <i class="bi bi-3-circle me-1"></i> Phase 3
        </a>
    </div>

    <!-- Livewire Preview -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-lightning me-2"></i>
                        Livewire Features Demonstrated
                    </h5>
                    <div class="row text-start">
                        <div class="col-md-6">
                            <ul>
                                <li>Real-time updates without page refresh</li>
                                <li>Two-way data binding</li>
                                <li>Component-based architecture</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>Automatic loading states</li>
                                <li>Event-driven interactions</li>
                                <li>Server-side rendering with client-side interactivity</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

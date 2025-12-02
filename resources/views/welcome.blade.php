@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="text-center py-5">
    <div class="mb-4">
        <i class="bi bi-layers-half display-1 text-primary"></i>
    </div>
    <h1 class="display-5 fw-bold">Progressive SaaS</h1>
    <p class="lead mb-4">
        Step-by-step deployment testing. Currently on <strong>Phase 2: Bootstrap</strong>
    </p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="/progressive/phase1-test" class="btn btn-outline-secondary btn-lg px-4">
            <i class="bi bi-1-circle me-1"></i> Phase 1
        </a>
        <a href="/progressive/phase2-test" class="btn btn-primary btn-lg px-4">
            <i class="bi bi-2-circle me-1"></i> Phase 2
        </a>
    </div>
</div>
@endsection

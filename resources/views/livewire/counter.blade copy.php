<div class="card shadow-sm mb-4">
    <div class="card-header bg-white">
        <h5 class="mb-0">
            <i class="bi bi-calculator text-primary me-2"></i>
            Livewire Counter Component
        </h5>
    </div>
    <div class="card-body">
        <!-- Counter Display -->
        <div class="text-center mb-4">
            <div class="display-4 fw-bold @if($count > 0) text-success @elseif($count < 0) text-danger @else text-secondary @endif">
                {{ $count }}
            </div>
            <div class="text-muted small">Current Count</div>
        </div>

        <!-- Counter Controls -->
        <div class="d-flex justify-content-center gap-2 mb-4">
            <button wire:click="decrement" class="btn btn-danger">
                <i class="bi bi-dash-lg"></i> Decrement
            </button>
            <button wire:click="resetCounter" class="btn btn-secondary">
                <i class="bi bi-arrow-clockwise"></i> Reset
            </button>
            <button wire:click="increment" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Increment
            </button>
        </div>

        <!-- Name Input with Livewire Binding -->
        <div class="mb-3">
            <label class="form-label">
                <i class="bi bi-person-badge me-1"></i>
                Enter your name (live updates)
            </label>
            <input
                type="text"
                class="form-control"
                wire:model.live="name"
                placeholder="Type to see live updates..."
            >
        </div>

        <!-- Message Display -->
        @if($message)
            <div class="alert alert-info">
                <i class="bi bi-chat-left-text me-2"></i>
                {{ $message }}
            </div>
        @endif

        <!-- Livewire Status -->
        <div class="mt-3">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    <i class="bi bi-lightning-charge-fill text-warning me-1"></i>
                    Livewire Component ID: <code>{{ $this->getId() }}</code>
                </small>
                <div class="spinner-border spinner-border-sm text-primary" wire:loading>
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>

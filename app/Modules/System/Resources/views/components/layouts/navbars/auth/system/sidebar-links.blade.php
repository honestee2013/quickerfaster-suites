{{-- Sidebar Links for system --}}

@include('system.views::components.layouts.navbars.auth.system/sidebar-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item text-nowrap">
<a href="/system/plans" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Subscription Plans">
<i class="fas fa-receipt me-2"></i>
@if ($state === 'full')
<span>Subscription Plans</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/system/companies" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Companies (Tenants)">
<i class="fas fa-building me-2"></i>
@if ($state === 'full')
<span>Companies (Tenants)</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/system/modules" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Modules">
<i class="fas fa-puzzle-piece me-2"></i>
@if ($state === 'full')
<span>Modules</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/system/subscriptions" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Subscriptions">
<i class="fas fa-file-invoice-dollar me-2"></i>
@if ($state === 'full')
<span>Subscriptions</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
    <a href="/system/availabled-databases" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Databases Pools">
        <i class="fas fa-cog me-2"></i>
        @if ($state === 'full')
            <span>Databases Pools</span>
        @endif
    </a>
</li>

@include('system.views::components.layouts.navbars.auth.system/sidebar-post-links')

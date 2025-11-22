{{-- Sidebar Links for hr --}}

@include('hr.views::components.layouts.navbars.auth.people/sidebar-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item text-nowrap">
<a href="/hr/employees" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Employees">
<i class="fas fa-user-friends me-2"></i>
@if ($state === 'full')
<span>Employees</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/employee-positions" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Job Information">
<i class="fas fa-briefcase me-2"></i>
@if ($state === 'full')
<span>Job Information</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/employee-profiles" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Profiles">
<i class="fas fa-user-circle me-2"></i>
@if ($state === 'full')
<span>Profiles</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
    <a href="/hr/documents" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Documents">
        <i class="fas fa-file me-2"></i>
        @if ($state === 'full')
            <span>Documents</span>
        @endif
    </a>
</li>

@include('hr.views::components.layouts.navbars.auth.people/sidebar-post-links')

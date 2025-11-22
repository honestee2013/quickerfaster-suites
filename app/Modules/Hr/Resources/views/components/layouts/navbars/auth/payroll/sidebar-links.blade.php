{{-- Sidebar Links for hr --}}

@include('hr.views::components.layouts.navbars.auth.payroll/sidebar-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item text-nowrap">
<a href="/hr/pay-schedules" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Pay Schedules">
<i class="fas fa-calendar-alt me-2"></i>
@if ($state === 'full')
<span>Pay Schedules</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/employee-payroll-profiles" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Employees">
<i class="fas fa-user-tie me-2"></i>
@if ($state === 'full')
<span>Employees</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/payroll-runs" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Pay Runs">
<i class="fas fa-file-invoice-dollar me-2"></i>
@if ($state === 'full')
<span>Pay Runs</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
    <a href="/hr/payroll-payslips" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Payslips">
        <i class="fas fa-receipt me-2"></i>
        @if ($state === 'full')
            <span>Payslips</span>
        @endif
    </a>
</li>

@include('hr.views::components.layouts.navbars.auth.payroll/sidebar-post-links')

{{-- Sidebar Links for hr --}}

@include('hr.views::components.layouts.navbars.auth.time/sidebar-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item text-nowrap">
<a href="/hr/clock-events" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Clock Events">
<i class="fas fa-clock-events me-2"></i>
@if ($state === 'full')
<span>Clock Events</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/attendances" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Attendance">
<i class="fas fa-clock me-2"></i>
@if ($state === 'full')
<span>Attendance</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/shifts" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Shifts">
<i class="fas fa-calendar-day me-2"></i>
@if ($state === 'full')
<span>Shifts</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/timesheets" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Timesheets">
<i class="fas fa-file-alt me-2"></i>
@if ($state === 'full')
<span>Timesheets</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
    <a href="/hr/holiday-calendars" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Holiday Calendars">
        <i class="fas fa-calendar-plus me-2"></i>
        @if ($state === 'full')
            <span>Holiday Calendars</span>
        @endif
    </a>
</li>

@include('hr.views::components.layouts.navbars.auth.time/sidebar-post-links')

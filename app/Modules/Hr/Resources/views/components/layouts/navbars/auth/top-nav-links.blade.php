{{-- Top Nav Links for hr --}}

@include('hr.views::components.layouts.navbars.auth.top-nav-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item">
    <a href="/hr/departments"
        class="nav-link @if(request()->is('hr/departments') || request()->is('hr/departments/*')) fw-bold text-primary @endif">
        @if(request()->is('hr/departments') || request()->is('hr/departments/*')) 
            <i class="fas fas fa-cog" aria-hidden="true"></i> 
        @endif
        <span>Settings</span>
    </a>
</li>
<li class="nav-item">
    <a href="/hr/employees"
        class="nav-link @if(request()->is('hr/employees') || request()->is('hr/employees/*')) fw-bold text-primary @endif">
        @if(request()->is('hr/employees') || request()->is('hr/employees/*')) 
            <i class="fas fas fa-user-friends" aria-hidden="true"></i> 
        @endif
        <span>People</span>
    </a>
</li>
<li class="nav-item">
    <a href="/hr/employee-payroll-profiles"
        class="nav-link @if(request()->is('hr/employee-payroll-profiles') || request()->is('hr/employee-payroll-profiles/*')) fw-bold text-primary @endif">
        @if(request()->is('hr/employee-payroll-profiles') || request()->is('hr/employee-payroll-profiles/*')) 
            <i class="fas fas fa-dollar-sign" aria-hidden="true"></i> 
        @endif
        <span>Payroll</span>
    </a>
</li>
<li class="nav-item">
    <a href="/hr/attendances"
        class="nav-link @if(request()->is('hr/attendances') || request()->is('hr/attendances/*')) fw-bold text-primary @endif">
        @if(request()->is('hr/attendances') || request()->is('hr/attendances/*')) 
            <i class="fas fas fa-clock" aria-hidden="true"></i> 
        @endif
        <span>Time</span>
    </a>
</li>

@include('hr.views::components.layouts.navbars.auth.top-nav-post-links')

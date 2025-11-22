{{-- Top Nav Links for admin --}}

@include('admin.views::components.layouts.navbars.auth.top-nav-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item">
    <a href="/admin/users"
        class="nav-link @if(request()->is('admin/users') || request()->is('admin/users/*')) fw-bold text-primary @endif">
        @if(request()->is('admin/users') || request()->is('admin/users/*')) 
            <i class="fas fas fa-user-cog" aria-hidden="true"></i> 
        @endif
        <span>Users & Permissions</span>
    </a>
</li>
<li class="nav-item">
    <a href="/admin/locations"
        class="nav-link @if(request()->is('admin/locations') || request()->is('admin/locations/*')) fw-bold text-primary @endif">
        @if(request()->is('admin/locations') || request()->is('admin/locations/*')) 
            <i class="fas fas fa-cogs" aria-hidden="true"></i> 
        @endif
        <span>System Settings</span>
    </a>
</li>

@include('admin.views::components.layouts.navbars.auth.top-nav-post-links')

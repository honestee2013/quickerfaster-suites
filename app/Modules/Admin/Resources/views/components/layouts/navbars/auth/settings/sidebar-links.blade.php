{{-- Sidebar Links for admin --}}

@include('admin.views::components.layouts.navbars.auth.settings/sidebar-pre-links')

{{-- Generated Links --}}
<li class="nav-item text-nowrap">
    <a href="/admin/locations" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Locations">
        <i class="fas fa-map-marker-alt me-2"></i>
        @if ($state === 'full')
            <span>Locations</span>
        @endif
    </a>
</li>

@include('admin.views::components.layouts.navbars.auth.settings/sidebar-post-links')

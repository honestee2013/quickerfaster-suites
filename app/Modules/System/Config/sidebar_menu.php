<?php

return [
    [
    'itemType' => 'item-separator',
    'title' => '<h6 class="ps-3 mt-4 mb-2 text-uppercase text-xs font-weight-bolder opacity-6 group-title">System</h6>',
    'url' => null,
],
    [
    'title' => 'Subscription Plans',
    'icon' => 'fas fa-receipt',
    'url' => 'system/plans',
    'permission' => 'manage-system',
    'groupTitle' => 'System',
],
    [
    'title' => 'Companies (Tenants)',
    'icon' => 'fas fa-building',
    'url' => 'system/companies',
    'permission' => 'manage-system',
    'groupTitle' => 'System',
],
    [
    'title' => 'Modules',
    'icon' => 'fas fa-puzzle-piece',
    'url' => 'system/modules',
    'permission' => 'manage-system',
    'groupTitle' => 'System',
],
    [
    'title' => 'Subscriptions',
    'icon' => 'fas fa-file-invoice-dollar',
    'url' => 'system/subscriptions',
    'permission' => 'manage-system',
    'groupTitle' => 'System',
],
    [
    'title' => 'Databases Pools',
    'icon' => 'fas fa-cog',
    'url' => 'system/availabled-databases',
    'permission' => 'view_available_database',
    'groupTitle' => 'System',
],
];

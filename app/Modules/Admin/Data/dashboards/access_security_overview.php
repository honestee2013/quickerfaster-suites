<?php

return array (
  'title' => 'Admin & Security Overview',
  'description' => 'User activity, role distribution, and system security status',
  'widgets' => 
  array (
    'total_users' => 
    array (
      'type' => 'icon-card',
      'title' => 'Total Users',
      'size' => 'col-sm-3',
      'model' => 'App\\Modules\\Admin\\Models\\User',
      'calculation_method' => 'count',
      'icon' => 'fas fa-users',
    ),
    'active_users' => 
    array (
      'type' => 'icon-card',
      'title' => 'Active Users',
      'size' => 'col-sm-3',
      'model' => 'App\\Modules\\Admin\\Models\\User',
      'calculation_method' => 'count',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'status',
          1 => '=',
          2 => 'active',
        ),
      ),
      'icon' => 'fas fa-user-check',
      'color' => 'success',
    ),
    'total_roles' => 
    array (
      'type' => 'icon-card',
      'title' => 'Custom Roles',
      'size' => 'col-sm-3',
      'model' => 'App\\Modules\\Admin\\Models\\Role',
      'calculation_method' => 'count',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'editable',
          1 => '=',
          2 => 'Yes',
        ),
      ),
      'icon' => 'fas fa-user-shield',
    ),
    'unverified_users' => 
    array (
      'type' => 'icon-card',
      'title' => 'Pending Verification',
      'size' => 'col-sm-3',
      'model' => 'App\\Modules\\Admin\\Models\\User',
      'calculation_method' => 'count',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'email_verified_at',
          1 => '=',
          2 => NULL,
        ),
        1 => 
        array (
          0 => 'status',
          1 => '!=',
          2 => 'inactive',
        ),
      ),
      'icon' => 'fas fa-envelope',
      'color' => 'warning',
    ),
    'roles_distribution' => 
    array (
      'type' => 'chart',
      'title' => 'Users by Role',
      'size' => 'col-6',
      'model' => 'App\\Modules\\Admin\\Models\\User',
      'chart_type' => 'pie',
      'controls' => 
      array (
        0 => 'chart_type',
      ),
    ),
    'user_activity_last_30_days' => 
    array (
      'type' => 'chart',
      'title' => 'User Logins (Last 30 Days)',
      'size' => 'col-6',
      'model' => 'App\\Modules\\Admin\\Models\\User',
      'group_by' => 'daily',
      'chart_type' => 'line',
      'controls' => 
      array (
        0 => 'time_duration',
      ),
    ),
    'security_alerts' => 
    array (
      'type' => 'alert-list',
      'title' => 'Security Alerts',
      'size' => 'col-12',
    ),
    'recent_user_changes' => 
    array (
      'type' => 'activity-feed',
      'title' => 'Recent Admin Changes',
      'size' => 'col-12',
      'model' => 'Spatie\\Activitylog\\Models\\Activity',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'log_name',
          1 => '=',
          2 => 'admin',
        ),
      ),
    ),
  ),
  'roles' => 
  array (
    'admin' => 'full',
    'manager' => 'limited',
    'user' => 'none',
  ),
);

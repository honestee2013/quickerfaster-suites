<?php

return array (
  'title' => 'People Management Overview',
  'description' => 'Employee statistics, hiring trends, and team analytics',
  'widgets' => 
  array (
    'total_employees' => 
    array (
      'type' => 'icon-card',
      'title' => 'Total Employees',
      'size' => 'col-sm-4',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'calculation_method' => 'count',
      'icon' => 'fas fa-users',
    ),
    'active_employees' => 
    array (
      'type' => 'icon-card',
      'title' => 'Active Employees',
      'size' => 'col-sm-4',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'calculation_method' => 'count',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'status',
          1 => '=',
          2 => 'Active',
        ),
      ),
      'icon' => 'fas fa-user-check',
      'color' => 'success',
    ),
    'new_hires_this_month' => 
    array (
      'type' => 'icon-card',
      'title' => 'New Hires This Month',
      'size' => 'col-sm-4',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'calculation_method' => 'count',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'hire_date',
          1 => '>=',
          2 => 'startOfMonth()',
        ),
      ),
      'icon' => 'fas fa-user-plus',
      'color' => 'info',
    ),
    'employees_by_department' => 
    array (
      'type' => 'chart',
      'title' => 'Employees by Department',
      'size' => 'col-6',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'pivot' => 
      array (
        'table' => 'employees',
        'model_column' => 'department_id',
      ),
      'group_by_table' => 'departments',
      'group_by_table_column' => 'name',
      'chart_type' => 'bar',
      'controls' => 
      array (
        0 => 'chart_type',
      ),
    ),
    'hiring_trends' => 
    array (
      'type' => 'chart',
      'title' => 'Hiring Trends',
      'size' => 'col-6',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'group_by' => 'monthly',
      'chart_type' => 'line',
      'controls' => 
      array (
        0 => 'chart_type',
        1 => 'time_duration',
      ),
    ),
  ),
);

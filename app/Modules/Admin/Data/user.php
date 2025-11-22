<?php

return [
  'model' => 'App\Modules\Admin\Models\User',
  'fieldDefinitions' => [
    'name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Full Name',
      'validation' => 'required|string|max:255',
      'wizard' => [
        'user_onboarding' => true,
      ],
    ],
    'email' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Email Address',
      'validation' => 'required|email|max:255|unique:users,email',
      'wizard' => [
        'user_onboarding' => true,
      ],
    ],
    'email_verified_at' => [
      'display' => 'inline',
      'field_type' => 'datetime',
      'label' => 'Email Verified At',
      'maxSizeMB' => 1,
    ],
    'password' => [
      'display' => 'inline',
      'field_type' => 'password',
      'label' => 'Password',
      'validation' => 'required|string|min:8|confirmed',
      'wizard' => [
        'user_onboarding' => true,
      ],
    ],
    'password_confirmation' => [
      'display' => 'inline',
      'field_type' => 'password',
      'label' => 'Confirm Password',
      'validation' => 'required_with:password|same:password',
    ],
    'remember_token' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Remember Token',
      'maxSizeMB' => 1,
    ],
    'user_type' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'User Type',
      'validation' => 'required|string',
      'options' => [
        'admin' => 'Administrator',
        'hr_manager' => 'HR Manager',
        'employee' => 'Employee',
        'viewer' => 'Viewer',
      ],
      'wizard' => [
        'user_onboarding' => true,
      ],
    ],
    'status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Status',
      'validation' => 'required',
      'options' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
        'invited' => 'Invited',
      ],
    ],
    'roles' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\Admin\Models\Role',
        'type' => 'belongsToMany',
        'display_field' => 'name',
        'hintField' => '',
        'dynamic_property' => 'roles',
        'foreign_key' => '',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Admin\Models\Role',
        'column' => 'name',
        'hintField' => '',
      ],
      'label' => 'Roles',
      'multiSelect' => true,
      'display' => 'inline',
    ],
    'permissions' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\Admin\Models\Permission',
        'type' => 'belongsToMany',
        'display_field' => 'name',
        'hintField' => '',
        'dynamic_property' => 'permissions',
        'foreign_key' => '',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Admin\Models\Permission',
        'column' => 'name',
        'hintField' => '',
      ],
      'label' => 'Permissions',
      'multiSelect' => true,
      'display' => 'inline',
    ],
  ],
  'hiddenFields' => [
    'onTable' => [
      '0' => 'password',
      '1' => 'remember_token',
      '2' => 'email_verified_at',
    ],
    'onNewForm' => [
      '0' => 'email_verified_at',
      '1' => 'remember_token',
      '2' => 'status',
    ],
    'onEditForm' => [
      '0' => 'password',
      '1' => 'password_confirmation',
      '2' => 'remember_token',
      '3' => 'email_verified_at',
    ],
    'onQuery' => [],
  ],
  'simpleActions' => [
    '0' => 'show',
    '1' => 'edit',
    '2' => 'delete',
  ],
  'isTransaction' => false,
  'dispatchEvents' => false,
  'controls' => [
    'addButton' => [
      '0' => [
        'label' => 'Invite User',
        'type' => 'quick_add',
        'icon' => 'fas fa-user-plus',
        'primary' => true,
      ],
      '1' => [
        'label' => 'Bulk Invite',
        'type' => 'bulk_invite',
        'icon' => 'fas fa-envelope',
      ],
    ],
    'files' => [
      'export' => [
        '0' => 'csv',
        '1' => 'xls',
      ],
      'print' => false,
    ],
    'perPage' => [
      '0' => 10,
      '1' => 25,
      '2' => 50,
      '3' => 100,
    ],
    'search' => true,
    'showHideColumns' => true,
  ],
  'fieldGroups' => [
    'identity' => [
      'title' => 'Identity',
      'groupType' => 'admin',
      'fields' => [
        '0' => 'name',
        '1' => 'email',
        '2' => 'user_type',
      ],
    ],
    'authentication' => [
      'title' => 'Authentication',
      'groupType' => 'admin',
      'fields' => [
        '0' => 'password',
        '1' => 'password_confirmation',
      ],
    ],
    'system' => [
      'title' => 'System Info',
      'groupType' => 'admin',
      'fields' => [
        '0' => 'status',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'roles' => [
      'type' => 'belongsToMany',
      'model' => 'App\Modules\Admin\Models\Role',
      'pivotTable' => 'user_has_roles',
      'foreignPivotKey' => 'user_id',
      'relatedPivotKey' => 'role_id',
      'displayField' => 'name',
      'addToDetail' => true,
      'url' => 'auth/roles',
      'index' => 'admin/users',
    ],
    'permissions' => [
      'type' => 'belongsToMany',
      'model' => 'App\Modules\Admin\Models\Permission',
      'through' => 'roles',
      'displayField' => 'name',
    ],
    'employee' => [
      'type' => 'hasOne',
      'model' => 'App\Modules\Hr\Models\Employee',
      'foreignKey' => 'user_id',
      'displayField' => 'employee_number',
      'hintField' => 'first_name',
    ],
  ],
  'report' => [],
];

<?php

return [
  'model' => 'App\Modules\Hr\Models\Employee',
  'fieldDefinitions' => [
    'employee_number' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Employee Number',
      'validation' => 'required|unique:employees,employee_number',
      'autoGenerate' => true,
      'wizard' => [
        'employee_onboarding' => true,
      ],
    ],
    'first_name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'First Name',
      'validation' => 'required|string|max:255',
      'wizard' => [
        'employee_onboarding' => true,
      ],
    ],
    'last_name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Last Name',
      'validation' => 'required|string|max:255',
      'wizard' => [
        'employee_onboarding' => true,
      ],
    ],
    'phone' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Phone',
      'maxSizeMB' => 1,
    ],
    'hire_date' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Hire Date',
      'validation' => 'required',
      'wizard' => [
        'employee_onboarding' => true,
      ],
    ],
    'department_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Department',
      'validation' => 'required|integer',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Department',
        'type' => 'belongsTo',
        'display_field' => 'name',
        'dynamic_property' => 'department',
        'foreign_key' => 'department_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Department',
        'column' => 'name',
        'hintField' => '',
      ],
      'wizard' => [
        'employee_onboarding' => true,
      ],
    ],
    'status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Status',
      'validation' => 'required',
      'options' => [
        'Active' => 'Active',
        'Inactive' => 'Inactive',
        'Terminated' => 'Terminated',
      ],
      'wizard' => [
        'employee_onboarding' => true,
      ],
    ],
    'date_of_birth' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Date Of Birth',
      'validation' => 'nullable|date',
    ],
    'gender' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Gender',
      'validation' => 'nullable',
      'options' => [
        'Male' => 'Male',
        'Female' => 'Female',
        'Non-binary' => 'Non-binary',
        'Prefer not to say' => 'Prefer not to say',
      ],
    ],
    'email' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Email',
      'validation' => 'required|email|unique:employees,email',
      'wizard' => [
        'employee_onboarding' => true,
      ],
    ],
    'user_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Login Name',
      'validation' => 'nullable|unique:employees,user_id',
      'relationship' => [
        'model' => 'App\Models\User',
        'type' => 'belongsTo',
        'display_field' => 'name',
        'dynamic_property' => 'user',
        'foreign_key' => 'user_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Models\User',
        'column' => 'name',
        'hintField' => 'email',
      ],
    ],
    'nationality' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Nationality',
      'maxSizeMB' => 1,
    ],
    'marital_status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Marital Status',
      'maxSizeMB' => 1,
      'options' => [
        'Single' => 'Single',
        'Married' => 'Married',
        'Divorced' => 'Divorced',
        'Widowed' => 'Widowed',
      ],
    ],
    'address_street' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Address Street',
      'maxSizeMB' => 1,
    ],
    'address_city' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Address City',
      'maxSizeMB' => 1,
    ],
    'address_state' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Address State',
      'maxSizeMB' => 1,
    ],
    'address_postal_code' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Address Postal Code',
      'maxSizeMB' => 1,
    ],
    'address_country' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Address Country',
      'maxSizeMB' => 1,
    ],
    'documents' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Document',
        'type' => 'hasMany',
        'display_field' => 'name',
        'hintField' => '',
        'dynamic_property' => 'documents',
        'foreign_key' => 'employee_id',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Document',
        'column' => 'name',
        'hintField' => '',
      ],
      'label' => 'Documents',
      'multiSelect' => true,
      'display' => 'inline',
    ],
  ],
  'hiddenFields' => [
    'onTable' => [],
    'onNewForm' => [],
    'onEditForm' => [],
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
        'label' => 'Add Employee',
        'type' => 'quick_add',
        'icon' => 'fas fa-plus',
        'primary' => true,
      ],
      '1' => [
        'label' => 'Onboard New Hire (Guided)',
        'type' => 'wizard',
        'url' => '/hr/employee-onboarding',
        'wizard' => 'employee_onboarding',
        'icon' => 'fas fa-user-plus',
      ],
      '2' => [
        'label' => 'Quickly Add',
        'type' => 'quick_add',
        'icon' => 'fas fa-edit',
      ],
    ],
    'files' => [
      'export' => [
        '0' => 'xls',
        '1' => 'csv',
        '2' => 'pdf',
      ],
      'print' => true,
    ],
    'bulkActions' => [
      'export' => [
        '0' => 'xls',
        '1' => 'csv',
        '2' => 'pdf',
      ],
      'delete' => true,
    ],
    'perPage' => [
      '0' => 5,
      '1' => 10,
      '2' => 25,
      '3' => 50,
      '4' => 100,
      '5' => 200,
      '6' => 500,
    ],
    'search' => true,
    'showHideColumns' => true,
  ],
  'fieldGroups' => [
    'personal_information' => [
      'title' => 'Personal Information',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'first_name',
        '1' => 'last_name',
        '2' => 'date_of_birth',
        '3' => 'gender',
        '4' => 'marital_status',
        '5' => 'nationality',
      ],
    ],
    'contact_information' => [
      'title' => 'Contact Information',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'phone',
        '1' => 'address_street',
        '2' => 'address_city',
        '3' => 'address_state',
        '4' => 'address_postal_code',
        '5' => 'address_country',
      ],
    ],
    'employment_details' => [
      'title' => 'Employment Details',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'employee_number',
        '1' => 'email',
        '2' => 'user_id',
        '3' => 'hire_date',
        '4' => 'department_id',
        '5' => 'status',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [
    'default' => 'list',
    'card' => [
      'titleFields' => [
        '0' => 'first_name',
        '1' => 'last_name',
      ],
      'subtitleFields' => [
        '0' => 'email',
        '1' => 'phone',
      ],
      'contentFields' => [
        '0' => 'gender',
        '1' => 'date_of_birth',
      ],
    ],
    'list' => [
      'titleFields' => [
        '0' => 'first_name',
        '1' => 'last_name',
      ],
      'subtitleFields' => [
        '0' => 'email',
        '1' => 'phone',
      ],
      'contentFields' => [
        '0' => 'gender',
        '1' => 'date_of_birth',
      ],
    ],
    'detail' => [
      'layout' => 'tab',
      'detailType' => 'profile',
      'icon' => 'fas fa-user-profile',
      'titleFields' => [
        '0' => 'first_name',
        '1' => 'last_name',
      ],
      'subtitleFields' => [
        '0' => 'email',
        '1' => 'phone',
      ],
      'contentFields' => [
        '0' => 'gender',
        '1' => 'date_of_birth',
      ],
      'headerLink' => [
        '0' => [
          'label' => 'Documents',
        ],
        '1' => [
          'url' => '/hr/documents?employee_id={id}',
        ],
        '2' => [
          'returnTo' => '/hr/employees',
        ],
      ],
    ],
  ],
  'relations' => [
    'department' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Department',
      'foreignKey' => 'department_id',
      'displayField' => 'name',
    ],
    'documents' => [
      'type' => 'hasMany',
      'model' => 'App\Modules\Hr\Models\Document',
      'foreignKey' => 'employee_id',
      'displayField' => 'name',
      'addToDetail' => true,
      'url' => 'hr/documents',
      'index' => 'hr/employees',
    ],
    'employeeProfile' => [
      'type' => 'hasOne',
      'model' => 'App\Modules\Hr\Models\EmployeeProfile',
      'foreignKey' => 'employee_id',
      'displayField' => 'employee_number',
      'hintField' => 'first_name',
    ],
    'employeePosition' => [
      'type' => 'hasOne',
      'model' => 'App\Modules\Hr\Models\EmployeePosition',
      'foreignKey' => 'employee_id',
      'displayField' => 'jobTitle.title',
      'hintField' => 'department.name',
    ],
    'user' => [
      'type' => 'belongsTo',
      'model' => 'App\Models\User',
      'foreignKey' => 'user_id',
      'displayField' => 'name',
      'hintField' => 'email',
    ],
  ],
  'report' => [],
];

<?php

return [
  'model' => 'App\Modules\Hr\Models\EmployeePayrollProfile',
  'fieldDefinitions' => [
    'employee_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Employee',
      'validation' => 'required|exists:employees,id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Employee',
        'type' => 'belongsTo',
        'display_field' => 'employee_number',
        'dynamic_property' => 'employee',
        'foreign_key' => 'employee_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Employee',
        'column' => 'employee_number',
        'hintField' => 'first_name',
      ],
    ],
    'pay_schedule_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Pay Schedule',
      'validation' => 'required|exists:pay_schedules,id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\PaySchedule',
        'type' => 'belongsTo',
        'display_field' => 'name',
        'dynamic_property' => 'paySchedule',
        'foreign_key' => 'pay_schedule_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\PaySchedule',
        'column' => 'name',
        'hintField' => '',
      ],
    ],
    'bank_account' => [
      'display' => 'inline',
      'field_type' => 'encrypted_string',
      'label' => 'Bank Account Number',
      'validation' => 'nullable|string',
    ],
    'bank_routing' => [
      'display' => 'inline',
      'field_type' => 'encrypted_string',
      'label' => 'Routing Number (US) / Sort Code (UK)',
      'validation' => 'nullable|string',
    ],
    'tax_filing_status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Tax Filing Status',
      'validation' => 'nullable',
      'options' => [
        'Single' => 'Single',
        'Married Filing Jointly' => 'Married Filing Jointly',
        'Married Filing Separately' => 'Married Filing Separately',
        'Head of Household' => 'Head of Household',
        'Qualifying Widow' => 'Qualifying Widow',
      ],
    ],
    'allowances' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Withholding Allowances (W-4)',
      'validation' => 'nullable|integer|min:0',
    ],
    'is_exempt_from_federal_tax' => [
      'display' => 'inline',
      'field_type' => 'checkbox',
      'label' => 'Exempt from Federal Income Tax',
      'maxSizeMB' => 1,
    ],
    'currency' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Payment Currency',
      'validation' => 'required',
      'options' => [
        'USD' => 'USD',
        'EUR' => 'EUR',
        'GBP' => 'GBP',
        'CAD' => 'CAD',
        'AUD' => 'AUD',
        'INR' => 'INR',
        'NGN' => 'NGN',
      ],
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
  'controls' => 'all',
  'fieldGroups' => [
    'employee_link' => [
      'title' => 'Employee',
      'groupType' => 'payroll',
      'fields' => [
        '0' => 'employee_id',
        '1' => 'pay_schedule_id',
        '2' => 'currency',
      ],
    ],
    'bank_details' => [
      'title' => 'Bank Information',
      'groupType' => 'payroll',
      'fields' => [
        '0' => 'bank_account',
        '1' => 'bank_routing',
      ],
    ],
    'tax_withholding' => [
      'title' => 'Tax Withholding (US Example)',
      'groupType' => 'payroll',
      'fields' => [
        '0' => 'tax_filing_status',
        '1' => 'allowances',
        '2' => 'is_exempt_from_federal_tax',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'employee' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Employee',
      'foreignKey' => 'employee_id',
      'displayField' => 'employee_number',
      'hintField' => 'first_name',
    ],
    'paySchedule' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\PaySchedule',
      'foreignKey' => 'pay_schedule_id',
      'displayField' => 'name',
    ],
  ],
  'report' => [],
];

<?php

return [
  'model' => 'App\Modules\Hr\Models\PayrollPayslip',
  'fieldDefinitions' => [
    'payslip_number' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Payslip Number',
      'validation' => 'required|string|max:50|unique:payroll_payslips,payslip_number',
    ],
    'payroll_run_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Payroll Run',
      'validation' => 'required|exists:payroll_runs,id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\PayrollRun',
        'type' => 'belongsTo',
        'display_field' => 'period_end',
        'dynamic_property' => 'payrollRun',
        'foreign_key' => 'payroll_run_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\PayrollRun',
        'column' => 'period_end',
        'hintField' => '',
      ],
    ],
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
    'base_salary' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Base Salary (Period)',
      'validation' => 'required|numeric|min:0',
    ],
    'gross_pay' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Gross Pay',
      'validation' => 'required|numeric|min:0',
    ],
    'total_deductions' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Total Deductions',
      'validation' => 'required|numeric|min:0',
    ],
    'net_pay' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Net Pay',
      'validation' => 'required|numeric|min:0',
    ],
    'paid_at' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Paid At',
      'maxSizeMB' => 1,
    ],
  ],
  'hiddenFields' => [
    'onTable' => [
      '0' => 'payroll_run_id',
    ],
    'onNewForm' => [
      '0' => 'paid_at',
    ],
    'onEditForm' => [
      '0' => 'paid_at',
    ],
    'onQuery' => [],
  ],
  'simpleActions' => [
    '0' => 'show',
  ],
  'isTransaction' => false,
  'dispatchEvents' => false,
  'controls' => [
    'files' => [
      'export' => [
        '0' => 'pdf',
      ],
      'print' => true,
    ],
    'perPage' => [
      '0' => 10,
      '1' => 25,
      '2' => 50,
    ],
    'search' => true,
  ],
  'fieldGroups' => [
    'employee_info' => [
      'title' => 'Employee',
      'groupType' => 'payroll',
      'fields' => [
        '0' => 'employee_id',
      ],
    ],
    'earnings' => [
      'title' => 'Earnings',
      'groupType' => 'payroll',
      'fields' => [
        '0' => 'base_salary',
        '1' => 'gross_pay',
      ],
    ],
    'deductions' => [
      'title' => 'Deductions',
      'groupType' => 'payroll',
      'fields' => [
        '0' => 'total_deductions',
      ],
    ],
    'net_pay' => [
      'title' => 'Net Pay',
      'groupType' => 'payroll',
      'fields' => [
        '0' => 'net_pay',
        '1' => 'paid_at',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [
    'detail' => [
      'layout' => 'tab',
      'detailType' => 'record',
      'titleFields' => [
        '0' => 'employee.first_name',
        '1' => 'employee.last_name',
      ],
      'subtitleFields' => [
        '0' => 'net_pay',
        '1' => 'paid_at',
      ],
      'contentFields' => [
        '0' => 'base_salary',
        '1' => 'gross_pay',
        '2' => 'total_deductions',
      ],
    ],
  ],
  'relations' => [
    'payrollRun' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\PayrollRun',
      'foreignKey' => 'payroll_run_id',
      'displayField' => 'period_end',
    ],
    'employee' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Employee',
      'foreignKey' => 'employee_id',
      'displayField' => 'employee_number',
      'hintField' => 'first_name',
    ],
  ],
  'report' => [
    'model' => 'App\Modules\hr\Models\PayrollRun',
    'itemsModel' => 'App\Modules\hr\Models\PayrollPayslip',
    'headerFields' => [
      '0' => 'title',
      '1' => 'payroll_number',
      '2' => 'pay_period_start',
      '3' => 'pay_period_end',
      '4' => 'status',
    ],
    'summaryFields' => [
      'gross_pay' => 'Total Gross Pay',
      'total_deductions' => 'Total Deductions',
      'net_pay' => 'Total Net Pay',
    ],
    'signatories' => [
      '0' => [
        'label' => 'Prepared By',
        'field' => 'created_by',
      ],
      '1' => [
        'label' => 'Approved By',
        'field' => 'approved_by',
      ],
    ],
    'foreignKey' => 'payroll_run_id',
  ],
];

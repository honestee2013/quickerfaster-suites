<?php

return [
  'model' => 'App\Modules\Hr\Models\PayrollRun',
  'fieldDefinitions' => [
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
    'period_start' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Pay Period Start',
      'validation' => 'required|date',
    ],
    'period_end' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Pay Period End',
      'validation' => 'required|date|after:period_start',
    ],
    'status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Status',
      'validation' => 'required',
      'options' => [
        'Draft' => 'Draft',
        'Approved' => 'Approved',
        'Paid' => 'Paid',
        'Cancelled' => 'Cancelled',
      ],
    ],
    'processed_by' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Processed By',
      'maxSizeMB' => 1,
    ],
    'processed_at' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Processed At',
      'maxSizeMB' => 1,
    ],
    'notes' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Notes',
      'maxSizeMB' => 1,
    ],
    'payslips' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\PayrollPayslip',
        'type' => 'hasMany',
        'display_field' => 'net_pay',
        'hintField' => '',
        'dynamic_property' => 'payslips',
        'foreign_key' => 'payroll_run_id',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\PayrollPayslip',
        'column' => 'net_pay',
        'hintField' => '',
      ],
      'label' => 'Payslips',
      'multiSelect' => true,
      'display' => 'inline',
    ],
  ],
  'hiddenFields' => [
    'onTable' => [],
    'onNewForm' => [
      '0' => 'processed_by',
      '1' => 'processed_at',
    ],
    'onEditForm' => [
      '0' => 'processed_by',
      '1' => 'processed_at',
    ],
    'onQuery' => [],
  ],
  'simpleActions' => [
    '0' => 'show',
  ],
  'isTransaction' => false,
  'dispatchEvents' => true,
  'controls' => [
    'addButton' => [
      '0' => [
        'label' => 'New Pay Run',
        'type' => 'quick_add',
        'icon' => 'fas fa-plus',
        'primary' => true,
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
    ],
    'perPage' => [
      '0' => 5,
      '1' => 10,
      '2' => 25,
      '3' => 50,
    ],
    'search' => true,
    'showHideColumns' => true,
  ],
  'fieldGroups' => [
    'run_details' => [
      'title' => 'Pay Run Details',
      'groupType' => 'payroll',
      'fields' => [
        '0' => 'pay_schedule_id',
        '1' => 'period_start',
        '2' => 'period_end',
        '3' => 'status',
        '4' => 'notes',
      ],
    ],
    'processing_info' => [
      'title' => 'Processing',
      'groupType' => 'payroll',
      'fields' => [
        '0' => 'processed_by',
        '1' => 'processed_at',
      ],
    ],
  ],
  'moreActions' => [
    '0' => [
      'title' => 'Preview Payroll',
      'icon' => 'fas fa-eye',
      'dispatchEvent' => true,
      'eventName' => 'openPayrollPreviewModalEvent',
      'params' => [
        'payroll_run_id' => '{id}',
      ],
      'condition' => [
        '0' => [
          'status' => 'draft',
        ],
      ],
    ],
    '1' => [
      'title' => 'Approve Payroll',
      'icon' => 'fas fa-check-circle',
      'updateModelField' => true,
      'fieldName' => 'status',
      'fieldValue' => 'approved',
      'actionName' => 'approve_payroll',
      'confirm' => 'Approve this payroll run? This will lock all data.',
      'condition' => [
        '0' => [
          'status' => 'draft',
        ],
      ],
    ],
    '2' => [
      'title' => 'Cancel Run',
      'icon' => 'fas fa-ban',
      'updateModelField' => true,
      'fieldName' => 'status',
      'fieldValue' => 'cancelled',
      'actionName' => 'cancel_payroll',
      'confirm' => 'Cancel this payroll run? This cannot be undone.',
      'condition' => [
        '0' => [
          'status' => [
            '0' => 'draft',
            '1' => 'approved',
          ],
        ],
      ],
    ],
    '3' => [
      'title' => 'Mark as Paid',
      'icon' => 'fas fa-money-check',
      'updateModelField' => true,
      'fieldName' => 'status',
      'fieldValue' => 'paid',
      'actionName' => 'mark_paid',
      'confirm' => 'Confirm payment has been processed externally?',
      'condition' => [
        '0' => [
          'status' => 'approved',
        ],
      ],
    ],
    '4' => [
      'title' => 'View Report',
      'icon' => 'fas fa-file-alt',
      'route' => 'payroll.reports.show',
      'params' => [
        'payrollRun' => '{id}',
      ],
      'condition' => [
        '0' => [
          'status' => [
            '0' => 'approved',
            '1' => 'paid',
          ],
        ],
      ],
    ],
  ],
  'switchViews' => [],
  'relations' => [
    'paySchedule' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\PaySchedule',
      'foreignKey' => 'pay_schedule_id',
      'displayField' => 'name',
    ],
    'payslips' => [
      'type' => 'hasMany',
      'model' => 'App\Modules\Hr\Models\PayrollPayslip',
      'foreignKey' => 'payroll_run_id',
      'displayField' => 'net_pay',
    ],
  ],
  'report' => [],
];

<?php

return [
  'model' => 'App\Modules\Hr\Models\Timesheet',
  'fieldDefinitions' => [
    'employee_id' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Employee',
      'validation' => 'required',
    ],
    'week_starting' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Week Starting (Monday)',
      'validation' => 'required|date',
    ],
    'status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Status',
      'validation' => 'required',
      'options' => [
        'Draft' => 'Draft',
        'Submitted' => 'Submitted',
        'Approved' => 'Approved',
        'Rejected' => 'Rejected',
      ],
    ],
    'submitted_at' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Submitted At',
      'maxSizeMB' => 1,
    ],
    'approved_at' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Approved At',
      'maxSizeMB' => 1,
    ],
    'approved_by' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Approved By',
      'maxSizeMB' => 1,
    ],
    'notes' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Notes',
      'maxSizeMB' => 1,
    ],
    'timesheetEntries' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\TimesheetEntry',
        'type' => 'hasMany',
        'display_field' => 'date',
        'hintField' => '',
        'dynamic_property' => 'timesheetEntries',
        'foreign_key' => 'timesheet_id',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\TimesheetEntry',
        'column' => 'date',
        'hintField' => '',
      ],
      'label' => 'Timesheetentries',
      'multiSelect' => true,
      'display' => 'inline',
    ],
  ],
  'hiddenFields' => [
    'onTable' => [],
    'onNewForm' => [
      '0' => 'submitted_at',
      '1' => 'approved_at',
      '2' => 'approved_by',
    ],
    'onEditForm' => [
      '0' => 'approved_at',
      '1' => 'approved_by',
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
  'controls' => 'all',
  'fieldGroups' => [
    '0' => [
      'title' => 'Timesheet Header',
      'groupType' => 'time',
      'fields' => [
        '0' => 'employee_id',
        '1' => 'week_starting',
        '2' => 'status',
      ],
    ],
    '1' => [
      'title' => 'Approval',
      'groupType' => 'time',
      'fields' => [
        '0' => 'submitted_at',
        '1' => 'approved_at',
        '2' => 'approved_by',
        '3' => 'notes',
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
    ],
    'approver' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Employee',
      'foreignKey' => 'approved_by',
      'displayField' => 'employee_number',
    ],
    'timesheetEntries' => [
      'type' => 'hasMany',
      'model' => 'App\Modules\Hr\Models\TimesheetEntry',
      'foreignKey' => 'timesheet_id',
      'displayField' => 'date',
    ],
  ],
  'report' => [],
];

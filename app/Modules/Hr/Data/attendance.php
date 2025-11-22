<?php

return [
  'model' => 'App\Modules\Hr\Models\Attendance',
  'fieldDefinitions' => [
    'employee_id' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Employee ID',
      'validation' => 'required',
    ],
    'date' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Attendance Date',
      'validation' => 'required|date',
    ],
    'net_hours' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Net Hours Worked',
      'validation' => 'required|numeric|min:0',
    ],
    'sessions' => [
      'display' => 'inline',
      'field_type' => 'json',
      'label' => 'Work Sessions',
      'maxSizeMB' => 1,
    ],
    'status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Status',
      'validation' => 'required',
      'options' => [
        'complete' => 'complete',
        'incomplete' => 'incomplete',
        'pending' => 'pending',
        'holiday' => 'holiday',
        'leave' => 'leave',
      ],
    ],
    'is_approved' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Is Approved',
      'validation' => 'required|boolean',
    ],
    'approved_by' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Approved By',
      'maxSizeMB' => 1,
    ],
    'approved_at' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Approved At',
      'maxSizeMB' => 1,
    ],
    'notes' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Notes',
      'maxSizeMB' => 1,
    ],
    'needs_review' => [
      'display' => 'inline',
      'field_type' => 'checkbox',
      'label' => 'Needs Review',
      'validation' => 'required|boolean',
    ],
  ],
  'hiddenFields' => [
    'onTable' => [
      '0' => 'approved_by',
      '1' => 'approved_at',
      '2' => 'sessions',
    ],
    'onNewForm' => [
      '0' => 'is_approved',
      '1' => 'approved_by',
      '2' => 'approved_at',
    ],
    'onEditForm' => [
      '0' => 'is_approved',
      '1' => 'approved_by',
      '2' => 'approved_at',
    ],
    'onQuery' => [],
  ],
  'simpleActions' => [
    '0' => 'show',
    '1' => 'edit',
  ],
  'isTransaction' => false,
  'dispatchEvents' => false,
  'controls' => 'all',
  'fieldGroups' => [
    '0' => [
      'title' => 'Employee & Date',
      'groupType' => 'time',
      'fields' => [
        '0' => 'employee_id',
        '1' => 'date',
        '2' => 'status',
      ],
    ],
    '1' => [
      'title' => 'Hours Summary',
      'groupType' => 'time',
      'fields' => [
        '0' => 'net_hours',
      ],
    ],
    '2' => [
      'title' => 'Approval',
      'groupType' => 'time',
      'fields' => [
        '0' => 'is_approved',
        '1' => 'approved_by',
        '2' => 'approved_at',
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
  ],
  'report' => [],
];

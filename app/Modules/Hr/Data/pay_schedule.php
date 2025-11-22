<?php

return [
  'model' => 'App\Modules\Hr\Models\PaySchedule',
  'fieldDefinitions' => [
    'name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Schedule Name',
      'validation' => 'required|string|max:100',
    ],
    'frequency' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Pay Frequency',
      'validation' => 'required',
      'options' => [
        'Weekly' => 'Weekly',
        'Bi-weekly' => 'Bi-weekly',
        'Semi-monthly' => 'Semi-monthly',
        'Monthly' => 'Monthly',
      ],
    ],
    'next_pay_date' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Next Pay Date',
      'validation' => 'required|date',
    ],
    'is_active' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Active',
      'validation' => 'boolean',
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
    'schedule_details' => [
      'title' => 'Schedule Details',
      'groupType' => 'payroll',
      'fields' => [
        '0' => 'name',
        '1' => 'frequency',
        '2' => 'next_pay_date',
        '3' => 'is_active',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [],
  'report' => [],
];

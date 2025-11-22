<?php

return [
  'model' => 'App\Modules\Hr\Models\TimesheetEntry',
  'fieldDefinitions' => [
    'timesheet_id' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Timesheet',
      'validation' => 'required',
    ],
    'date' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Date',
      'validation' => 'required|date',
    ],
    'hours_worked' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Hours Worked',
      'validation' => 'required|numeric|min:0',
    ],
    'project_code' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Project Code',
      'maxSizeMB' => 1,
    ],
    'task_description' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Task Description',
      'maxSizeMB' => 1,
    ],
  ],
  'hiddenFields' => [
    'onTable' => [
      '0' => 'timesheet_id',
    ],
    'onNewForm' => [],
    'onEditForm' => [],
    'onQuery' => [],
  ],
  'simpleActions' => [],
  'isTransaction' => false,
  'dispatchEvents' => false,
  'controls' => [],
  'fieldGroups' => [
    '0' => [
      'title' => 'Daily Entry',
      'groupType' => 'time',
      'fields' => [
        '0' => 'date',
        '1' => 'hours_worked',
        '2' => 'project_code',
        '3' => 'task_description',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'timesheet' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Timesheet',
      'foreignKey' => 'timesheet_id',
    ],
  ],
  'report' => [],
];

<?php

return [
  'model' => 'App\Modules\Hr\Models\Holiday',
  'fieldDefinitions' => [
    'calendar_id' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Calendar',
      'validation' => 'required',
    ],
    'name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Name',
      'validation' => 'required|string|max:100',
    ],
    'date' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Date',
      'validation' => 'required|date',
    ],
    'is_recurring' => [
      'display' => 'inline',
      'field_type' => 'checkbox',
      'label' => 'Is Recurring',
      'validation' => 'boolean',
    ],
    'description' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Description',
      'maxSizeMB' => 1,
    ],
  ],
  'hiddenFields' => [
    'onTable' => [],
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
      'title' => 'Holiday Details',
      'groupType' => 'time',
      'fields' => [
        '0' => 'calendar_id',
        '1' => 'name',
        '2' => 'date',
        '3' => 'is_recurring',
        '4' => 'description',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'calendar' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\HolidayCalendar',
      'foreignKey' => 'calendar_id',
      'displayField' => 'name',
    ],
  ],
  'report' => [],
];

<?php

return [
  'model' => 'App\Modules\Hr\Models\HolidayCalendar',
  'fieldDefinitions' => [
    'name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Calendar Name',
      'validation' => 'required|string|max:100',
    ],
    'country_code' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Country',
      'validation' => 'required|size:2',
    ],
    'is_default' => [
      'display' => 'inline',
      'field_type' => 'checkbox',
      'label' => 'Default Calendar',
      'validation' => 'boolean',
    ],
    'holidays' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Holiday',
        'type' => 'hasMany',
        'display_field' => 'name',
        'hintField' => '',
        'dynamic_property' => 'holidays',
        'foreign_key' => 'calendar_id',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Holiday',
        'column' => 'name',
        'hintField' => '',
      ],
      'label' => 'Holidays',
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
  'controls' => 'all',
  'fieldGroups' => [
    '0' => [
      'title' => 'Calendar Settings',
      'groupType' => 'time',
      'fields' => [
        '0' => 'name',
        '1' => 'country_code',
        '2' => 'is_default',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'holidays' => [
      'type' => 'hasMany',
      'model' => 'App\Modules\Hr\Models\Holiday',
      'foreignKey' => 'calendar_id',
      'displayField' => 'name',
    ],
  ],
  'report' => [],
];

<?php

return [
  'model' => 'App\Modules\Hr\Models\ClockEvent',
  'fieldDefinitions' => [
    'employee_id' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Employee ID',
      'validation' => 'required',
    ],
    'event_type' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Event Type',
      'validation' => 'required',
      'options' => [
        'clock_in' => 'clock_in',
        'clock_out' => 'clock_out',
      ],
    ],
    'timestamp' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Timestamp',
      'validation' => 'required',
    ],
    'method' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Method',
      'validation' => 'required',
    ],
    'latitude' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Latitude',
      'maxSizeMB' => 1,
    ],
    'longitude' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Longitude',
      'maxSizeMB' => 1,
    ],
    'accuracy_meters' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Accuracy Meters',
      'maxSizeMB' => 1,
    ],
    'address' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Address',
      'maxSizeMB' => 1,
    ],
    'ip_address' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Ip Address',
      'maxSizeMB' => 1,
    ],
    'device_id' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Device',
      'maxSizeMB' => 1,
    ],
    'sync_status' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Sync Status',
      'maxSizeMB' => 1,
    ],
    'sync_attempts' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Sync Attempts',
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
  'controls' => 'all',
  'fieldGroups' => [],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [],
  'report' => [],
];

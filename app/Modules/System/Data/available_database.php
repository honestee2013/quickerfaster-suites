<?php

return [
  'model' => 'App\Modules\System\Models\AvailableDatabase',
  'fieldDefinitions' => [
    'name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Name',
      'validation' => 'required|string|max:255',
    ],
    'status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Status',
      'validation' => 'required|string|in:available',
      'options' => [
        'available' => 'available',
        'assigned' => 'assigned',
      ],
    ],
    'tenant_id' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Tenant',
      'validation' => 'required|exists:tenants,id',
      'relationship' => [
        'model' => 'App\Modules\System\Models\Tenant',
        'type' => 'belongsTo',
        'display_field' => 'name',
        'dynamic_property' => 'tenant',
        'foreign_key' => 'tenant_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\System\Models\Tenant',
        'column' => 'name',
        'hintField' => '',
      ],
    ],
  ],
  'hiddenFields' => [],
  'simpleActions' => [
    '0' => 'show',
    '1' => 'edit',
    '2' => 'delete',
  ],
  'isTransaction' => false,
  'dispatchEvents' => false,
  'controls' => 'all',
  'fieldGroups' => [],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'tenant' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\System\Models\Tenant',
      'foreignKey' => 'tenant_id',
    ],
  ],
  'report' => [],
];

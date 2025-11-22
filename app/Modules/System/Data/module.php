<?php

return [
  'model' => 'App\Modules\System\Models\Module',
  'fieldDefinitions' => [
    'name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Module Name',
      'validation' => 'required|string|max:100|unique:modules,name',
    ],
    'slug' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Module Slug',
      'validation' => 'required|string|alpha_dash|max:50|unique:modules,slug|regex:/^[a-z][a-z0-9_]*$/',
    ],
    'description' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Description',
      'validation' => 'nullable|string',
    ],
    'is_active' => [
      'display' => 'inline',
      'field_type' => 'boolean',
      'label' => 'Active',
      'validation' => 'required|boolean',
    ],
    'sort_order' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Sort Order',
      'validation' => 'required|integer',
    ],
    'migration_path' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Tenant Migration Path',
      'validation' => 'nullable|string|max:255',
    ],
    'service_provider' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Service Provider Class',
      'validation' => 'nullable|string|max:255',
    ],
    'companies' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\System\Models\Company',
        'type' => 'belongsToMany',
        'display_field' => 'name',
        'hintField' => '',
        'dynamic_property' => 'companies',
        'foreign_key' => '',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\System\Models\Company',
        'column' => 'name',
        'hintField' => '',
      ],
      'label' => 'Companies',
      'multiSelect' => true,
      'display' => 'inline',
    ],
  ],
  'hiddenFields' => [
    'onTable' => [
      '0' => 'description',
      '1' => 'migration_path',
      '2' => 'service_provider',
    ],
    'onNewForm' => [],
    'onEditForm' => [
      '0' => 'slug',
    ],
    'onQuery' => [
      '0' => 'migration_path',
      '1' => 'service_provider',
    ],
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
      'title' => 'Module Basics',
      'groupType' => 'system',
      'fields' => [
        '0' => 'name',
        '1' => 'slug',
        '2' => 'description',
        '3' => 'is_active',
        '4' => 'sort_order',
      ],
    ],
    '1' => [
      'title' => 'Technical Configuration',
      'groupType' => 'system',
      'fields' => [
        '0' => 'migration_path',
        '1' => 'service_provider',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'companies' => [
      'type' => 'belongsToMany',
      'model' => 'App\Modules\System\Models\Company',
      'table' => 'company_modules',
      'foreignPivotKey' => 'module_id',
      'relatedPivotKey' => 'company_id',
      'displayField' => 'name',
    ],
  ],
  'report' => [],
];

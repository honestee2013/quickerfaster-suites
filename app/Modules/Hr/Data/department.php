<?php

return [
  'model' => 'App\Modules\Hr\Models\Department',
  'fieldDefinitions' => [
    'name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Department Name',
      'validation' => 'required|string|max:255',
    ],
    'code' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Department Code',
      'validation' => 'required|string|max:50|unique:departments,code',
      'autoGenerate' => true,
    ],
    'description' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Description',
      'maxSizeMB' => 1,
    ],
    'parent_department_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Parent Department',
      'maxSizeMB' => 1,
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Department',
        'type' => 'belongsTo',
        'display_field' => 'name',
        'dynamic_property' => 'parentDepartment',
        'foreign_key' => 'parent_department_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Department',
        'column' => 'name',
        'hintField' => '',
      ],
    ],
    'cost_center' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Cost Center',
      'maxSizeMB' => 1,
    ],
    'is_active' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Is Active',
      'validation' => 'nullable|boolean',
    ],
    'childDepartments' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Department',
        'type' => 'hasMany',
        'display_field' => 'name',
        'hintField' => '',
        'dynamic_property' => 'childDepartments',
        'foreign_key' => 'parent_department_id',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Department',
        'column' => 'name',
        'hintField' => '',
      ],
      'label' => 'Childdepartments',
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
      'title' => 'Department Information',
      'groupType' => 'organization',
      'fields' => [
        '0' => 'name',
        '1' => 'code',
        '2' => 'description',
        '3' => 'cost_center',
      ],
    ],
    '1' => [
      'title' => 'Department Structure',
      'groupType' => 'organization',
      'fields' => [
        '0' => 'parent_department_id',
        '1' => 'is_active',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'parentDepartment' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Department',
      'foreignKey' => 'parent_department_id',
      'displayField' => 'name',
    ],
    'childDepartments' => [
      'type' => 'hasMany',
      'model' => 'App\Modules\Hr\Models\Department',
      'foreignKey' => 'parent_department_id',
      'displayField' => 'name',
    ],
  ],
  'report' => [],
];

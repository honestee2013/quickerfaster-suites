<?php

return [
  'model' => 'App\Modules\Hr\Models\JobTitle',
  'fieldDefinitions' => [
    'title' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Title',
      'validation' => 'required|unique:job_titles,title',
    ],
    'description' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Description',
      'maxSizeMB' => 1,
    ],
    'editable' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Editable',
      'maxSizeMB' => 1,
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
      'title' => 'Job Title Information',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'title',
        '1' => 'description',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [],
  'report' => [],
];

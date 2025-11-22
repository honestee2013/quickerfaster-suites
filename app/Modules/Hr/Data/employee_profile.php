<?php

return [
  'model' => 'App\Modules\Hr\Models\EmployeeProfile',
  'fieldDefinitions' => [
    'photo' => [
      'display' => 'inline',
      'field_type' => 'file',
      'label' => 'Photo',
      'maxSizeMB' => 1,
      'fileTypes' => [
        '0' => 'jpg',
        '1' => 'jpeg',
        '2' => 'png',
        '3' => 'bmp',
      ],
      'validation' => 'mimes:jpg,jpeg,png,bmp|max:1024',
    ],
    'employee_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Employee Number',
      'validation' => 'required|unique:employee_profiles,employee_id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Employee',
        'type' => 'belongsTo',
        'display_field' => 'employee_number',
        'dynamic_property' => 'employee',
        'foreign_key' => 'employee_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Employee',
        'column' => 'employee_number',
        'hintField' => 'first_name',
      ],
    ],
    'middle_name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Middle Name',
      'maxSizeMB' => 1,
    ],
    'preferred_name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Preferred Name',
      'maxSizeMB' => 1,
    ],
    'personal_email' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Personal Email',
      'validation' => 'required|email|unique:employee_profiles,personal_email',
    ],
    'personal_phone' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Personal Phone',
      'maxSizeMB' => 1,
    ],
    'work_phone' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Work Phone',
      'maxSizeMB' => 1,
    ],
    'emergency_contact_name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Emergency Contact Name',
      'maxSizeMB' => 1,
    ],
    'emergency_contact_phone' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Emergency Contact Phone',
      'maxSizeMB' => 1,
    ],
    'emergency_contact_relationship' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Emergency Contact Relationship',
      'maxSizeMB' => 1,
    ],
    'passport_number' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Passport Number',
      'maxSizeMB' => 1,
    ],
    'passport_expiry_date' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Passport Expiry Date',
      'maxSizeMB' => 1,
    ],
    'national_id_number' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'National Number',
      'maxSizeMB' => 1,
    ],
    'bio' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Bio',
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
    'extended_personal_information' => [
      'title' => 'Extended Personal Information',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'photo',
        '1' => 'employee_id',
        '2' => 'middle_name',
        '3' => 'preferred_name',
        '4' => 'bio',
      ],
    ],
    'additional_contact_information' => [
      'title' => 'Additional Contact Information',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'personal_email',
        '1' => 'personal_phone',
        '2' => 'work_phone',
      ],
    ],
    'emergency_contact' => [
      'title' => 'Emergency Contact',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'emergency_contact_name',
        '1' => 'emergency_contact_phone',
        '2' => 'emergency_contact_relationship',
      ],
    ],
    'identification_documents' => [
      'title' => 'Identification Documents',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'passport_number',
        '1' => 'passport_expiry_date',
        '2' => 'national_id_number',
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
      'hintField' => 'first_name',
    ],
  ],
  'report' => [],
];

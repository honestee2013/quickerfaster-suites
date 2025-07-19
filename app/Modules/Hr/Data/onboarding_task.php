<?php

return [
  'model' => 'App\\Modules\\Hr\\Models\\OnboardingTask',
  'fieldDefinitions' =>  [
    'name' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'validation' => 'required',
      'label' => 'Name',
    ], 

    'description' =>    [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Description',
    ], 

    'editable' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Editable',
    ], 

  ], 

  'hiddenFields' =>  [
    'onTable' =>    [
    ], 

    'onNewForm' =>    [
      0 => 'editable',
    ], 

    'onEditForm' =>    [
      0 => 'editable',
    ], 

    'onQuery' =>    [
    ], 

  ], 

  'simpleActions' =>  [
    0 => 'show',
    1 => 'edit',
    2 => 'delete',
  ], 

  'isTransaction' => false,
  'dispatchEvents' => false,
  'controls' => 'all',
  'fieldGroups' =>  [
    0 =>    [
      'title' => 'Task Details',
      'groupType' => 'hr',
      'fields' =>      [
        0 => 'name',
        1 => 'description',
      ], 

    ], 

  ], 

  'moreActions' =>  [
  ], 

];

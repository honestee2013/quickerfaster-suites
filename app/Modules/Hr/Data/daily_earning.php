<?php

return [
  'model' => 'App\\Modules\\Hr\\Models\\DailyEarning',
  'fieldDefinitions' =>  [
    'employee_id' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'validation' => 'required',
      'label' => 'Employee ID',
    ], 

    'work_date' =>    [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'validation' => 'required',
      'label' => 'Work Date',
    ], 

    'regular_hours' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Regular Hours',
    ], 

    'overtime_hours' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Overtime Hours',
    ], 

    'total_hours' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Total Hours',
    ], 

    'regular_amount' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Regular Amount',
    ], 

    'overtime_amount' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Overtime Amount',
    ], 

    'total_amount' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Total Amount',
    ], 

  ], 

  'hiddenFields' =>  [
    'onTable' =>    [
      0 => 'employee_profile_id',
    ], 

    'onNewForm' =>    [
      0 => 'employee_profile_id',
    ], 

    'onEditForm' =>    [
      0 => 'employee_profile_id',
    ], 

    'onQuery' =>    [
    ], 

  ], 

  'simpleActions' =>  [
    0 => 'show',
  ], 

  'isTransaction' => false,
  'dispatchEvents' => false,
  'controls' =>  [
    'files' =>    [
      'export' =>      [
        0 => 'xls',
        1 => 'csv',
        2 => 'pdf',
      ], 

      'print' => true,
    ], 

    'bulkActions' =>    [
      'export' =>      [
        0 => 'xls',
        1 => 'csv',
        2 => 'pdf',
      ], 

      'delete' => true,
    ], 

    'perPage' =>    [
      0 => 5,
      1 => 10,
      2 => 25,
      3 => 50,
      4 => 100,
      5 => 200,
      6 => 500,
    ], 

    'search' => true,
    'showHideColumns' => true,
  ], 

  'fieldGroups' =>  [
    0 =>    [
      'title' => 'Hours Details',
      'groupType' => 'hr',
      'fields' =>      [
        0 => 'employee_id',
        1 => 'work_date',
        2 => 'regular_hours',
        3 => 'overtime_hours',
        4 => 'total_hours',
      ], 

    ], 

    1 =>    [
      'title' => 'Earning Details',
      'groupType' => 'hr',
      'fields' =>      [
        0 => 'regular_amount',
        1 => 'overtime_amount',
        2 => 'total_amount',
      ], 

    ], 

  ], 

  'moreActions' =>  [
  ], 

  'report' =>  [
  ], 

];

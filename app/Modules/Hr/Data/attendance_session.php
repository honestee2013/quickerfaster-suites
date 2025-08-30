<?php

return [
  'model' => 'App\\Modules\\Hr\\Models\\AttendanceSession',
  'fieldDefinitions' =>  [
    'attendance_date' =>    [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'validation' => 'required',
      'label' => 'Attendance Date',
    ], 

    'employee_id' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'validation' => 'required|unique:employee_profiles,employee_id',
      'label' => 'Employee ID',
      'autoGenerate' => true,
    ], 

    'check_in_time' =>    [
      'display' => 'inline',
      'field_type' => 'timepicker',
      'validation' => 'required',
      'label' => 'Check In Time',
    ], 

    'check_out_time' =>    [
      'display' => 'inline',
      'field_type' => 'timepicker',
      'validation' => 'required',
      'label' => 'Check Out Time',
    ], 

    'scheduled_start' =>    [
      'display' => 'inline',
      'field_type' => 'timepicker',
      'label' => 'Scheduled Start',
    ], 

    'scheduled_end' =>    [
      'display' => 'inline',
      'field_type' => 'timepicker',
      'label' => 'Scheduled End',
    ], 

    'check_in_status' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Check In Status',
    ], 

    'check_in_diff_mins' =>    [
      'display' => 'inline',
      'field_type' => 'integer',
      'validation' => 'integer|min:0',
      'label' => 'Check In Diff Mins',
    ], 

    'check_out_status' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Check Out Status',
    ], 

    'check_out_diff_mins' =>    [
      'display' => 'inline',
      'field_type' => 'integer',
      'validation' => 'integer|min:0',
      'label' => 'Check Out Diff Mins',
    ], 

    'session_minutes' =>    [
      'display' => 'inline',
      'field_type' => 'integer',
      'validation' => 'integer|min:0',
      'label' => 'Session Minutes',
    ], 

    'device_name' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'validation' => 'required',
      'label' => 'Device Name',
    ], 

    'device_id' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'validation' => 'required',
      'label' => 'Device ID',
    ], 

    'location_name' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'validation' => 'required',
      'label' => 'Location Name',
    ], 

    'timezone' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'validation' => 'required',
      'label' => 'Timezone',
    ], 

    'latitude' =>    [
      'display' => 'inline',
      'field_type' => 'integer',
      'label' => 'Latitude',
    ], 

    'longitude' =>    [
      'display' => 'inline',
      'field_type' => 'integer',
      'label' => 'Longitude',
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
      'title' => 'Attendance Details',
      'groupType' => 'hr',
      'fields' =>      [
        0 => 'attendance_date',
        1 => 'employee_id',
        2 => 'attendance_type',
        3 => 'attendance_time',
        4 => 'scheduled_start',
        5 => 'check_status',
        6 => 'minutes_difference',
        7 => 'scheduled_end',
        8 => 'device_id',
      ], 

    ], 

    1 =>    [
      'title' => 'Location & Sync',
      'groupType' => 'hr',
      'fields' =>      [
        0 => 'latitude',
        1 => 'longitude',
        2 => 'sync_status',
        3 => 'sync_attempts',
      ], 

    ], 

  ], 

  'moreActions' =>  [
  ], 

  'report' =>  [
  ], 

];

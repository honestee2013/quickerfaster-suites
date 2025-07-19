<?php

return [
  'model' => 'App\\Modules\\Hr\\Models\\PayrollEmployee',
  'fieldDefinitions' =>  [
    'payroll_number' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'validation' => 'required',
      'label' => 'Payroll Number',
    ], 

    'employee_id' =>    [
      'display' => 'inline',
      'field_type' => 'string',
      'validation' => 'required',
      'label' => 'Employee',
    ], 

    'base_salary' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'validation' => 'required|numeric|min:0',
      'label' => 'Base Salary',
    ], 

    'total_allowances' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'validation' => 'required|numeric|min:0',
      'label' => 'Total Allowances',
    ], 

    'total_bonuses' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'validation' => 'required|numeric|min:0',
      'label' => 'Total Bonuses',
    ], 

    'total_taxes' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'validation' => 'required|numeric|min:0',
      'label' => 'Total Taxes',
    ], 

    'total_other_deductions' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'validation' => 'required|numeric|min:0',
      'label' => 'Total Other Deductions',
    ], 

    'gross_salary' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'validation' => 'required|numeric|min:0',
      'label' => 'Gross Salary',
    ], 

    'total_deductions' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'validation' => 'required|numeric|min:0',
      'label' => 'Total Deductions',
    ], 

    'net_salary' =>    [
      'display' => 'inline',
      'field_type' => 'number',
      'validation' => 'required|numeric|min:0',
      'label' => 'Net Salary',
    ], 

    'comments' =>    [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Comments',
    ], 

  ], 

  'hiddenFields' =>  [
    'onTable' =>    [
    ], 

    'onNewForm' =>    [
    ], 

    'onEditForm' =>    [
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
      'title' => 'Employee Payroll Assignment',
      'groupType' => 'hr',
      'fields' =>      [
        0 => 'payroll_number',
        1 => 'employee_id',
        2 => 'base_salary',
      ], 

    ], 

    1 =>    [
      'title' => 'Earnings Breakdown',
      'groupType' => 'hr',
      'fields' =>      [
        0 => 'total_allowances',
        1 => 'total_bonuses',
        2 => 'total_taxes',
        3 => 'total_other_deductions',
      ], 

    ], 

    2 =>    [
      'title' => 'Final Calculations',
      'groupType' => 'hr',
      'fields' =>      [
        0 => 'gross_salary',
        1 => 'total_deductions',
        2 => 'net_salary',
        3 => 'comments',
      ], 

    ], 

  ], 

  'moreActions' =>  [
  ], 

];

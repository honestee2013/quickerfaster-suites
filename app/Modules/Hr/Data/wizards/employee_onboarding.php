<?php

return array (
  'id' => 'employee_onboarding',
  'title' => 'New Hire Onboarding',
  'description' => 'Set up core employee and job details to get started',
  'steps' => 
  array (
    0 => 
    array (
      'title' => 'Personal & Employment',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'groups' => 
      array (
        0 => 'personal_information',
        1 => 'employment_details',
      ),
      'isLinkSource' => true,
    ),
    1 => 
    array (
      'title' => 'Job Setup',
      'model' => 'App\\Modules\\Hr\\Models\\EmployeePosition',
      'groups' => 
      array (
        0 => 'job_information',
        1 => 'employment_details',
        2 => 'compensation',
      ),
      'requiresLink' => true,
    ),
    2 => 
    array (
      'title' => 'Review & Confirm',
    ),
  ),
  'completion' => 
  array (
    'title' => 'New Hire Added Successfully!',
    'message' => 'The employee record is now active. You can view details or  add another hire.',
    'actions' => 
    array (
      0 => 
      array (
        'label' => 'View Employee',
        'url' => '/hr/employees/{id}',
        'primary' => true,
      ),
      1 => 
      array (
        'label' => 'Add Another Employee',
        'url' => '/hr/employee-onboarding',
      ),
      2 => 
      array (
        'label' => 'Employee Directory',
        'url' => '/hr/employees',
      ),
    ),
  ),
  'linkFields' => 
  array (
    'userField' => 'employee_number',
    'databaseField' => 'employee_id',
  ),
);

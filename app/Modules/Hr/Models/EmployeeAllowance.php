<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EmployeeAllowance extends Model
{
    use HasFactory;
    
    

    protected $table = 'employee_allowances';


    protected $fillable = [
        'payroll_run_id', 'employee_profile_id', 'allowance_type_id', 'amount', 'addition_type', 'notes' // Fillable properties will be inserted here
    ];

       public function payrollRun(){
		return $this->belongsTo('App\Modules\Hr\Models\PayrollRun', 'payroll_run_id');
	}

   public function employeeProfile(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_profile_id');
	}

   public function allowanceType(){
		return $this->belongsTo('App\Modules\Hr\Models\AllowanceType', 'allowance_type_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\EmployeeAllowanceFactory::new();
    }
}

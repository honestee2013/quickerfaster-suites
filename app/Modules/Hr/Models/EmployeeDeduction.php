<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class EmployeeDeduction extends Model
{
    use HasFactory;
    
    


    protected $table = 'employee_deductions';


    protected $fillable = [
        'payroll_run_id', 'employee_profile_id', 'deduction_type_id', 'amount', 'subtraction_type', 'notes' // Fillable properties will be inserted here
    ];

       public function payrollRun(){
		return $this->belongsTo('App\Modules\HR\Models\PayrollRun', 'payroll_run_id');
	}

   public function employeeProfile(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_profile_id');
	}

   public function deductionType(){
		return $this->belongsTo('App\Modules\HR\Models\DeductionType', 'deduction_type_id');
	}

 // Relations will be inserted here
}

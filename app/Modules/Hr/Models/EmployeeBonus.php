<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EmployeeBonus extends Model
{
    use HasFactory;
    
    

    protected $table = 'employee_bonuses';


    protected $fillable = [
        'payroll_run_id', 'employee_profile_id', 'bonus_type_id', 'amount', 'addition_type', 'notes' // Fillable properties will be inserted here
    ];

       public function payrollRun(){
		return $this->belongsTo('App\Modules\Hr\Models\PayrollRun', 'payroll_run_id');
	}

   public function employeeProfile(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_profile_id');
	}

   public function bonusType(){
		return $this->belongsTo('App\Modules\Hr\Models\BonusType', 'bonus_type_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\EmployeeBonusFactory::new();
    }
}

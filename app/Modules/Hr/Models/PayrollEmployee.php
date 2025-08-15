<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PayrollEmployee extends Model
{
    use HasFactory;
    
    

    protected $table = 'payroll_employees';


    protected $fillable = [
        'payroll_number', 'employee_id', 'base_salary', 'total_allowances', 'total_bonuses', 'total_taxes', 'total_other_deductions', 'gross_pay', 'total_deductions', 'net_pay', 'comments', 'payroll_run_id' // Fillable properties will be inserted here
    ];

       public function payrollRun(){
		return $this->belongsTo('App\Modules\Hr\Models\PayrollRun', 'payroll_number');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\PayrollEmployeeFactory::new();
    }
}

<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class PayrollEmployee extends Model
{
    use HasFactory;
    
    


    protected $table = 'payroll_employees';


    protected $fillable = [
        'payroll_number', 'employee_id', 'base_salary', 'total_allowances', 'total_bonuses', 'total_taxes', 'total_other_deductions', 'gross_salary', 'total_deductions', 'net_salary', 'comments' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here
}

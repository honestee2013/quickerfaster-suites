<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class PayrollYtd extends Model
{
    use HasFactory;
    
    


    protected $table = 'payroll_ytds';


    protected $fillable = [
        'employee_id', 'year', 'gross_earnings', 'taxable_earnings', 'federal_income_tax', 'social_security_tax', 'medicare_tax', 'state_income_tax', 'pre_tax_deductions', 'post_tax_deductions' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here
}

<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RoleTax extends Model
{
    use HasFactory;
    
    

    protected $table = 'role_taxes';


    protected $fillable = [
        'payroll_run_id', 'role_id', 'tax_type_id', 'amount', 'subtraction_type', 'notes' // Fillable properties will be inserted here
    ];

       public function payrollRun(){
		return $this->belongsTo('App\Modules\Hr\Models\PayrollRun', 'payroll_run_id');
	}

   public function role(){
		return $this->belongsTo('App\Modules\Access\Models\Role', 'role_id');
	}

   public function taxType(){
		return $this->belongsTo('App\Modules\Hr\Models\TaxType', 'tax_type_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\RoleTaxFactory::new();
    }
}

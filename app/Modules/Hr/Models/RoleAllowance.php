<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class RoleAllowance extends Model
{
    use HasFactory;
    
    


    protected $table = 'role_allowances';


    protected $fillable = [
        'payroll_run_id', 'role_id', 'allowance_type_id', 'amount', 'addition_type', 'notes' // Fillable properties will be inserted here
    ];

       public function payrollRun(){
		return $this->belongsTo('App\Modules\HR\Models\PayrollRun', 'payroll_run_id');
	}

   public function role(){
		return $this->belongsTo('App\Modules\Access\Models\Role', 'role_id');
	}

   public function allowanceType(){
		return $this->belongsTo('App\Modules\HR\Models\AllowanceType', 'allowance_type_id');
	}

 // Relations will be inserted here
}

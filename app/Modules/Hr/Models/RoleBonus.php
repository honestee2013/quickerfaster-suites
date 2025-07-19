<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class RoleBonus extends Model
{
    use HasFactory;
    
    


    protected $table = 'role_bonuses';


    protected $fillable = [
        'payroll_run_id', 'role_id', 'bonus_type_id', 'amount', 'addition_type', 'notes' // Fillable properties will be inserted here
    ];

       public function payrollRun(){
		return $this->belongsTo('App\Modules\HR\Models\PayrollRun', 'payroll_run_id');
	}

   public function role(){
		return $this->belongsTo('App\Modules\Access\Models\Role', 'role_id');
	}

   public function bonusType(){
		return $this->belongsTo('App\Modules\HR\Models\BonusType', 'bonus_type_id');
	}

 // Relations will be inserted here
}

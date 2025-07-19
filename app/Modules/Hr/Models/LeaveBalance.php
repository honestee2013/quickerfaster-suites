<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class LeaveBalance extends Model
{
    use HasFactory;
    
    


    protected $table = 'leave_balances';


    protected $fillable = [
        'employee_profile_id', 'leave_type', 'remaining_days' // Fillable properties will be inserted here
    ];

       public function employeeProfile(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_profile_id');
	}

 // Relations will be inserted here
}

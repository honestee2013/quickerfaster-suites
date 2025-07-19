<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class TimeOffRequest extends Model
{
    use HasFactory;
    
    


    protected $table = 'time_off_requests';


    protected $fillable = [
        'employee_profile_id', 'leave_type', 'start_date', 'end_date', 'submission_date', 'status', 'user_id' // Fillable properties will be inserted here
    ];

       public function employeeProfile(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_profile_id');
	}

   public function user(){
		return $this->belongsTo('App\Models\User', 'user_id');
	}

 // Relations will be inserted here
}

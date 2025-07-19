<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class UserOnboardingStatus extends Model
{
    use HasFactory;
    
    


    protected $table = 'user_onboarding_statuses';


    protected $fillable = [
        'employee_profile_id', 'onboarding_task_id', 'status', 'due_date', 'completed_at' // Fillable properties will be inserted here
    ];

       public function employeeProfile(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_profile_id');
	}

   public function onboardingTask(){
		return $this->belongsTo('App\Modules\HR\Models\OnboardingTask', 'onboarding_task_id');
	}

 // Relations will be inserted here
}

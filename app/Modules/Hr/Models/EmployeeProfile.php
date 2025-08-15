<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EmployeeProfile extends Model
{
    use HasFactory;
    
    

    protected $table = 'employee_profiles';


    protected $fillable = [
        'employee_id', 'user_id', 'department', 'designation', 'shift_id', 'employee_profile_id', 'job_title_id', 'role_id', 'employment_type', 'hourly_rate', 'work_location', 'joining_date', 'termination_date', 'notes' // Fillable properties will be inserted here
    ];

       public function user(){
		return $this->belongsTo('App\Models\User', 'user_id');
	}

   public function jobTitle(){
		return $this->belongsTo('App\Modules\Hr\Models\JobTitle', 'job_title_id');
	}

   public function role(){
		return $this->belongsTo('App\Modules\Access\Models\Role', 'role_id');
	}

   public function employeeProfile(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_profile_id');
	}

   public function roleSchedules(){
		return $this->hasMany('App\Modules\Hr\Models\RoleSchedule');
	}

   public function shift(){
		return $this->belongsTo('App\Modules\Hr\Models\Shift', 'shift_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\EmployeeProfileFactory::new();
    }
}

<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserSalary extends Model
{
    use HasFactory;
    
    

    protected $table = 'user_salaries';


    protected $fillable = [
        'employee_profile_id', 'salary', 'currency' // Fillable properties will be inserted here
    ];

       public function employeeProfile(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_profile_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\UserSalaryFactory::new();
    }
}

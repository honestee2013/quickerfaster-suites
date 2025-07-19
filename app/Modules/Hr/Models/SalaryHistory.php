<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class SalaryHistory extends Model
{
    use HasFactory;
    
    


    protected $table = 'salary_histories';


    protected $fillable = [
        'employee_profile_id', 'salary', 'currency', 'effective_date', 'reason' // Fillable properties will be inserted here
    ];

       public function employeeProfile(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_profile_id');
	}

 // Relations will be inserted here
}

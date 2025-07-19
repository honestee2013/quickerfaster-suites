<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class CheckInOnlyEmployee extends Model
{
    use HasFactory;
    
    


    protected $table = 'check_in_only_employees';


    protected $fillable = [
        'employee_id', 'payment_type', 'fixed_amount' // Fillable properties will be inserted here
    ];

       public function employeeProfile(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_profile_id');
	}

 // Relations will be inserted here
}

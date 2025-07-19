<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class RoleSalary extends Model
{
    use HasFactory;
    
    


    protected $table = 'role_salaries';


    protected $fillable = [
        'role_id', 'salary', 'currency' // Fillable properties will be inserted here
    ];

       public function role(){
		return $this->belongsTo('App\Modules\Access\Models\Role', 'role_id');
	}

 // Relations will be inserted here
}

<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class CheckInOnlyRole extends Model
{
    use HasFactory;
    
    


    protected $table = 'check_in_only_roles';


    protected $fillable = [
        'role_id', 'payment_type', 'fixed_amount' // Fillable properties will be inserted here
    ];

       public function role(){
		return $this->belongsTo('App\Modules\Access\Models\Role', 'role_id');
	}

 // Relations will be inserted here
}

<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ExemptedRole extends Model
{
    use HasFactory;
    
    

    protected $table = 'exempted_roles';


    protected $fillable = [
        'role_id', 'payment_type', 'fixed_amount' // Fillable properties will be inserted here
    ];

       public function role(){
		return $this->belongsTo('App\Modules\Access\Models\Role', 'role_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\ExemptedRoleFactory::new();
    }
}

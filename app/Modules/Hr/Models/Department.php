<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Department extends Model
{
    use HasFactory;
    
    

    protected $table = 'departments';


    protected $fillable = [
        'name', 'company_id', 'description' // Fillable properties will be inserted here
    ];

       public function company(){
		return $this->belongsTo('App\Modules\Organization\Models\Company', 'company_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\DepartmentFactory::new();
    }
}

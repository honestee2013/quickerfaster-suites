<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ComplianceStandard extends Model
{
    use HasFactory;
    
    

    protected $table = 'compliance_standards';


    protected $fillable = [
        'name', 'description', 'country_code' // Fillable properties will be inserted here
    ];

       public function breakRules(){
		return $this->hasMany('App\Modules\Hr\Models\BreakRule');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\ComplianceStandardFactory::new();
    }
}

<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

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
		return $this->hasMany('App\Modules\HR\Models\BreakRule');
	}

 // Relations will be inserted here
}

<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BreakRule extends Model
{
    use HasFactory;
    
    

    protected $table = 'break_rules';


    protected $fillable = [
        'name', 'after_hours', 'min_shift_minutes', 'break_duration_minutes', 'break_type', 'max_breaks', 'break_interval_minutes', 'compliance_standard_id', 'is_mandatory', 'is_active' // Fillable properties will be inserted here
    ];

       public function complianceStandard(){
		return $this->belongsTo('App\Modules\Hr\Models\ComplianceStandard', 'compliance_standard_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\BreakRuleFactory::new();
    }
}

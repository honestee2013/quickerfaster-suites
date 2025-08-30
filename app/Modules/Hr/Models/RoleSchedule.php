<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RoleSchedule extends Model
{
    use HasFactory;
    
    

    protected $table = 'role_schedules';


    protected $fillable = [
        'name', 'role_id', 'shift_id', 'day_of_week_id', 'override_time_start', 'override_time_end', 'overtime_after_hours', 'max_paid_overtime_hours', 'overtime_rate_multiplier', 'max_daily_hours', 'break_rule_id', 'late_grace_minutes', 'early_leave_grace_minutes', 'effective_date', 'end_date', 'is_active' // Fillable properties will be inserted here
    ];

       public function role(){
		return $this->belongsTo('App\Modules\Access\Models\Role', 'role_id');
	}

   public function shift(){
		return $this->belongsTo('App\Modules\Hr\Models\Shift', 'shift_id');
	}

   public function dayOfWeek(){
		return $this->belongsTo('App\Modules\Hr\Models\DayOfWeek', 'day_of_week_id');
	}

   public function breakRule(){
		return $this->belongsTo('App\Modules\Hr\Models\BreakRule', 'break_rule_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\RoleScheduleFactory::new();
    }
}

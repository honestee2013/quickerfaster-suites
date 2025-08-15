<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AttendanceSession extends Model
{
    use HasFactory;
    
    

    protected $table = 'attendance_sessions';


    protected $fillable = [
        'attendance_date', 'employee_id', 'check_in_time', 'check_out_time', 'scheduled_start', 'scheduled_end', 'check_in_status', 'check_in_diff_mins', 'check_out_status', 'check_out_diff_mins', 'session_minutes', 'device_id', 'latitude', 'longitude' // Fillable properties will be inserted here
    ];

       public function employee(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\AttendanceSessionFactory::new();
    }
}

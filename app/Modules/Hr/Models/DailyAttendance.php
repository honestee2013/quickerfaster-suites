<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class DailyAttendance extends Model
{
    use HasFactory;
    
    


    protected $table = 'daily_attendances';


    protected $fillable = [
        'attendance_date', 'employee_id', 'attendance_type', 'attendance_time', 'scheduled_start', 'check_status', 'minutes_difference', 'scheduled_end', 'device_id', 'latitude', 'longitude', 'sync_status', 'sync_attempts' // Fillable properties will be inserted here
    ];

       public function employee(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_id');
	}

 // Relations will be inserted here
}

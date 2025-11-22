<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Modules\Hr\Models\ShiftSchedule;
use App\Modules\Hr\Models\Attendance;

use Illuminate\Database\Eloquent\Model;


class Shift extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'shifts';
    
    
    
    
    

    protected $fillable = [
        'name', 'code', 'start_time', 'end_time', 'duration_hours', 'break_duration', 'is_overnight', 'color', 'description', 'is_active', 'applicable_departments', 'overtime_starts_after', 'grace_period_minutes', 'max_shift_hours'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'duration_hours' => 'decimal:2',
        'break_duration' => 'decimal:2',
        'overtime_starts_after' => 'decimal:2',
        'grace_period_minutes' => 'integer',
        'max_shift_hours' => 'decimal:2'
    ];

    protected $dispatchesEvents = [
        
    ];

    /**
     * Validation rules for the model.
     */
    protected static $rules = [
        
    ];

    /**
     * Custom validation messages.
     */
    protected static $messages = [
        
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        
    }

    /**
     * Validate the model instance.
     */
    public function validate()
    {
        $validator = Validator::make($this->attributesToArray(), static::$rules, static::$messages);
        
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        
        return true;
    }

    /**
     * Save the model to the database with validation.
     */
    public function save(array $options = [])
    {
        $this->validate();
        return parent::save($options);
    }

    public function shiftSchedules()
    {
        return $this->hasMany(\App\Modules\Hr\Models\ShiftSchedule::class, 'shift_id', 'id');
    }

    public function attendanceRecords()
    {
        return $this->hasMany(\App\Modules\Hr\Models\Attendance::class, 'shift_id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\ShiftFactory::new();
    }
}
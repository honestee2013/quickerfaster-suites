<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Modules\Hr\Models\Timesheet;

use Illuminate\Database\Eloquent\Model;


class TimesheetEntry extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'timesheet_entries';
    
    
    
    
    

    protected $fillable = [
        'timesheet_id', 'date', 'hours_worked', 'project_code', 'task_description'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'date' => 'date',
        'hours_worked' => 'decimal:2'
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

    public function timesheet()
    {
        return $this->belongsTo(\App\Modules\Hr\Models\Timesheet::class, 'timesheet_id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\TimesheetEntryFactory::new();
    }
}
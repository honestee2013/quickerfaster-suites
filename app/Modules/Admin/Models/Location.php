<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


use Illuminate\Database\Eloquent\Model;


class Location extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'locations';
    
    
    
    
    

    protected $fillable = [
        'name', 'code', 'address_line_1', 'address_line_2', 'address_line_3', 'address_city', 'address_state_province', 'address_postal_code', 'address_country_code', 'timezone', 'is_primary', 'phone', 'email', 'is_active'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'is_active' => 'boolean'
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

    

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Admin\Database\Factories\LocationFactory::new();
    }
}
<?php

namespace App\Modules\System\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Modules\System\Models\Company;

use Illuminate\Database\Eloquent\Model;


class Plan extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'plans';
    
    
    
    
    

    protected $fillable = [
        'name', 'slug', 'description', 'currency_code', 'price_monthly', 'price_annual', 'billing_cycle', 'trial_days', 'is_active', 'sort_order', 'feature_limits'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'price_monthly' => 'decimal:2',
        'price_annual' => 'decimal:2',
        'trial_days' => 'integer',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'feature_limits' => 'json'
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

    public function companies()
    {
        return $this->hasMany(\App\Modules\System\Models\Company::class, 'plan_id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\System\Database\Factories\PlanFactory::new();
    }
}
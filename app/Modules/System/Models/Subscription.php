<?php

namespace App\Modules\System\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Modules\System\Models\Company;
use App\Modules\System\Models\Plan;

use Illuminate\Database\Eloquent\Model;


class Subscription extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'subscriptions';
    
    
    
    
    

    protected $fillable = [
        'company_id', 'plan_id', 'status', 'billing_cycle', 'currency_code', 'starts_at', 'ends_at', 'trial_ends_at', 'canceled_at', 'current_period_start', 'current_period_end', 'payment_provider', 'provider_subscription_id'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
        'trial_ends_at' => 'date',
        'canceled_at' => 'datetime',
        'current_period_start' => 'date',
        'current_period_end' => 'date'
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

    public function company()
    {
        return $this->belongsTo(\App\Modules\System\Models\Company::class, 'company_id', 'id');
    }

    public function plan()
    {
        return $this->belongsTo(\App\Modules\System\Models\Plan::class, 'plan_id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\System\Database\Factories\SubscriptionFactory::new();
    }
}
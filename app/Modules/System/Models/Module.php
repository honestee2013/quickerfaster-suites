<?php

namespace App\Modules\System\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Modules\System\Models\Company;

use Illuminate\Database\Eloquent\Model;


class Module extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'modules';
    
    
    
    
    

    protected $fillable = [
        'name', 'slug', 'description', 'is_active', 'sort_order', 'migration_path', 'service_provider'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
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
        return $this->belongsToMany(\App\Modules\System\Models\Company::class, 'module_id', 'company_id', 'id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\System\Database\Factories\ModuleFactory::new();
    }
}
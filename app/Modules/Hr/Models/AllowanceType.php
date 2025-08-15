<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AllowanceType extends Model
{
    use HasFactory;
    
    

    protected $table = 'allowance_types';


    protected $fillable = [
        'name', 'description', 'editable' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\AllowanceTypeFactory::new();
    }
}

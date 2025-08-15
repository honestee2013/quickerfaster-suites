<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DeductionType extends Model
{
    use HasFactory;
    
    

    protected $table = 'deduction_types';


    protected $fillable = [
        'name', 'description', 'pre_tax', 'editable' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\DeductionTypeFactory::new();
    }
}

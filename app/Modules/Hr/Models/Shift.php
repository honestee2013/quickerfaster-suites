<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Shift extends Model
{
    use HasFactory;
    
    

    protected $table = 'shifts';


    protected $fillable = [
        'name', 'start_time', 'end_time', 'is_overnight', 'is_active' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\ShiftFactory::new();
    }
}

<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DayOfWeek extends Model
{
    use HasFactory;
    
    

    protected $table = 'day_of_weeks';


    protected $fillable = [
        'name', 'short_name', 'editable' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\DayOfWeekFactory::new();
    }
}

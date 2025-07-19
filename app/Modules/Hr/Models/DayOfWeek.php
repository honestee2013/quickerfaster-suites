<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

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
}

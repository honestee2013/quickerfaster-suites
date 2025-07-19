<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class OnboardingTask extends Model
{
    use HasFactory;
    
    


    protected $table = 'onboarding_tasks';


    protected $fillable = [
        'name', 'description', 'editable' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here
}

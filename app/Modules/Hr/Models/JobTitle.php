<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class JobTitle extends Model
{
    use HasFactory;
    
    


    protected $table = 'job_titles';


    protected $fillable = [
        'title', 'description', 'editable' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here
}

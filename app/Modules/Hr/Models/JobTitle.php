<?php

namespace App\Modules\Hr\Models;

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

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\JobTitleFactory::new();
    }
}

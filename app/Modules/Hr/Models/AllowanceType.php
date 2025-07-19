<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

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
}

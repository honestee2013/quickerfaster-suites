<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

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
}

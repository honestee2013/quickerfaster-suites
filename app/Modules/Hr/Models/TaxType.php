<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class TaxType extends Model
{
    use HasFactory;
    
    


    protected $table = 'tax_types';


    protected $fillable = [
        'name', 'description', 'is_statutory', 'rate', 'wage_base_limit', 'additional_rate', 'additional_threshold', 'editable' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here
}

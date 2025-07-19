<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class PayGrade extends Model
{
    use HasFactory;
    
    


    protected $table = 'pay_grades';


    protected $fillable = [
        'name', 'min_salary', 'max_salary', 'currency', 'description' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here
}

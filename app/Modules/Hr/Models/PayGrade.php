<?php

namespace App\Modules\Hr\Models;

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

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\PayGradeFactory::new();
    }
}

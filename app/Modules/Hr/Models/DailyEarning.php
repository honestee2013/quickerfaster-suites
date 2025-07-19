<?php

namespace App\Modules\hr\Models; // Important: Include the module namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class DailyEarning extends Model
{
    use HasFactory;
    
    


    protected $table = 'daily_earnings';


    protected $fillable = [
        'employee_id', 'work_date', 'regular_hours', 'overtime_hours', 'total_hours', 'regular_amount', 'overtime_amount', 'total_amount' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here
}

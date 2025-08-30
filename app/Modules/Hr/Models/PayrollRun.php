<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PayrollRun extends Model
{
    use HasFactory;
    
    protected $displayFields =['title','payroll_number']; 


    protected $table = 'payroll_runs';


    protected $fillable = [
        'payroll_number', 'title', 'from_date', 'to_date', 'status', 'payroll_components', 'attendance_options', 'created_by', 'approved_by', 'approved_at', 'paid_by', 'paid_at', 'cancelled_by', 'cancelled_at', 'notes', 'editable' // Fillable properties will be inserted here
    ];

     // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\PayrollRunFactory::new();
    }
}

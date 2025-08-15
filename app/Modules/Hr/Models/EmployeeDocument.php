<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EmployeeDocument extends Model
{
    use HasFactory;
    
    

    protected $table = 'employee_documents';


    protected $fillable = [
        'employee_id', 'document_type', 'file_path', 'original_name', 'mime_type', 'notes' // Fillable properties will be inserted here
    ];

       public function employee(){
		return $this->belongsTo('App\Modules\Hr\Models\EmployeeProfile', 'employee_id');
	}

 // Relations will be inserted here

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\EmployeeDocumentFactory::new();
    }
}

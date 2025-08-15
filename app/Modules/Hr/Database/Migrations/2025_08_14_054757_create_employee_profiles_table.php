<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
			$table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete();
			$table->string('department')->nullable();
			$table->string('designation')->nullable();
			$table->foreignId('shift_id')->constrained('shifts', 'id')->setNullOnDelete();
			$table->foreignId('employee_profile_id')->nullable()->constrained('employee_profiles', 'id')->setNullOnDelete();
			$table->foreignId('job_title_id')->nullable()->constrained('job_titles', 'id')->setNullOnDelete();
			$table->foreignId('role_id')->constrained('roles', 'id')->cascadeOnDelete();
			$table->string('employment_type')->nullable();
			$table->decimal('hourly_rate', 5, 2)->default(0)->nullable();
			$table->string('work_location')->nullable();
			$table->date('joining_date')->nullable();
			$table->date('termination_date')->nullable();
			$table->text('notes')->nullable();
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_profiles');
    }
};

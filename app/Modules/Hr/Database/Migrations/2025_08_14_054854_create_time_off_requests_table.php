<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('time_off_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_profile_id')->constrained('employee_profiles', 'id')->cascadeOnDelete();
			$table->string('leave_type');
			$table->date('start_date');
			$table->date('end_date');
			$table->datetime('submission_date')->nullable();
			$table->string('status');
			$table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete();
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_off_requests');
    }
};

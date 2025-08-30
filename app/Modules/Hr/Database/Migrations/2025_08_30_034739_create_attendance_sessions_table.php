<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendance_sessions', function (Blueprint $table) {
            $table->id();
            $table->date('attendance_date')->nullable();
			$table->string('employee_id')->nullable();
			$table->time('check_in_time')->nullable();
			$table->time('check_out_time')->nullable();
			$table->time('scheduled_start')->nullable();
			$table->time('scheduled_end')->nullable();
			$table->string('check_in_status')->nullable();
			$table->integer('check_in_diff_mins')->nullable();
			$table->string('check_out_status')->nullable();
			$table->integer('check_out_diff_mins')->nullable();
			$table->integer('session_minutes')->nullable();
			$table->string('device_name')->nullable();
			$table->string('device_id')->nullable();
			$table->string('location_name')->nullable();
			$table->string('timezone')->nullable();
			$table->integer('latitude')->nullable();
			$table->integer('longitude')->nullable();
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance_sessions');
    }
};

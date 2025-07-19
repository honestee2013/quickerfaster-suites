<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('daily_attendances', function (Blueprint $table) {
            $table->id();
            $table->date('attendance_date');
			$table->string('employee_id')->nullable();
			$table->string('attendance_type');
			$table->time('attendance_time');
			$table->time('scheduled_start')->nullable();
			$table->string('check_status')->nullable();
			$table->integer('minutes_difference')->nullable();
			$table->time('scheduled_end')->nullable();
			$table->string('device_id');
			$table->integer('latitude')->nullable();
			$table->integer('longitude')->nullable();
			$table->string('sync_status');
			$table->integer('sync_attempts');
			
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_attendances');
    }
};

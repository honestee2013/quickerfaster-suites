<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clock_events', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('event_type');
            $table->datetime('timestamp');
            $table->string('method')->default('device')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->integer('accuracy_meters')->nullable();
            $table->string('address')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('device_id')->nullable();
            $table->string('sync_status')->default('pending')->nullable();
            $table->integer('sync_attempts')->default(0)->nullable();
            
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clock_events');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('duration_hours', 4, 2)->nullable();
            $table->decimal('break_duration', 4, 2)->default(0);
            $table->string('is_overnight')->default(false);
            $table->string('color')->default('#3B82F6');
            $table->text('description')->nullable();
            $table->string('is_active')->default(true);
            $table->string('applicable_departments')->default('All Departments');
            $table->decimal('overtime_starts_after', 4, 2)->default(8);
            $table->integer('grace_period_minutes')->default(5);
            $table->decimal('max_shift_hours', 4, 2)->default(12);
            
            			$table->unique('code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shifts');
    }
};

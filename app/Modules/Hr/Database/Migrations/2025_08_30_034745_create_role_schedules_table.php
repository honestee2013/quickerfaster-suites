<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('role_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->foreignId('role_id')->constrained('roles', 'id')->cascadeOnDelete();
			$table->foreignId('shift_id')->constrained('shifts', 'id')->cascadeOnDelete();
			$table->foreignId('day_of_week_id')->constrained('day_of_weeks', 'id')->cascadeOnDelete();
			$table->time('override_time_start')->nullable();
			$table->time('override_time_end')->nullable();
			$table->decimal('overtime_after_hours', 4, 2)->nullable();
			$table->decimal('max_paid_overtime_hours', 4, 2)->nullable();
			$table->decimal('overtime_rate_multiplier', 4, 2)->nullable();
			$table->decimal('max_daily_hours', 4, 2)->nullable();
			$table->foreignId('break_rule_id')->nullable()->constrained('break_rules', 'id')->setNullOnDelete();
			$table->integer('late_grace_minutes');
			$table->integer('early_leave_grace_minutes');
			$table->date('effective_date');
			$table->date('end_date')->nullable();
			$table->string('is_active')->nullable();
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_schedules');
    }
};

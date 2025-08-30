<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('break_rules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->decimal('after_hours', 4, 2);
			$table->integer('min_shift_minutes');
			$table->integer('break_duration_minutes');
			$table->string('break_type');
			$table->integer('max_breaks');
			$table->integer('break_interval_minutes')->nullable();
			$table->foreignId('compliance_standard_id')->nullable()->constrained('compliance_standards', 'id')->setNullOnDelete();
			$table->string('is_mandatory')->nullable();
			$table->string('is_active')->nullable();
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('break_rules');
    }
};

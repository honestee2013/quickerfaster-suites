<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employee_allowances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_run_id')->constrained('payroll_runs', 'id')->cascadeOnDelete();
			$table->foreignId('employee_profile_id')->constrained('employee_profiles', 'id')->cascadeOnDelete();
			$table->foreignId('allowance_type_id')->constrained('allowance_types', 'id')->restrictOnDelete();
			$table->decimal('amount', 10, 2);
			$table->string('addition_type');
			$table->text('notes')->nullable();
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_allowances');
    }
};

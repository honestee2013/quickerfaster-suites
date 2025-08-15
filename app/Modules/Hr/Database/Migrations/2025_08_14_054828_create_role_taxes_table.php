<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('role_taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_run_id')->constrained('payroll_runs', 'id')->cascadeOnDelete();
			$table->foreignId('role_id')->constrained('roles', 'id')->cascadeOnDelete();
			$table->foreignId('tax_type_id')->constrained('tax_types', 'id')->restrictOnDelete();
			$table->decimal('amount', 10, 2);
			$table->string('subtraction_type');
			$table->text('notes')->nullable();
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_taxes');
    }
};

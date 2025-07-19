<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payroll_employees', function (Blueprint $table) {
            $table->id();
            $table->string('payroll_number');
			$table->string('employee_id');
			$table->decimal('base_salary', 12, 2);
			$table->decimal('total_allowances', 12, 2);
			$table->decimal('total_bonuses', 12, 2);
			$table->decimal('total_taxes', 12, 2);
			$table->decimal('total_other_deductions', 12, 2);
			$table->decimal('gross_salary', 12, 2);
			$table->decimal('total_deductions', 12, 2);
			$table->decimal('net_salary', 12, 2);
			$table->text('comments')->nullable();
			
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payroll_employees');
    }
};

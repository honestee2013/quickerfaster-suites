<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payroll_ytds', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
			$table->integer('year');
			$table->decimal('gross_earnings', 12, 2);
			$table->decimal('taxable_earnings', 12, 2);
			$table->decimal('federal_income_tax', 12, 2);
			$table->decimal('social_security_tax', 12, 2);
			$table->decimal('medicare_tax', 12, 2);
			$table->decimal('state_income_tax', 12, 2);
			$table->decimal('pre_tax_deductions', 12, 2);
			$table->decimal('post_tax_deductions', 12, 2);
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payroll_ytds');
    }
};

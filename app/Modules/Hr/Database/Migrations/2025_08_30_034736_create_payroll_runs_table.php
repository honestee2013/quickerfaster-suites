<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payroll_runs', function (Blueprint $table) {
            $table->id();
            $table->string('payroll_number');
			$table->string('title');
			$table->date('from_date');
			$table->date('to_date');
			$table->string('status')->default('draft');
			$table->string('payroll_components')->default('allowances, taxes');
			$table->string('attendance_options');
			$table->string('created_by')->nullable();
			$table->string('approved_by')->nullable();
			$table->datetime('approved_at')->nullable();
			$table->string('paid_by')->nullable();
			$table->datetime('paid_at')->nullable();
			$table->string('cancelled_by')->nullable();
			$table->datetime('cancelled_at')->nullable();
			$table->text('notes')->nullable();
			$table->string('editable')->default('Yes');
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payroll_runs');
    }
};

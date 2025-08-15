<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('daily_earnings', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
			$table->date('work_date')->nullable();
			$table->decimal('regular_hours', 5, 2)->default(0)->nullable();
			$table->decimal('overtime_hours', 5, 2)->default(0)->nullable();
			$table->decimal('total_hours', 5, 2)->default(0)->nullable();
			$table->decimal('regular_amount', 10, 2)->default(0)->nullable();
			$table->decimal('overtime_amount', 10, 2)->default(0)->nullable();
			$table->decimal('total_amount', 10, 2)->default(0)->nullable();
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_earnings');
    }
};

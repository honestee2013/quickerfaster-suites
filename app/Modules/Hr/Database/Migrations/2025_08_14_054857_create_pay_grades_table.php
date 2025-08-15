<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pay_grades', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->decimal('min_salary', 12, 2)->nullable();
			$table->decimal('max_salary', 12, 2)->nullable();
			$table->string('currency');
			$table->text('description')->nullable();
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pay_grades');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_profile_id')->constrained('employee_profiles', 'id')->cascadeOnDelete();
			$table->decimal('salary', 12, 2)->nullable();
			$table->string('currency')->nullable();
			
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_salaries');
    }
};

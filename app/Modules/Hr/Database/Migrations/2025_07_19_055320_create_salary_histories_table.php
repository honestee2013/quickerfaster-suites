<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('salary_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_profile_id')->constrained('employee_profiles', 'id')->cascadeOnDelete();
			$table->decimal('salary', 12, 2);
			$table->string('currency');
			$table->datetime('effective_date');
			$table->string('reason')->nullable();
			
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salary_histories');
    }
};

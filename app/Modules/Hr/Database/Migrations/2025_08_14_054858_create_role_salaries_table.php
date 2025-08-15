<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('role_salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles', 'id')->cascadeOnDelete();
			$table->decimal('salary', 12, 2);
			$table->string('currency');
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_salaries');
    }
};

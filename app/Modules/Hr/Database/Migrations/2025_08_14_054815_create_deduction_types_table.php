<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('deduction_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->text('description')->nullable();
			$table->string('pre_tax')->default('No');
			$table->string('editable')->default('Yes');
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deduction_types');
    }
};

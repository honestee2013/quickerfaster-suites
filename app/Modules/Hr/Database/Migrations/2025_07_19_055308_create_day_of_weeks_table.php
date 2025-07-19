<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('day_of_weeks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->string('short_name');
			$table->string('editable')->default('Yes');
			
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('day_of_weeks');
    }
};

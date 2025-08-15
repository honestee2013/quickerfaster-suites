<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tax_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->text('description')->nullable();
			$table->string('is_statutory')->nullable();
			$table->decimal('rate', 5, 2)->nullable();
			$table->decimal('wage_base_limit', 12, 2)->nullable();
			$table->decimal('additional_rate', 5, 2)->nullable();
			$table->decimal('additional_threshold', 12, 2)->nullable();
			$table->string('editable');
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tax_types');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('exempted_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles', 'id')->cascadeOnDelete();
			$table->string('payment_type');
			$table->decimal('fixed_amount', 10, 2)->default(0)->nullable();
			
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exempted_roles');
    }
};

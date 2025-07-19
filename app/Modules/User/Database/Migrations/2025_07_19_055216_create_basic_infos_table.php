<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->nullable();
			$table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete();
			$table->text('about_me')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('email')->nullable();
			$table->string('address_line_1')->nullable();
			$table->string('address_line_2')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('postal_code')->nullable();
			$table->string('country')->nullable();
			$table->date('date_of_birth')->nullable();
			$table->string('gender')->nullable();
			
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('basic_infos');
    }
};

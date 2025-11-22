<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->date('week_starting');
            $table->string('status')->default('Draft');
            $table->datetime('submitted_at')->nullable();
            $table->datetime('approved_at')->nullable();
            $table->string('approved_by')->nullable();
            $table->text('notes')->nullable();
            
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('timesheet_entries', function (Blueprint $table) {
            $table->id();
            $table->string('timesheet_id');
            $table->date('date');
            $table->decimal('hours_worked', 4, 2);
            $table->string('project_code')->nullable();
            $table->text('task_description')->nullable();
            
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('timesheet_entries');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_onboarding_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_profile_id')->constrained('employee_profiles', 'id')->cascadeOnDelete();
			$table->foreignId('onboarding_task_id')->constrained('onboarding_tasks', 'id')->cascadeOnDelete();
			$table->string('status');
			$table->date('due_date')->nullable();
			$table->datetime('completed_at')->nullable();
			
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_onboarding_statuses');
    }
};

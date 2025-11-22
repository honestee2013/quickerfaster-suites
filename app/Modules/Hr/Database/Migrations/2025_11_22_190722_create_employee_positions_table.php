<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employee_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees', 'id')->onDelete('cascade');
            $table->foreignId('job_title_id')->constrained('job_titles', 'id')->onDelete('restrict');
            $table->foreignId('department_id')->constrained('departments', 'id')->onDelete('restrict');
            $table->foreignId('manager_id')->nullable()->constrained('employees', 'id')->onDelete('set null');
            $table->string('pay_type');
            $table->decimal('hourly_rate', 10, 2)->default(0)->nullable();
            $table->string('employment_status');
            $table->foreignId('location_id')->nullable()->constrained('locations', 'id')->onDelete('restrict');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->decimal('base_salary', 10, 2)->default(0)->nullable();
            $table->string('salary_currency')->default('USD')->nullable();
            $table->string('pay_frequency')->nullable();
            $table->string('cost_center')->nullable();
            $table->string('work_email')->nullable();
            $table->string('work_phone_extension')->nullable();
            $table->foreignId('reports_to')->nullable()->constrained('employees', 'id')->onDelete('set null');
            $table->text('job_description')->nullable();
            $table->boolean('is_primary')->nullable();
            
            			$table->unique('work_email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_positions');
    }
};

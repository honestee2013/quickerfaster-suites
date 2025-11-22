<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subdomain');
            $table->boolean('domain_verified')->default(false)->nullable();
            $table->text('email_verification_token')->nullable();
            $table->datetime('email_verification_sent_at')->nullable();
            $table->string('database_name')->nullable();
            $table->string('employee_count')->nullable();
            $table->string('industry')->default('pending')->nullable();
            $table->string('status')->default('pending')->nullable();
            $table->foreignId('plan_id')->nullable()->constrained('plans', 'id')->onDelete('set null');
            $table->string('billing_email');
            $table->string('billing_address_line_1')->nullable();
            $table->string('billing_address_line_2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state_province')->nullable();
            $table->string('billing_postal_code')->nullable();
            $table->string('billing_country_code')->nullable();
            $table->string('timezone')->nullable();
            $table->string('currency_code')->nullable();
            
            			$table->unique('subdomain');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};

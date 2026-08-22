<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Business Name (e.g., Den's Milk Tea)
            $table->string('slug')->unique(); // URL-friendly name (e.g., dens-milk-tea)
            $table->string('email')->unique(); // Business email for reports
            $table->string('phone')->nullable(); // Business phone
            $table->string('address')->nullable(); // Physical Address
            $table->string('tin_no')->nullable(); // BIR TIN Number
            $table->string('industry_type')->default('food'); // food, retail, services
            $table->string('subscription_plan')->default('small'); // small, enterprise
            $table->boolean('is_active')->default(true); // For banning non-paying clients
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};

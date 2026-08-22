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
        Schema::create('modifiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->cascadeOnDelete(); // Belongs to a specific client
            $table->string('name'); // e.g., "Size", "Toppings", "Sugar Level"
            $table->string('type')->default('single'); // single, multiple (e.g., choose one size vs. select many toppings)
            $table->boolean('is_required')->default(false); // e.g., "Select Sugar Level"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modifiers');
    }
};

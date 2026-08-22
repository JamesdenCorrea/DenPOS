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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->cascadeOnDelete(); // Belongs to a specific client
            $table->string('name'); // Product Name
            $table->string('sku')->nullable(); // Barcode or Stock Keeping Unit
            $table->decimal('price', 12, 2)->default(0); // Selling Price
            $table->decimal('cost', 12, 2)->default(0); // Capital Cost (for profit calculation)
            $table->integer('stock')->default(0); // Current Quantity on hand
            $table->boolean('is_active')->default(true); // Soft delete (hide from POS)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

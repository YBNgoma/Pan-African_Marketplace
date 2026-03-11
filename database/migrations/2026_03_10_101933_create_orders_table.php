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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Buyer
            $table->foreignId('team_id')->constrained()->cascadeOnDelete(); // Vendor Shop
            $table->decimal('total_amount', 15, 2);
            $table->string('stripe_payment_intent_id')->nullable();
            $table->string('status')->default('pending'); // pending, authorized, captured, delivered, cancelled
            $table->string('shipping_status')->default('pending'); // pending, shipped, delivered
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

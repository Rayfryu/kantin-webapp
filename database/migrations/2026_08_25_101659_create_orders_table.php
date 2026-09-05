<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->foreignId('tenant_id')->constrained()->restrictOnDelete();
            $table->foreignId('pickup_slot_id')->constrained()->restrictOnDelete();
            
            $table->string('order_number')->unique();
            $table->string('status')->default('PENDING_PAYMENT');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total_amount', 15, 2);
            $table->string('pickup_code', 10)->nullable();
            
            $table->dateTime('paid_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            
            $table->timestamps();
            
            // Index untuk mempercepat query saat penjual memfilter status pesanannya
            $table->index(['tenant_id', 'status']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('orders');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->restrictOnDelete();
            $table->string('provider')->default('MIDTRANS');
            $table->string('transaction_id')->nullable()->unique();
            $table->string('payment_type')->default('QRIS');
            $table->decimal('amount', 15, 2);
            $table->string('status')->default('PENDING'); // Sesuai Enum PaymentStatus
            $table->dateTime('paid_at')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->json('raw_response')->nullable();
            $table->timestamps();
            
            // Index untuk mempercepat pencarian data dari Webhook Midtrans
            $table->index('transaction_id');
        });
    }

    public function down(): void {
        Schema::dropIfExists('payments');
    }
};
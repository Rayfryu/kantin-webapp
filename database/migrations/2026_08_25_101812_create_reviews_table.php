<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('rating'); // Menyimpan nilai 1-5
            $table->text('comment')->nullable();
            $table->timestamps();
            
            // Constraint: 1 Pesanan hanya boleh di-review 1 kali oleh user yang sama
            $table->unique(['order_id', 'user_id']); 
        });
    }

    public function down(): void {
        Schema::dropIfExists('reviews');
    }
};
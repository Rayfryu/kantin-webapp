<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pickup_slots', function (Blueprint $table) {
            $table->id();
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedInteger('capacity');
            $table->string('status')->default('ACTIVE'); // Enum PickupSlotStatus
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pickup_slots'); }
};
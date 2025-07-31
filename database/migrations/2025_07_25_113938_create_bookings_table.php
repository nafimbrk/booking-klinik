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
    Schema::create('bookings', function (Blueprint $table) {
    $table->id();
    $table->foreignId('doctor_id')->constrained()->onDelete('cascade');

    // Ganti user_id dengan nama & telepon pasien
    $table->string('patient_name');
    $table->string('patient_phone');

    $table->date('booking_date');
    $table->time('booking_time');
    $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
    $table->text('note')->nullable(); // keluhan pasien
    $table->timestamps();
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

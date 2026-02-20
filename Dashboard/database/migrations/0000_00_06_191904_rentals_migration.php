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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('car_id')->references('id')->on('cars');
            $table->foreignId('driver_id')->references('id')->on('drivers');
            $table->date('pickup_date');
            $table->date('return_date');
            $table->double('total_amount');
            $table->enum('status', ['pending', 'confirmed', 'active', 'completed', 'canceled']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

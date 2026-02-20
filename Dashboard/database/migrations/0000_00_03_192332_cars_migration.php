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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->references('id')->on('brands');
            $table->string('model');
            $table->integer('year');
            $table->string('color');
            $table->string('license_plate');
            $table->integer('mileage');
            $table->double('lat');
            $table->double('lng');
            $table->integer('is_premium');
            $table->integer('rental_count');
            $table->integer('daily_rate');
            $table->enum('status', ['available', 'rented', 'maintenance', 'retired']);

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

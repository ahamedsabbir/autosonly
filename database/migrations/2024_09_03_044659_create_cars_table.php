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
            $table->string('name', 100);
            $table->string('make', 100);
            $table->string('model', 100);
            $table->dateTime('year');
            $table->string('license_plate', 255)->unique();
            $table->decimal('rental_price_per_day', 10, 2);
            $table->enum('available', ['yes', 'no'])->default('yes');
            $table->enum('status', ['repair', 'ok'])->default('ok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

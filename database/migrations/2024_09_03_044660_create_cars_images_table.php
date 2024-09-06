<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('car_id')->unsigned()->nullable();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->string('image_url');
        });

        
        $cars = range(1, 20);
        foreach ($cars as $car) {
            DB::table('cars_images')->insert([
                [ 'car_id' => $car, 'image_url' => 'default/car ('.rand(1, 6).').png', 'created_at' => now(), 'updated_at' => now() ],
                [ 'car_id' => $car, 'image_url' => 'default/car ('.rand(1, 6).').png', 'created_at' => now(), 'updated_at' => now() ],
                [ 'car_id' => $car, 'image_url' => 'default/car ('.rand(1, 6).').png', 'created_at' => now(), 'updated_at' => now() ],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars_images');
    }
};

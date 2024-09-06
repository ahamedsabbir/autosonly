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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('make', 50);
            $table->string('model', 50);
            $table->string('year');
            $table->string('license_plate', 255)->unique();
            $table->decimal('rental_price_per_day', 10, 2)->comment('Rental price per day');
            $table->enum('available', ['yes', 'no'])->default('yes');
            $table->string('type', 50)->nullable();
            $table->string('location', 50)->nullable();
            $table->string('transmission', 50)->nullable();
            $table->string('bags', 50)->nullable();
            $table->enum('status', ['repair', 'ok'])->default('ok');
            $table->timestamps();
        });
        DB::table('cars')->insert([
            ['name' => 'Car 1', 'make' => 'Make 1', 'model' => '2004', 'year' => '2022', 'license_plate' => 'ABC123', 'rental_price_per_day' => 900.00, 'available' => 'yes', 'type' => 'sedan', 'location' => 'bangladesh', 'transmission' => 'manual', 'bags' => '4', 'status' => 'ok'],
            ['name' => 'Car 2', 'make' => 'Make 2', 'model' => '2010', 'year' => '2022', 'license_plate' => 'DEF456', 'rental_price_per_day' => 900.00, 'available' => 'yes', 'type' => 'suv', 'location' => 'united states', 'transmission' => 'automatic', 'bags' => '5', 'status' => 'ok'],
            ['name' => 'Car 3', 'make' => 'Make 3', 'model' => '2015', 'year' => '2022', 'license_plate' => 'GHI789', 'rental_price_per_day' => 1050.00, 'available' => 'yes', 'type' => 'sedan', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '4', 'status' => 'ok'],
            ['name' => 'Car 4', 'make' => 'Make 4', 'model' => '2018', 'year' => '2022', 'license_plate' => 'JKL012', 'rental_price_per_day' => 1050.00, 'available' => 'yes', 'type' => 'suv', 'location' => 'united states', 'transmission' => 'automatic', 'bags' => '5', 'status' => 'ok'],
            ['name' => 'Car 5', 'make' => 'Make 5', 'model' => '2020', 'year' => '2022', 'license_plate' => 'MNO345', 'rental_price_per_day' => 300.00, 'available' => 'yes', 'type' => 'sedan', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '4', 'status' => 'ok'],
            ['name' => 'Car 6', 'make' => 'Make 6', 'model' => '1990', 'year' => '2022', 'license_plate' => 'PQR678', 'rental_price_per_day' => 350.00, 'available' => 'yes', 'type' => 'suv', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '5', 'status' => 'ok'],
            ['name' => 'Car 7', 'make' => 'Make 7', 'model' => '2012', 'year' => '2022', 'license_plate' => 'STU901', 'rental_price_per_day' => 400.00, 'available' => 'yes', 'type' => 'truck', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '4', 'status' => 'ok'],
            ['name' => 'Car 8', 'make' => 'Make 8', 'model' => '2019', 'year' => '2022', 'license_plate' => 'VWX2434', 'rental_price_per_day' => 900.00, 'available' => 'yes', 'type' => 'bus', 'location' => 'india', 'transmission' => 'automatic', 'bags' => '5', 'status' => 'ok'],
            ['name' => 'Car 9', 'make' => 'Make 9', 'model' => '1995', 'year' => '2022', 'license_plate' => 'YZA5467', 'rental_price_per_day' => 900.00, 'available' => 'yes', 'type' => 'sedan', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '4', 'status' => 'ok'],
            ['name' => 'Car 10', 'make' => 'Make 10', 'model' => '2016', 'year' => '2022', 'license_plate' => 'BCD8904', 'rental_price_per_day' => 300.00, 'available' => 'yes', 'type' => 'suv', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '5', 'status' => 'ok'],
            ['name' => 'Car 11', 'make' => 'Make 11', 'model' => '2021', 'year' => '2022', 'license_plate' => 'EFG456', 'rental_price_per_day' => 600.00, 'available' => 'yes', 'type' => 'sedan', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '4', 'status' => 'ok'],
            ['name' => 'Car 12', 'make' => 'Make 12', 'model' => '2014', 'year' => '2022', 'license_plate' => 'HIJ678', 'rental_price_per_day' => 650.00, 'available' => 'yes', 'type' => 'suv', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '5', 'status' => 'ok'],
            ['name' => 'Car 13', 'make' => 'Make 13', 'model' => '2011', 'year' => '2022', 'license_plate' => 'KLM012', 'rental_price_per_day' => 1050.00, 'available' => 'yes', 'type' => 'sedan', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '4', 'status' => 'ok'],
            ['name' => 'Car 14', 'make' => 'Make 14', 'model' => '2017', 'year' => '2022', 'license_plate' => 'NOP345', 'rental_price_per_day' => 1050.00, 'available' => 'yes', 'type' => 'truck', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '5', 'status' => 'ok'],
            ['name' => 'Car 15', 'make' => 'Make 15', 'model' => '1999', 'year' => '2022', 'license_plate' => 'QRS678', 'rental_price_per_day' => 300.00, 'available' => 'yes', 'type' => 'sedan', 'location' => 'india', 'transmission' => 'automatic', 'bags' => '4', 'status' => 'ok'],
            ['name' => 'Car 16', 'make' => 'Make 16', 'model' => '2013', 'year' => '2022', 'license_plate' => 'TUV901', 'rental_price_per_day' => 900.00, 'available' => 'yes', 'type' => 'suv', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '5', 'status' => 'ok'],
            ['name' => 'Car 17', 'make' => 'Make 17', 'model' => '2007', 'year' => '2022', 'license_plate' => 'VWX234', 'rental_price_per_day' => 900.00, 'available' => 'yes', 'type' => 'sedan', 'location' => 'england', 'transmission' => 'automatic', 'bags' => '4', 'status' => 'ok'],
            ['name' => 'Car 18', 'make' => 'Make 18', 'model' => '2010', 'year' => '2022', 'license_plate' => 'YZA567', 'rental_price_per_day' => 950.00, 'available' => 'yes', 'type' => 'suv', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '5', 'status' => 'ok'],
            ['name' => 'Car 19', 'make' => 'Make 19', 'model' => '2003', 'year' => '2022', 'license_plate' => 'BCD44890', 'rental_price_per_day' => 1000.00, 'available' => 'yes', 'type' => 'sedan', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '4', 'status' => 'ok'],
            ['name' => 'Car 20', 'make' => 'Make 20', 'model' => '2000', 'year' => '2022', 'license_plate' => 'EFG45464', 'rental_price_per_day' => 1050.00, 'available' => 'yes', 'type' => 'suv', 'location' => 'bangladesh', 'transmission' => 'automatic', 'bags' => '5', 'status' => 'ok'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

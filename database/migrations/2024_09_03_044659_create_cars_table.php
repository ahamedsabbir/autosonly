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
            $table->string('name', 100);
            $table->string('make', 100);
            $table->string('model', 100);
            $table->string('year');
            $table->string('license_plate', 255)->unique();
            $table->decimal('rental_price_per_day', 10, 2)->comment('Rental price per day');
            $table->enum('available', ['yes', 'no'])->default('yes');
            $table->enum('status', ['repair', 'ok'])->default('ok');
            $table->timestamps();
        });
        DB::table('cars')->insert([
            ['name' => 'Toyota Camry', 'make' => 'Toyota', 'model' => 'Camry', 'year' => '2020', 'license_plate' => 'ABC123', 'rental_price_per_day' => 50.00],
            ['name' => 'Honda Civic', 'make' => 'Honda', 'model' => 'Civic', 'year' => '2021', 'license_plate' => 'DEF456', 'rental_price_per_day' => 40.00],
            ['name' => 'Nissan Altima', 'make' => 'Nissan', 'model' => 'Altima', 'year' => '2022', 'license_plate' => 'GHI789', 'rental_price_per_day' => 35.00],
            ['name' => 'Ford Fusion', 'make' => 'Ford', 'model' => 'Fusion', 'year' => '2023', 'license_plate' => 'JKL012', 'rental_price_per_day' => 30.00],
            ['name' => 'Chevrolet Camaro', 'make' => 'Chevrolet', 'model' => 'Camaro', 'year' => '2024', 'license_plate' => 'MNO345', 'rental_price_per_day' => 25.00],
            ['name' => 'Volkswagen Jetta', 'make' => 'Volkswagen', 'model' => 'Jetta', 'year' => '2025', 'license_plate' => 'PQR678', 'rental_price_per_day' => 20.00],
            ['name' => 'Hyundai Elantra', 'make' => 'Hyundai', 'model' => 'Elantra', 'year' => '2026', 'license_plate' => 'STU901', 'rental_price_per_day' => 15.00],
            ['name' => 'BMW 3 Series', 'make' => 'BMW', 'model' => '3 Series', 'year' => '2027', 'license_plate' => 'VWX234', 'rental_price_per_day' => 10.00],
            ['name' => 'Mercedes-Benz C-Class', 'make' => 'Mercedes-Benz', 'model' => 'C-Class', 'year' => '2028', 'license_plate' => 'YZA567', 'rental_price_per_day' => 5.00],
            ['name' => 'Audi A4', 'make' => 'Audi', 'model' => 'A4', 'year' => '2029', 'license_plate' => 'BCD890', 'rental_price_per_day' => 1.00],
            ['name' => 'Jeep Wrangler', 'make' => 'Jeep', 'model' => 'Wrangler', 'year' => '2030', 'license_plate' => 'EFG123', 'rental_price_per_day' => 0.00],
            ['name' => 'Kia Forte', 'make' => 'Kia', 'model' => 'Forte', 'year' => '2031', 'license_plate' => 'HIJ456', 'rental_price_per_day' => 0.00],
            ['name' => 'Subaru Outback', 'make' => 'Subaru', 'model' => 'Outback', 'year' => '2032', 'license_plate' => 'KLM789', 'rental_price_per_day' => 0.00],
            ['name' => 'Mazda 3', 'make' => 'Mazda', 'model' => '3', 'year' => '2033', 'license_plate' => 'NOP012', 'rental_price_per_day' => 0.00],
            ['name' => 'Lexus RX', 'make' => 'Lexus', 'model' => 'RX', 'year' => '2034', 'license_plate' => 'QRS345', 'rental_price_per_day' => 0.00],
            ['name' => 'Dodge Challenger', 'make' => 'Dodge', 'model' => 'Challenger', 'year' => '2035', 'license_plate' => 'TUV678', 'rental_price_per_day' => 0.00],
            ['name' => 'Porsche 911', 'make' => 'Porsche', 'model' => '911', 'year' => '2036', 'license_plate' => 'WXY901', 'rental_price_per_day' => 0.00],
            ['name' => 'Land Rover Range Rover', 'make' => 'Land Rover', 'model' => 'Range Rover', 'year' => '2037', 'license_plate' => 'ZAB234', 'rental_price_per_day' => 0.00],
            ['name' => 'Tesla Model S', 'make' => 'Tesla', 'model' => 'Model S', 'year' => '2038', 'license_plate' => 'CDE567', 'rental_price_per_day' => 0.00],
            ['name' => 'Ferrari 488', 'make' => 'Ferrari', 'model' => '488', 'year' => '2039', 'license_plate' => 'FGH890', 'rental_price_per_day' => 0.00],
            ['name' => 'Nissan GT-R', 'make' => 'Nissan', 'model' => 'GT-R', 'year' => '2040', 'license_plate' => 'HIJ123', 'rental_price_per_day' => 0.00],
            ['name' => 'Volkswagen Jetta', 'make' => 'Volkswagen', 'model' => 'Jetta', 'year' => '2041', 'license_plate' => 'KLM456', 'rental_price_per_day' => 0.00],
            ['name' => 'Hyundai Elantra', 'make' => 'Hyundai', 'model' => 'Elantra', 'year' => '2042', 'license_plate' => 'NOP789', 'rental_price_per_day' => 0.00],
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

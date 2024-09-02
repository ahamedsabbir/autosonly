<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('title')->default('Laravel');
            $table->string('keywords')->nullable();
            $table->longText('description')->nullable();
            $table->string('author')->default('Laravel');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('copyright')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
        DB::table('settings')->insert([
            'favicon' => 'default-favicon.ico',
            'logo' => 'default-logo.png',
            'title' => 'My Laravel Site',
            'keywords' => 'Laravel, AdminLTE, PHP',
            'description' => 'This is a description for my Laravel site.',
            'author' => 'John Doe',
            'email' => 'example@example.com',
            'phone' => '123-456-7890',
            'copyright' => '© 2024 Your Company Name',
            'address' => '123 Main Street, Hometown, USA',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

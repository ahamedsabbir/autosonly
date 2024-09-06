<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id')->unsigned()->nullable();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('rating');
            $table->string('review_text');
            $table->timestamps();
        });
        DB::table('reviews')->insert([
            ['car_id' => 1, 'user_id' => 1, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 2, 'user_id' => 1, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 2, 'user_id' => 2, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 3, 'user_id' => 1, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 3, 'user_id' => 2, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 4, 'user_id' => 1, 'rating' => 4, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 4, 'user_id' => 2, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 5, 'user_id' => 1, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 5, 'user_id' => 2, 'rating' => 2, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 6, 'user_id' => 1, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 6, 'user_id' => 2, 'rating' => 2, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 7, 'user_id' => 1, 'rating' => 2, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 7, 'user_id' => 2, 'rating' => 1, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 8, 'user_id' => 1, 'rating' => 1, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 8, 'user_id' => 2, 'rating' => 1, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 9, 'user_id' => 1, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 9, 'user_id' => 2, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 10, 'user_id' => 1, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 10, 'user_id' => 2, 'rating' => 2, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 11, 'user_id' => 1, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 11, 'user_id' => 2, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 12, 'user_id' => 1, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 12, 'user_id' => 2, 'rating' => 4, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 13, 'user_id' => 1, 'rating' => 2, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 13, 'user_id' => 2, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 14, 'user_id' => 1, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 14, 'user_id' => 2, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 15, 'user_id' => 1, 'rating' => 2, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 15, 'user_id' => 2, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 16, 'user_id' => 1, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 16, 'user_id' => 2, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 17, 'user_id' => 1, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 17, 'user_id' => 2, 'rating' => 4, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 18, 'user_id' => 1, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 18, 'user_id' => 2, 'rating' => 1, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 19, 'user_id' => 1, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 19, 'user_id' => 2, 'rating' => 5, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 20, 'user_id' => 1, 'rating' => 3, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
            ['car_id' => 20, 'user_id' => 2, 'rating' => 1, 'review_text' => 'This is a test review.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

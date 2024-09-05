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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
        DB::table('faqs')->insert([
            [
                'title' => 'What is Laravel?',
                'description' => 'Laravel is a web application framework with expressive, elegant syntax. It\'s designed to help you build your application without writing a line of code.,',
            ],
            [
                'title' => 'What is PHP?',
                'description' => 'PHP is a server-side scripting language, and a powerful tool for making dynamic and interactive websites.',
            ],
            [
                'title' => 'What is JavaScript?',
                'description' => 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification.',
            ],
            [
                'title' => 'What is MySQL?',
                'description' => 'MySQL is a relational database management system.',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};

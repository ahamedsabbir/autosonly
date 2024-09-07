<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;

abstract class Controller
{

    public function __construct()
    {
        if (Setting::all()->count() == 0) {
            DB::table('settings')->insert([
                'favicon' => 'default/logo.svg',
                'logo' => 'default/logo.svg',
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
    }
}

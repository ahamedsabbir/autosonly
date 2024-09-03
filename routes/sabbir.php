<?php

use App\Http\Controllers\Web\Backend\SettingController;
use App\Http\Controllers\Web\Frontend\ContactController;
use App\Http\Controllers\Web\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');
});







Route::get('/car', function () {
    return view('frontend.layout.car');	
});
Route::get('/cars', function () {
    return view('frontend.layout.cars');
});
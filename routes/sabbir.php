<?php
use App\Http\Controllers\Web\Frontend\HomeController;



Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('about', [HomeController::class, 'about'])->name('about');



Route::get('/car', function () {
    return view('frontend.layout.car');	
});
Route::get('/cars', function () {
    return view('frontend.layout.cars');
});
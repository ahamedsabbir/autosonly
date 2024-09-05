<?php 
use App\Http\Controllers\Web\Backend\CarController;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\FaqController;



Route::group(['prefix' => 'admin'], function () {
//    Route::get('/',[DashboardController::class,'index'])->name('dashboard'); 
Route::get('/',[DashboardController::class,'index'])->name('admin'); 
Route::resource('admin-faq',FaqController::class)->names('admin-faq');
Route::resource('admin-cars',CarController::class)->names('admin-cars');
});

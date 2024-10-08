<?php 
use App\Http\Controllers\Web\Backend\CarController;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\FaqController;



Route::group(['prefix' => 'admin'], function () {
//    Route::get('/',[DashboardController::class,'index'])->name('dashboard'); 
Route::get('/',[DashboardController::class,'index'])->name('admin'); 
Route::get('/car',[CarController::class,'index'])->name('car'); 
Route::resource('faq',FaqController::class)->names('faq');
});

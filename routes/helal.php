<?php 
use App\Http\Controllers\Web\Backend\CarController;
use App\Http\Controllers\Web\Backend\DashboardController;

// Route::get('/admin',[DashboardController::class,'index'])->name('admin'); 
// Route::get('/car',[CarController::class,'index'])->name('car'); 


// Route::resource('car',CarController::class)->names('car');

Route::group(['prefix' => 'admin'], function () {
//    Route::get('/',[DashboardController::class,'index'])->name('dashboard'); 
Route::get('/',[DashboardController::class,'index'])->name('admin'); 
Route::get('/car',[CarController::class,'index'])->name('car'); 
});

<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\Web\Backend\CmsController;
use App\Http\Controllers\Web\Backend\MailController;
use App\Http\Controllers\Web\Backend\PageController;
use App\Http\Controllers\Web\Backend\SettingController;
use App\Http\Controllers\Web\Frontend\ContactController;
use App\Http\Controllers\Web\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('page/{slug}', [HomeController::class, 'dynamicPages'])->name('page');




Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');

    Route::resource('cms', CmsController::class);
    Route::get('/cms/{id}/status', [CmsController::class, 'statusChange'])->name('cms.status');

    Route::resource('page', PageController::class);

    Route::get('/mail', [MailController::class, 'index'])->name('mail.index');
    Route::put('/mail/update', [MailController::class, 'update'])->name('mail.update');
});







Route::get('/car', function () {
    return view('frontend.layout.car');	
});
Route::get('/cars', function () {
    return view('frontend.layout.cars');
});




#Ajax
Route::prefix('ajax')->group(function(){
    Route::get('/state/{country_id}', [AjaxController::class, 'stateAjax']);
    Route::get('/post/cat', [AjaxController::class, 'postCatAjax']);
});

#Ckeditor
Route::get('ckeditor', [CkeditorController::class, 'index']);
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
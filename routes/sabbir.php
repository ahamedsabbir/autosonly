<?php
Route::get('/home', function () {
    return view('frontend.layout.index');
});
Route::get('/faq', function () {
    return view('frontend.layout.faq');
});
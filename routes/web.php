<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('frontend.default.index');
});
//test router
/*
Route::get('products',[\App\Http\Controllers\TestController::class,'products']);
Route::get('index',[\App\Http\Controllers\TestController::class,'index']);
*/

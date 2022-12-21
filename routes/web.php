<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DefaultController;
//test router
/*
Route::get('products',[\App\Http\Controllers\TestController::class,'products']);
Route::get('index',[\App\Http\Controllers\TestController::class,'index']);
*/
Route::get('bekci/index',[\App\Http\Controllers\Backend\DefaultController::class,'index'])->name('admin.index');
Route::get('/',[DefaultController::class,'index'])->name('index');

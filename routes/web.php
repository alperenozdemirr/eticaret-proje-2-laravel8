<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DefaultController;
//test router
/*
Route::get('products',[\App\Http\Controllers\TestController::class,'products']);
Route::get('index',[\App\Http\Controllers\TestController::class,'index']);
*/
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/welcome',function (){
    return view('welcome');
});

Route::prefix('bekci/')->group(function (){
    Route::get('index',[\App\Http\Controllers\Backend\DefaultController::class,'index'])->name('bekci.index');
    Route::get('user-list',[\App\Http\Controllers\Backend\UserController::class,'lists'])->name('bekci.userList');
    Route::get('user/delete/{id}',[\App\Http\Controllers\Backend\UserController::class,'delete'])->name('bekci.userDelete','id');
    Route::post('user/search',[\App\Http\Controllers\Backend\UserController::class,'search'])->name('bekci.userSearch');
    Route::get('user/detail-code00{id}',[\App\Http\Controllers\Backend\UserController::class,'userDetails'])->name('bekci.userDetail','id');
    Route::post('change-type',[\App\Http\Controllers\Backend\UserController::class,'changeType'])->name('bekci.changeType');
    Route::post('change-status',[\App\Http\Controllers\Backend\UserController::class,'changeStatus'])->name('bekci.changeStatus');

});

Route::get('/',[DefaultController::class,'index'])->name('index');








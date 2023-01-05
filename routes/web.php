<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DefaultController;
use App\Http\Controllers\Frontend\ProductController;
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
Route::get('bekci/login',[\App\Http\Controllers\Backend\DefaultController::class,'loginPage'])->name('bekci.loginPage');
Route::post('bekci/login',[\App\Http\Controllers\Backend\DefaultController::class,'authenticate'])->name('bekci.authenticate');
Route::middleware(['bekci'])->group(function (){
  Route::prefix('bekci/')->group(function (){
      Route::get('logout',[\App\Http\Controllers\Backend\DefaultController::class,'logout'])->name('bekci.logout');
    Route::get('index',[\App\Http\Controllers\Backend\DefaultController::class,'index'])->name('bekci.index');
    Route::get('user-list',[\App\Http\Controllers\Backend\UserController::class,'lists'])->name('bekci.userList');
    Route::get('user/delete/{id}',[\App\Http\Controllers\Backend\UserController::class,'delete'])->name('bekci.userDelete','id');
    Route::post('user/search',[\App\Http\Controllers\Backend\UserController::class,'search'])->name('bekci.userSearch');
    Route::get('user/detail-code00{id}',[\App\Http\Controllers\Backend\UserController::class,'userDetails'])->name('bekci.userDetail','id');
    Route::post('change-type',[\App\Http\Controllers\Backend\UserController::class,'changeType'])->name('bekci.changeType');
    Route::post('change-status',[\App\Http\Controllers\Backend\UserController::class,'changeStatus'])->name('bekci.changeStatus');
    Route::get('category-list',[\App\Http\Controllers\Backend\CategoryController::class,'lists'])->name('bekci.categoryList');
    Route::get('new-category',[\App\Http\Controllers\Backend\CategoryController::class,'addPage'])->name('bekci.newCategoryPage');
    Route::post('new-category',[\App\Http\Controllers\Backend\CategoryController::class,'add'])->name('bekci.newCategory');
    Route::get('category/delete/{id}',[\App\Http\Controllers\Backend\CategoryController::class,'delete'])->name('bekci.categoryDelete','id');
    Route::get('category/update/code00{id}',[\App\Http\Controllers\Backend\CategoryController::class,'updatePage'])->name('bekci.categoryUpdatePage','id');
    Route::post('category-update',[\App\Http\Controllers\Backend\CategoryController::class,'update'])->name('bekci.categoryUpdate');

    Route::get('product-list',[\App\Http\Controllers\Backend\ProductController::class,'lists'])->name('bekci.productList');
    Route::post('product/search',[\App\Http\Controllers\Backend\ProductController::class,'search'])->name('bekci.productSearch');
    Route::get('new-product',[\App\Http\Controllers\Backend\ProductController::class,'addPage'])->name('bekci.productAddPage');
    Route::post('new-product',[\App\Http\Controllers\Backend\ProductController::class,'add'])->name('bekci.productAdd');
    Route::get('product/images/code00{id}',[\App\Http\Controllers\Backend\ProductController::class,'imagesPage'])->name('bekci.productImages','id');
    Route::post('product/images',[\App\Http\Controllers\Backend\ProductController::class,'images'])->name('bekci.productImagesPost');
    Route::get('product/delete/code0{image}-{product}',[\App\Http\Controllers\Backend\ProductController::class,'imageDelete'])->name('bekci.imageDelete',['image','delete']);
    Route::get('product/delete/code00{id}',[\App\Http\Controllers\Backend\ProductController::class,'delete'])->name('bekci.productDelete','id');
    Route::post('product/image/order-change',[\App\Http\Controllers\Backend\ProductController::class,'orderChange'])->name('bekci.imageOrder');
    Route::get('product/update/code00{id}',[\App\Http\Controllers\Backend\ProductController::class,'updatePage'])->name('bekci.productUpdatePage','id');
    Route::post('product/update',[\App\Http\Controllers\Backend\ProductController::class,'update'])->name('bekci.productUpdate');
    Route::get('banner/list',[\App\Http\Controllers\Backend\BannerController::class,'lists'])->name('bekci.bannerList');
    Route::get('banner-new',[\App\Http\Controllers\Backend\BannerController::class,'addPage'])->name('bekci.bannerAddPage');
    Route::post('banner-new',[\App\Http\Controllers\Backend\BannerController::class,'add'])->name('bekci.bannerAdd');
    Route::get('banner/update/code00{id}',[\App\Http\Controllers\Backend\BannerController::class,'updatePage'])->name('bekci.bannerUpdatePage','id');
    Route::post('banner/update',[\App\Http\Controllers\Backend\BannerController::class,'update'])->name('bekci.bannerUpdate');
    Route::get('banner/delete/code00{id}',[\App\Http\Controllers\Backend\BannerController::class,'delete'])->name('bekci.bannerDelete','id');
    Route::get('banner/up/code00{id}',[\App\Http\Controllers\Backend\BannerController::class,'orderUp'])->name('bekci.bannerUp','id');
    Route::get('banner/down/code00{id}',[\App\Http\Controllers\Backend\BannerController::class,'orderDown'])->name('bekci.bannerDown','id');

    Route::get('slider/list',[\App\Http\Controllers\Backend\SliderController::class,'lists'])->name('bekci.sliderList');
    Route::get('slider-new',[\App\Http\Controllers\Backend\SliderController::class,'addPage'])->name('bekci.sliderAddPage');
    Route::post('slider-new',[\App\Http\Controllers\Backend\SliderController::class,'add'])->name('bekci.sliderAdd');
    Route::get('slider/update/code00{id}',[\App\Http\Controllers\Backend\SliderController::class,'updatePage'])->name('bekci.sliderUpdatePage','id');
    Route::post('slider/update',[\App\Http\Controllers\Backend\SliderController::class,'update'])->name('bekci.sliderUpdate');
    Route::get('slider/delete/code00{id}',[\App\Http\Controllers\Backend\SliderController::class,'delete'])->name('bekci.sliderDelete','id');
    Route::get('slider/up/code00{id}',[\App\Http\Controllers\Backend\SliderController::class,'orderUp'])->name('bekci.sliderUp','id');
    Route::get('slider/down/code00{id}',[\App\Http\Controllers\Backend\SliderController::class,'orderDown'])->name('bekci.sliderDown','id');

    });
});//bekci middleware end!
Route::get('product/code00{id}',[ProductController::class,'product'])->name('single.product','id');
Route::get('/',[DefaultController::class,'index'])->name('index');
Route::get('shop',[ProductController::class,'shop'])->name('shop');

Route::get('testFun',[DefaultController::class,'testFun'])->name('testFun');







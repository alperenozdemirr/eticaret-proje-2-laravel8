<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DefaultController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\ProfileController;
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
    Route::get('order/list',[\App\Http\Controllers\Backend\OrderController::class,'list'])->name('bekci.orderList');
    Route::get('order/supply',[\App\Http\Controllers\Backend\OrderController::class,'supply'])->name('bekci.orderSupply');
    Route::get('order/cargo',[\App\Http\Controllers\Backend\OrderController::class,'cargo'])->name('bekci.orderCargo');
    Route::get('order/delivered',[\App\Http\Controllers\Backend\OrderController::class,'delivered'])->name('bekci.orderDelivered');
    Route::post('order/search',[\App\Http\Controllers\Backend\OrderController::class,'search'])->name('bekci.orderSearch');
    Route::get('order/details/code-00{id}',[\App\Http\Controllers\Backend\OrderController::class,'details'])->name('bekci.orderDetails','id');
    Route::post('order/change-status',[\App\Http\Controllers\Backend\OrderController::class,'changeStatus'])->name('bekci.orderChangeStatus');
    Route::get('my/profile',[\App\Http\Controllers\Backend\ProfileController::class,'show'])->name('bekci.profilePage');
    Route::post('my/profile',[\App\Http\Controllers\Backend\ProfileController::class,'changeImage'])->name('bekci.imageChange');
    Route::post('my/password',[\App\Http\Controllers\Backend\ProfileController::class,'changePassword'])->name('bekci.passwordChange');
  });
});//bekci middleware end!
Route::get('user/login',[DefaultController::class,'loginPage'])->name('user.loginPage');
Route::post('user/login',[DefaultController::class,'authenticate'])->name('user.authenticate');
Route::get('user/register',[DefaultController::class,'registerPage'])->name('user.registerPage');
Route::post('user/register',[DefaultController::class,'cacheRegister'])->name('cacheRegister');
Route::get('user/two-confirmation',[DefaultController::class,'confirmationPage'])->name('confirmationPage');
Route::get('user/get-code',[DefaultController::class,'getCode'])->name('getCode');
Route::post('user/two-confirmation',[DefaultController::class,'confirmation'])->name('confirmation');
Route::get('user/logout',[DefaultController::class,'logout'])->name('user.logout');
Route::get('product/code00{id}',[ProductController::class,'product'])->name('single.product','id');
Route::get('/',[DefaultController::class,'index'])->name('index');
Route::get('shop',[ProductController::class,'shop'])->name('shop');
Route::get('search',[ProductController::class,'search'])->name('search');
Route::get('category/code-0{id}',[DefaultController::class,'categoryUrl'])->name('category.url','id');
Route::middleware(['user'])->group(function (){
    Route::get('shopping-cart',[ShoppingCartController::class,'list'])->name('shoppingCart');
    Route::post('basket/add',[ShoppingCartController::class,'add'])->name('basketAdd');
    Route::get('basket/delete{id}',[ShoppingCartController::class,'delete'])->name('basketDelete','id');
    Route::get('basket/count-up{id}',[ShoppingCartController::class,'countUp'])->name('basketCountUp','id');
    Route::get('basket/count-down{id}',[ShoppingCartController::class,'countDown'])->name('basketCountDown','id');
    Route::get('checkout',[OrderController::class,'checkoutPage'])->name('checkoutPage');
    Route::post('checkout',[OrderController::class,'checkout'])->name('checkout');
    Route::get('checkout/payment',[OrderController::class,'paymentPage'])->name('paymentPage');
    Route::get('new-order',[OrderController::class,'newOrder'])->name('newOrder');
    Route::get('account/my-orders',[OrderController::class,'orderPage'])->name('orderPage');
    Route::get('account/my-orders/order-code{id}',[OrderController::class,'details'])->name('orderDetails','id');
    Route::get('account',[AccountController::class,'show'])->name('accountPage');
    Route::post('account',[AccountController::class,'update'])->name('account');
    Route::get('my/profile',[ProfileController::class,'show'])->name('profilePage');
    Route::post('my/password',[ProfileController::class,'changePassword'])->name('passwordChange');
    Route::post('my/image',[ProfileController::class,'changeImage'])->name('imageChange');
});








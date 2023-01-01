<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Products;
use App\Models\Sliders;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index(){
        $sliders=Sliders::orderBy('slider_order')->get();
        $banners=Banners::orderBy('banner_order')->LIMIT(3)->get();
        $products=Products::orderByDesc('id')->LIMIT(5)->get();
        return view('frontend.default.index',['sliders'=>$sliders,'banners'=>$banners,'products'=>$products]);
    }
}

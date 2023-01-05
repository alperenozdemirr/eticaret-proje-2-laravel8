<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(Request $request){
        if ($query=$request->get('category')){
            $min=null;$max=null;
            $products=Products::whereIn('category',$query);
                if($min=$request->get('min') && $max=$request->get('max')){
                    $products= $products->whereBetween('price',[$min,$max])->paginate(9);
                }else{
                    $products=$products->paginate(9);
                }
        }else{
            $products=Products::orderByDesc('id')->paginate(9);
        }
        return view('frontend.shop',['products'=>$products]);
    }
    public function product($id){
        $product=Products::find($id);
        $views=Products::orderByDesc('id')->LIMIT(5)->get();
        return view('frontend.single-product',['product'=>$product,'views'=>$views]);
    }
}

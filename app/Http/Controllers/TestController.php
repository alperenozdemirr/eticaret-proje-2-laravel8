<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImages;
use App\Models\Category;
class TestController extends Controller
{
    public function products(){
        $products= Products::limit(2)->get();
        foreach ($products as $product){
            echo $product->categories->name;
            echo "<br>";
            echo $product->name;
            echo "<br>";
        }
    }
    public function index(){
        $categories=Category::whereNull('category_id')->with('childrenCategories')->get();
        return view('index')->with(compact('categories'));
    }
}

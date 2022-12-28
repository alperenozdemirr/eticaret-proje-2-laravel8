<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\ProductImages;
class ProductController extends Controller
{
    public function lists(){
        $products=Products::paginate(20);
        return view('backend.product-list')->with(compact('products'));
    }
    public function addPage(){
        $categories=Category::all();
        return view('backend.product-new')->with(compact('categories'));
    }
    public function add(Request $request){
        $request->flash();
        $request->validate([
            'name'=>'required',
            'info'=>'required',
            'category'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'images'=>'required',
            'images.*'=>'image|mimes:jpg,jpeg,image,png|max:35000'
        ]);
        $product=new Products();
        $product->name=$request->name;
        $product->category=$request->category;
        $product->info=$request->info;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->save();
        $lastProductId=$product->id;

        $images=[];
        $directory=public_path('public_directory').'/image/products';
        $imageOrder=0;
        if($product){
            if($files= $request->file('images')){
                foreach ($files as $image){
                    $imageName=uniqid().Str::random(4).'.'.$image->getClientOriginalExtension();
                    $images[]=$imageName;
                    $image->move($directory,$imageName);
                }
                foreach ($images as $item){
                    $imageOrder++;
                    $productImage=new ProductImages();
                    $productImage->product_id=$lastProductId;
                    $productImage->image=$item;
                    $productImage->image_order=$imageOrder;
                    $productImage->save();
                }
            }

            return redirect(route('bekci.productList'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }
    public function imagesPage($id){
        $images=ProductImages::where('product_id',$id)->orderBy('image_order')->get();
        $product=Products::find($id);
        return view('backend.product-images',['images'=>$images,'product'=>$product]);
    }
    public function images(Request $request){
        $request->validate([
            'product'=>'required',
            'images'=>'required',
            'images.*'=>'image|mimes:jpg,jpeg,image,png|max:35000'
        ]);
        $images=[];
        $success=false;

        $directory=public_path('public_directory').'/image/products';
        $imageOrderSet=ProductImages::where('product_id',$request->product)->orderByDesc('image_order')->LIMIT(1)->get();
            if ($imageOrderSet->count()==0){
                $imageOrder=0;
            }else{
                $imageOrder=$imageOrderSet[0]->image_order;
            }

        if($files= $request->file('images')){
            foreach ($files as $image){
                $imageName=uniqid().Str::random(4).'.'.$image->getClientOriginalExtension();
                $images[]=$imageName;
                $image->move($directory,$imageName);
            }
            foreach ($images as $item){
                $imageOrder++;
                $productImage=new ProductImages();
                $productImage->product_id=$request->product;
                $productImage->image=$item;
                $productImage->image_order=$imageOrder;
                $productImage->save();
            }
            $success=true;
        }
        if ($success==true){
            return redirect(route('bekci.productImages',$request->product))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    public function imageDelete($image,$product){
        //page işlenmedi
        $image=ProductImages::find($image);
        $image->delete();
        if ($image){
            File::delete(public_path('public_directory').'/image/products/'.$image->image);
            return redirect(route('bekci.productImages',$product))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    public function updatePage($id){
        $product=Products::find($id);
        $categories=Category::all();
        return view('backend.product-update',['product'=>$product,'categories'=>$categories]);
    }
    public function update(Request $request){
        $request->validate([
            'name'=>'required',
            'info'=>'required',
            'price'=>'required',
            'category'=>'required',
            'stock'=>'required'
        ]);
        $product=Products::find($request->id);
        $product->name=$request->name;
        $product->info=$request->info;
        $product->price=$request->price;
        $product->category=$request->category;
        $product->stock=$request->stock;
        $product->save();

            if ($product){
                return redirect(route('bekci.productUpdatePage',$request->id))->with('success','ok');
            }else{
                return back()->with('error','ok');
            }
    }
    public function delete($id){
        $product=Products::find($id);
        $images=ProductImages::where('product_id',$id)->get();
        $product->delete();
        if($product){
            foreach ($images as $image){
                $imageDelete=ProductImages::find($image->id);
                $imageDelete->delete();
                File::delete(public_path('public_directory').'/image/products/'.$image->image);
            }
            return redirect(route('bekci.productList'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    public function orderChange(Request $request){
    $image = ProductImages::find($request->image);
    $image->image_order=$request->order;
    $image->save();
    if ($image){
        return redirect(route('bekci.productImages',$request->product))->with('success','ok');
    }else{
        return back()->with('error','ok');
    }

    }
    public function search(Request $request){
    $search=$request->input('search');
    $products=Products::where('name','LIKE',"%$search%")->paginate(20);
    return view('backend.product-list')->with(compact('products'));
    }
}

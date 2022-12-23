<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function lists(){
        $main_category=Category::whereNull('category_id')->orderBy('category_order')->get();
        $sub_category=Category::whereNotNull('category_id')->orderBy('category_order')->get();
        return view('backend.category-list',
            ['main_category'=>$main_category,'sub_category'=>$sub_category]);
    }
    public function addPage(){
        $categories=Category::all();
        return view('backend.category-new')->with(compact('categories'));
    }
    public function add(Request $request){
        $request->flash();
            $request->validate([
                'name'=>'required'
            ]);
        $category=new Category();
        $category->name=$request->name;
        $category->category_id=$request->sub_category;
        $category->category_order=$request->category_order;
        $category->save();
            if ($category){
                return redirect(route('bekci.newCategoryPage'))->with('success','ok');
            }else{
                return back()->withInput()->with('error','ok');
            }
    }
    public function updatePage($id){
        $category=Category::find($id);
        $category_list=Category::all();
        return view('backend.category-update',['category'=>$category,'category_list'=>$category_list]);
    }
    public function update(Request $request){
        $category=Category::find($request->id);
        $category->name=$request->name;
        $category->category_id=$request->sub_category;
        $category->category_order=$request->category_order;
        $category->save();
        if ($category){
            return redirect(route('bekci.categoryList'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }
    public function delete($id){
        $category=Category::find($id);
        $category->delete();
        if ($category){
            return redirect(route('bekci.categoryList'))->with('success','ok');
        }else{
            return redirect(route('bekci.categoryList'))->with('error','ok');
        }
    }
}

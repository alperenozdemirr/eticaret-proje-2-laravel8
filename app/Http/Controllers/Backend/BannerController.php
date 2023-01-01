<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    // title,info,image,url,banner_order
    public function lists(){
        $banners=Banners::orderBy('banner_order')->get();
        return view('backend.banner-list')->with(compact('banners'));
    }
    public function addPage(){
        return view('backend.banner-new');
    }
    public function add(Request $request){
        $request->flash();
        $directory=public_path('public_directory').'/image/banners';
        $bannerOrderSet=Banners::orderByDesc('banner_order')->LIMIT(1)->get();
        // hata banner order 'da çöz
        if ($bannerOrderSet->count()==0){
            $bannerOrder=0;
        }else{
            $bannerOrder=$bannerOrderSet[0]->banner_order;
        }
        $bannerOrder++;
        if($image = $request->file('image')){
            $imageName=uniqid().Str::random(4).'.'.$image->getClientOriginalExtension();

            $banner=new Banners();
            $banner->title=$request->title;
            $banner->info=$request->info;
            $banner->url=$request->url;
            $banner->banner_order=$bannerOrder;
            $banner->image=$imageName;
            $banner->save();
            if ($banner){
                $image->move($directory,$imageName);
                return redirect(route('bekci.bannerList'))->with('success','ok');
            }else{
                return back()->withInput()->with('error','ok');
            }

        }

    }
    public function updatePage($id){
        $banner=Banners::find($id);
        return view('backend.banner-update')->with(compact('banner'));
    }
    public function update(Request $request){
        $directory=public_path('public_directory').'/image/banners';

        $banner=Banners::find($request->id);
        $cache_img=$banner->image;
        $banner->title=$request->title;
        $banner->info=$request->info;
        $banner->url=$request->url;
        $banner->banner_order=$request->banner_order;
        if ($image= $request->file('image')){
            $imageName=uniqid().Str::random(4).'.'.$image->getClientOriginalExtension();
            $banner->image=$imageName;
        }
        $banner->save();
        if($banner){
            if ($image){
                File::delete($directory.'/'.$cache_img);
                $image->move($directory,$imageName);
            }
            return redirect(route('bekci.bannerList'))->with('success','ok');
        }else{
           return back()->with('error','ok');
        }
    }
    public function delete($id){
        $directory=public_path('public_directory').'/image/banners';
        $banner=Banners::find($id);
        $image=$banner->image;
        $banner->delete();
        if($banner){
            File::delete($directory.'/'.$image);
            return redirect(route('bekci.bannerList'))->with('success','ok');
        }else{
            return redirect(route('bekci.bannerList'))->with('error','ok');
        }
    }
    public function orderUp($id){
        //arttır
        $banner=Banners::find($id);
        $order=$banner->banner_order; $order++;
        $banner->banner_order=$order;
        $banner->save();
        if ($banner){
            return redirect(route('bekci.bannerList'))->with('success','ok');
        }else{
            return redirect(route('bekci.bannerList'))->with('error','ok');
        }
    }
    public function orderDown($id){
        //eksilt
        $banner=Banners::find($id);
        $order=$banner->banner_order;
        if($order>1){
            $order--;
        }
        $banner->banner_order=$order;
        $banner->save();
        if ($banner){
            return redirect(route('bekci.bannerList'))->with('success','ok');
        }else{
            return redirect(route('bekci.bannerList'))->with('error','ok');
        }
    }
}

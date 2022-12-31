<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function lists(){
        $sliders=Sliders::orderBy('slider_order')->get();
        return view('backend.slider-list')->with(compact('sliders'));
    }
    public function addPage(){
        return view('backend.slider-new');
    }
    public function add(Request $request)
    {
        $request->flash();
        $directory = public_path('public_directory') . '/image/sliders';
        $sliderOrderSet = Sliders::orderByDesc('slider_order')->LIMIT(1)->get();
        if ($sliderOrderSet->count() == 0) {
            $sliderOrder = 0;
        } else {
            $sliderOrder = $sliderOrderSet[0]->slider_order;
        }
        $sliderOrder++;
        if ($image = $request->file('image')) {
            $imageName = uniqid() . Str::random(4) . '.' . $image->getClientOriginalExtension();

            $slider = new Sliders();
            $slider->title = $request->title;
            $slider->name = $request->name;
            $slider->url = $request->url;
            $slider->slider_order = $sliderOrder;
            $slider->image = $imageName;
            $slider->save();
            if ($slider) {
                $image->move($directory, $imageName);
                return redirect(route('bekci.sliderList'))->with('success','ok');
            } else {
                return back()->withInput()->with('error', 'ok');
            }
        }
    }
    public function updatePage($id){
        $slider=Sliders::find($id);
        return view('backend.slider-update')->with(compact('slider'));
    }
    public function update(Request $request){
        $directory=public_path('public_directory').'/image/sliders';

        $slider=Sliders::find($request->id);
        $cache_img=$slider->image;
        $slider->title=$request->title;
        $slider->name=$request->name;
        $slider->url=$request->url;
        $slider->slider_order=$request->slider_order;
        if ($image= $request->file('image')){
            $imageName=uniqid().Str::random(4).'.'.$image->getClientOriginalExtension();
            $slider->image=$imageName;
        }
        $slider->save();
        if($slider){
            if ($image){
                File::delete($directory.'/'.$cache_img);
                $image->move($directory,$imageName);
            }
            return redirect(route('bekci.sliderList'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    public function delete($id){
        $directory=public_path('public_directory').'/image/sliders';
        $slider=Sliders::find($id);
        $image=$slider->image;
        $slider->delete();
        if ($slider){
            return redirect(route('bekci.sliderList'))->with('success','ok');
        }else{
            return redirect(route('bekci.sliderList'))->with('error','ok');
        }
    }
    public function orderUp($id){
        //arttır
        $slider=Sliders::find($id);
        $order=$slider->slider_order; $order++;
        $slider->slider_order=$order;
        $slider->save();
        if ($slider){
            return redirect(route('bekci.sliderList'))->with('success','ok');
        }else{
            return redirect(route('bekci.sliderList'))->with('error','ok');
        }
    }
    public function orderDown($id){
        //eksilt
        $slider=Sliders::find($id);
        $order=$slider->slider_order;
        if($order>1){
            $order--;
        }
        $slider->slider_order=$order;
        $slider->save();
        if ($slider){
            return redirect(route('bekci.sliderList'))->with('success','ok');
        }else{
            return redirect(route('bekci.sliderList'))->with('error','ok');
        }
    }

}

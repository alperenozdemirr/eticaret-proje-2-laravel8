<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Baskets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    //id,user_id,product_id,product_count;
    //burada kullanıcı auth yapmadığımı farkettim
    public $userid=1;
    public function list(){
        $baskets=Baskets::where('user_id',Auth::user()->id)->get();
        $total=0;
        foreach ($baskets as $basket){
            $total+=$basket->products->price*$basket->product_count;
        }
        return view('frontend.shopping-cart',['baskets'=>$baskets,'total'=>$total]);
    }
    public function add(Request $request){
        $basket=new Baskets();
        $basket->user_id=Auth::user()->id;
        $basket->product_id=$request->product_id;
        $basket->product_count=$request->count;
        $basket->save();
        if ($basket){
            return redirect(route('shoppingCart'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    public function delete($id){
        $basket=Baskets::find($id);
        $basket->delete();
        if ($basket){
            return redirect(route('shoppingCart'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    public function countUp($id){
        $basket=Baskets::find($id);
        $count=$basket->product_count;
        $basket->product_count=$count+1;
        $basket->save();
        if ($basket){
            return redirect(route('shoppingCart'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    public function countDown($id){
        $basket=Baskets::find($id);
        if ($basket->product_count!=1){
            $count=$basket->product_count;
            $basket->product_count=$count-1;
        }else{
            $basket->delete();
        }
        $basket->save();
        if ($basket){
            return redirect(route('shoppingCart'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
}

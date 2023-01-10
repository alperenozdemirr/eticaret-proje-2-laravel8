<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Baskets;
use App\Models\Cities;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
public function checkoutPage(){
    $orders=Baskets::where('user_id',Auth::user()->id)->get();
    if ($orders->count()==0){
        return redirect(route('shop'))->with('redirect','sipariş oluşturabilmek için en az bir ürün gereklidir');
    }
    $cities=Cities::all();
    $user=User::find(Auth::user()->id);

    $total=0;
    foreach ($orders as $basket){
        $total+=$basket->products->price*$basket->product_count;
    }
    return view('frontend.checkout',
        ['user'=>$user,'cities'=>$cities,'total'=>$total,'orders'=>$orders]);
}

public function checkout(Request $request){
    $request->validate([
        'name'=>'required',
        'phone'=>'required',
        'address'=>'required',
        'posta_code'=>'required',
        'city'=>'required'
    ]);
    $account=User::find(Auth::user()->id);
    $account->name=$request->name;
    $account->phone=$request->phone;
    $account->address=$request->address;
    $account->posta_code=$request->posta_code;
    $account->city=$request->city;
    $account->save();
    if ($account){
        return redirect(route('paymentPage'));
    }
}
    public function paymentPage(){
        $baskets=Baskets::where('user_id',Auth::user()->id)->get();
        if ($baskets->count()==0){
            return redirect(route('shop'))->with('redirect','sipariş oluşturabilmek için en az bir ürün gereklidir');
        }
        return view('frontend.payment');
    }
}

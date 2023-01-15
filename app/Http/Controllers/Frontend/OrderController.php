<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\NewOrderMailJob;
use App\Mail\NewOrderMail;
use App\Models\Baskets;
use App\Models\Cities;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
    //order_table = user_id,product_total_count,total_price,order_status
    public function newOrder(){
    //sipariş ekle
        $baskets=Baskets::where('user_id',Auth::user()->id)->get();
        $total_price=0;
        $product_count=0;
        foreach ($baskets as $basket){
            if ($basket->products->stock==0){ return redirect(route('shoppingCart')); }
            $total_price+=$basket->products->price*$basket->product_count;
            $product_count=$basket->product_count;
        }
        $status=1;//tedarik başlangıç
        $order=new Orders();
        $order->user_id=Auth::user()->id;
        $order->product_total_count=$product_count;
        $order->total_price=$total_price;
        $order->order_status=$status;
        $order->save();
        $lastId=$order->id;//hata time'da
        $last_time=$order->created_at;
        $email=Auth::user()->email;
        if($order){//order_details_table = order_id,product_id,product_price,product_count
            foreach ($baskets as $basket){
                $orderDetails=new OrderDetails();
                $orderDetails->order_id=$lastId;
                $orderDetails->product_id=$basket->product_id;
                $orderDetails->product_price=$basket->products->price*$basket->product_count;
                $orderDetails->product_count=$basket->product_count;
                //stok kontrol
                $stock=Products::find($basket->product_id);
                if($stock->stock - $basket->product_count > 0){
                    $orderDetails->save();
                    $stock->stock=$stock->stock - $basket->product_count;
                    $stock->save();
                }
            }
            //E-fatura mail gönder..
            //mail_varible name,time,code,totalCount,totalPrice
            $data['name']=Auth::user()->name;$data['time']=$last_time;$data['code']=$lastId;
            $data['totalCount']=$product_count;$data['totalPrice']=$total_price;
            dispatch(new NewOrderMailJob($data,$email));
            Baskets::where('user_id',Auth::user()->id)->delete();
            return redirect(route('orderPage'));
        }else{
                return back();
        }
    }
    public function orderPage(){
        Carbon::setLocale('tr');
        $supply_orders=Orders::where('user_id',Auth::user()->id)->where('order_status',1)->get();
        $cargo_orders=Orders::where('user_id',Auth::user()->id)->where('order_status',2)->get();
        $delivered_orders=Orders::where('user_id',Auth::user()->id)->where('order_status',3)->get();
        return view('frontend.my-orders',
                ['supply_orders'=>$supply_orders,
                'cargo_orders'=>$cargo_orders,
                'delivered_orders'=>$delivered_orders
                ]);
    }
    public function details($id){
        $status=Orders::find($id)->order_status;
        $orders=OrderDetails::where('order_id',$id)->get();
        return view('frontend.order-details',['orders'=>$orders,'status'=>$status]);
    }
}

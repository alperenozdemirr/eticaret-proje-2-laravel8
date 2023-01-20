<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\OrderCargoMailJob;
use App\Mail\OrderCargoMail;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function list(){
        Carbon::setLocale('tr');
        $orders=Orders::orderByDesc('id')->paginate(15);
        return view('backend.order-all',['orders'=>$orders]);
    }
    public function supply(){
        Carbon::setLocale('tr');
        $orders=Orders::where('order_status',1)->orderByDesc('id')->paginate(15);
        return view('backend.order-supply',['orders'=>$orders]);
    }
    public function cargo(){
        Carbon::setLocale('tr');
        $orders=Orders::where('order_status',2)->orderByDesc('id')->paginate(15);
        return view('backend.order-cargo',['orders'=>$orders]);
    }
    public function delivered(){
        Carbon::setLocale('tr');
        $orders=Orders::where('order_status',3)->orderByDesc('id')->paginate(15);
        return view('backend.order-delivered',['orders'=>$orders]);
    }
    public function details($id){
        $orders=OrderDetails::where('order_id',$id)->get();
        $detail=Orders::where('id',$id)->first();
        $user=User::find($detail->user_id);
        return view('backend.order-detail',['orders'=>$orders,'user'=>$user,'detail'=>$detail]);
    }
    public function changeStatus(Request $request){
        $value=$request->status;
        $order=Orders::find($request->id);
        $order->order_status=$value;
        $order->save();
        $user=User::find($order->user_id);
        $data['name']=$user->name;
        $data['time']=$order->created_at;
        $data['code']=$order->id;
        $email=$user->email;
        if($order){
            if ($value==2){
                //mail value = name,time,code
                dispatch(new OrderCargoMailJob($data,$email));
            }
            return redirect(route('bekci.orderList'))->with('success','ok');
        }else{
            return back()->with('error','ok');
        }
    }
    public function search(Request $request){
        Carbon::setLocale('tr');
        $search=$request->input('search');
        $users=User::where('name','LIKE',"%$search%")->get('id');
        //ilişkili oldugundan dolayı bu şekilde çozum buldum..
        $orders=Orders::orderByDesc('id')->whereIn('user_id',$users)->paginate(5);
        return view('backend.order-all',['orders'=>$orders]);
    }
}

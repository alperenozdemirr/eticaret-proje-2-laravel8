<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Baskets;
use App\Models\Orders;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(){
        $date=Carbon::today()->subDays(30);
        $totalOrder=Orders::where('order_status',1)->count();
        $basketCount=Baskets::groupBy('user_id')->count();
        $totalPrice=Orders::where('created_at','>=',$date)->sum('total_price');
        $totalUser=User::all()->count();
        return view('backend.default.index',
                ['totalOrder'=>$totalOrder,'basketCount'=>$basketCount,'totalPrice'=>$totalPrice,'totalUser'=>$totalUser]);
    }
    public function loginPage(){
        return view('backend.default.login');
    }
    public function authenticate(Request $request){
        //remember_me,email,password
        $request->flash();
        $request->only('email','password','remember_me');
        $email=$request->email;
        $password=$request->password;
        $type=5;
        $status=1;
        $remember_me=$request->has('remember_me') ? true :false;
        if (Auth::attempt(['email'=>$email,'password'=>$password,'type'=>$type,'status'=>$status],$remember_me)){
            return redirect(route('bekci.index'))->with('login','success');
        }else{
            return back()->withInput()->with('error','Geçersiz Bilgiler Lütfen Tekrar Deneyiniz!');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(route('bekci.loginPage'))->with('logout','Güvenli Çıkış Sağlandı');
    }
}

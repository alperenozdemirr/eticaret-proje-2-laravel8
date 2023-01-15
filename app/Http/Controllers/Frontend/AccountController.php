<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function show(){
        $cities=Cities::all();
        $user=User::find(Auth::user()->id);
        return view('frontend.account',['cities'=>$cities,'user'=>$user]);
    }
    public function update(Request $request){
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
        if($account){
            return redirect(route('accountPage'))->with('success','ok');
        }else{
            return back();
        }
    }
}

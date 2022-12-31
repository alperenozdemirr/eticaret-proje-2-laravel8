<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(){
        return view('backend.default.index');
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
        $remember_me=$request->has('remember_me') ? true :false;
        if (Auth::attempt(['email'=>$email,'password'=>$password,'type'=>$type],$remember_me)){
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

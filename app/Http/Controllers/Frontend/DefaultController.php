<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\ConfirmationMailJob;
use App\Jobs\NewUserMailJob;
use App\Mail\ConfirmationMail;
use App\Models\Banners;
use App\Models\Baskets;
use App\Models\Products;
use App\Models\Sliders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DefaultController extends Controller
{
    public function index(Request $request){
        $sliders=Sliders::orderBy('slider_order')->get();
        $banners=Banners::orderBy('banner_order')->LIMIT(3)->get();
        $products=Products::orderByDesc('id')->LIMIT(5)->get();
        return view('frontend.default.index',['sliders'=>$sliders,'banners'=>$banners,'products'=>$products]);
    }
    public function loginPage(){
        return view('frontend.default.login');
    }
    public function registerPage(){
        return view('frontend.default.register');
    }
    public function authenticate(Request $request){
        $request->flash();
        $request->only('email','password','remember_me');
        $email= $request->email;
        $password= $request->password;
        $type=1;
        $status=1;
        $remember_me=$request->has('remember_me') ? true : false;
        if (Auth::attempt(['email'=>$email,'password'=>$password,'type'=>$type,'status'=>$status],$remember_me)){
            return redirect()->intended(route('index'));
        }else{
            return back()->withInput();
        }
    }
    public function cacheRegister(Request $request){
        //register page'den gelen kullanıcı bilgilerini session'a alır code onaylana kadar bekletilir..
        //hata olursa session forget işle
        $request->flash();
        $request->validate([
            'name'=>'required|min:5|max:255',
            'email'=>'email',
            'password'=>'min:8|max:255|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword'=>'min:8'
        ]);
        session(['name'=>$request->name]);
        session(['email'=>$request->email]);
        session(['password'=>$request->password]);
        return redirect(route('confirmationPage'));
    }
    public function confirmationPage(){
    return view('frontend.default.confirmation');
    }
    public function confirmation(Request $request){
        $code=$request->code;
        if (session()->get('randomCode')==$code){
            $user=new User();
            $user->name=session()->get('name');
            $user->email=session()->get('email');
            $user->password=bcrypt(session()->get('password'));
            $user->type=1;
            $user->status=1;
            $user->save();
            if($user){
                $name=session()->get('name');
                $email=session()->get('email');
                dispatch(new NewUserMailJob($name,$email));
                //Mail::to(session()->get('email'))->send(new newUser());
                session()->flush();//tüm session sil
                return redirect(route('user.loginPage'))->with('user.register','Başarıyla Üye Oldunuz Şimdi Giriş Yapabilirsiniz');
            }else{
                return redirect(route('user.registerPage'));
            }
        }else{
            return redirect(route('user.registerPage'));
        }
    }
    public function getCode(){
        session(['randomCode'=>rand(111111,999999)]);
        $data['name']=session()->get('name');
        $email=session()->get('email');
        $code=session()->get('randomCode');
        dispatch(new ConfirmationMailJob($data,$email,$code));
        //Mail::to(session()->get('email'))->send(new ConfirmationMail($data));
        return redirect(route('confirmationPage'));
    }
    public function logout(){
        Auth::logout();
        return redirect(route('user.loginPage'))->with('logout','Güvenli Çıkış Sağlandı');
    }
    public function basketCount(){
        $count=null;
        if(Auth::user()){
            $count = Baskets::where('user_id',Auth::user()->id)->count();
        }else{
            $count=0;
        }
        return $count;
    }
    public function categoryUrl($id){
            $products=Products::where('category',$id)->paginate(9);
            $activeCheck[]=null;
            if($products->count()!=0){
                return view('frontend.shop',['products'=>$products,'activeCheck'=>$activeCheck]);
            }else{
                return back()->with('null','ok');
            }

    }
}

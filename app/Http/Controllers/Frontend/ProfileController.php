<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function show(){
        return view('frontend.profile');
    }
    public function changePassword(Request $request){
        $request->flash();
        $request->validate([
            'oldPassword'=>'required',
            'newPassword'=>'min:8|max:255|required_with:confirmPasword|same:confirmPassword',
            'confirmPassword'=>'min:8|max:255|required'
        ]);
        $userID=Auth::user()->id;
        $user=User::find($userID);
        $newPassword=bcrypt($request->newPassword);
        if(Hash::check($request->oldPassword,$user->password)){
            $user->password=$newPassword;
            $user->save();
            return redirect(route('profilePage'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }
    public function changeImage(Request $request){
        $request->validate([
           'image'=>'required|image|mimes:jpg,jpeg,image,png|max:12096'
        ]);
        $directory=public_path('public_directory').'/image/users';
        $userID=Auth::user()->id;
        $user=User::find($userID);
        $cache_img=$user->image;
        $image=$request->file('image');
        $imageName=uniqid().Str::random(4).'.'.$image->getClientOriginalExtension();
        $user->image=$imageName;
        $user->save();
        if($user){
            File::delete($directory.'/'.$cache_img);
            $image->move($directory,$imageName);
            return redirect(route('profilePage'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }
}

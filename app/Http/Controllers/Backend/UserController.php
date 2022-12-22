<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function lists(){
        $users=User::paginate(20);
        return view('backend.user-list',['users'=>$users]);
    }
    public function userDetails($id){
        $user=User::find($id);
        return view('backend.user-detail',['user'=>$user]);
    }
    public function delete($id){
        $user=User::find($id);
        $user->delete();
        if ($user){
            return redirect(route('bekci.userList'))->with('success','ok');
        }else{
            return redirect(route('bekci.userList'))->with('error','ok');
        }
    }

    public function changeType(Request $request){
            $user=User::find($request->id);
            $user->type=$request->type;
            $user->save();
            if ($user){
                return redirect(route('bekci.userList'))->with('success','ok');
            }else{
                return redirect(route('bekci.userList'))->with('error','ok');
            }
    }
    public function changeStatus(Request $request){
        $user=User::find($request->id);
        $user->status=$request->status;
        $user->save();
        if ($user){
            return redirect(route('bekci.userList'))->with('success','ok');
        }else{
            return redirect(route('bekci.userList'))->with('error','ok');
        }
    }
    public function search(Request $request){
        $search=$request->input('search');
        $users=User::where('name','LIKE',"%$search%")->paginate(20);
        return view('backend.user-list',['users'=>$users]);
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function Login(UserRequest $request){
        if($request->isMethod('post')){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->route('route_khoa_hoc_list');
            }else{
              Session::flash('error','sai mk hoặc email');
                return redirect()->route('login');
            }
        }
        return view('auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function sign_up(UserRequest $request){
        if ($request->isMethod('POST')) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =password_hash($request->password,PASSWORD_DEFAULT);
            $user->save();
            return redirect()->route('login');
            // dd($request->except('_token'));
            // $user= User::create($request->except('_token'));
            // if ($user->id) {
            //     Session::flash('success', 'Thêm mới thành công');
            //     return redirect()->route('sign_up');
            // }
        }
        return view('auth.sign_up');
    }
}

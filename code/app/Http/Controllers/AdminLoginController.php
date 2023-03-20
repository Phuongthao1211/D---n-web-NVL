<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login(){
        return view('admins.login');
    }
    public function loginPost(AdminLoginRequest $request){
        $remember = $request->has('remember_me') ? true:false;
        if (Auth::guard('admin')->attempt([
            'email' =>$request->email,
            'password' => $request->password,
        ],$remember)){
            if(Auth::guard('admin')->user()->loaitaikhoan==2){
                Auth::guard('admin')->logout();
                $message = "Tài khoản này không phải quản trị viên";
                return view('admins.login',compact('message'));
            }
            if(Auth::guard('admin')->user()->active==0){
                Auth::guard('admin')->logout();
                $message = "Tài khoản này đã bị vô hiệu hóa";
                return view('admins.login',compact('message'));
            }
            return redirect()->route('admin.dashboard.index');
        } else {
            $message = "Email hoặc tài khoản sai";
            return view('admins.login',compact('message'));
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatKhauRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTaiKhoanController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index(){
        return view('admins.taikhoan.index');
    }
    public function update(Request $request){
        $this->user->find(auth()->guard('admin')->user()->id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
        ]);
        return redirect()->route('admintaikhoan.index')->with('jsAlert', 'Thay đổi thông tin thành công!');
    }
    public function re_pass(){
        return view('admins.taikhoan.re_password');
    }
    public function re_passPost(MatKhauRequest $request){
        if (Hash::check($request->password_old,auth()->user()->getAuthPassword())){
            $this->user->find(auth()->user()->id)->update([
                'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('admintaikhoan.index')->with('jsAlert', 'Thay đổi mật khẩu thành công!');
        } else {
            $message = "Mật khẩu cũ không đúng";
            return view('admins.taikhoan.re_password',compact('message'));
        }
    }
}

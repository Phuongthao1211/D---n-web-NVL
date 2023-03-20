<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatKhauRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class TaiKhoanController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index(){
        return view('users.taikhoan.index');
    }
    public function edit(){
        $edit_info_user = view('users.taikhoan.partials.edit')->render();
        return response()->json([
            'edit_info'=>$edit_info_user,
            'code'=>200,
        ],200);
    }
    public function update(Request $request){
        $this->user->find(auth()->user()->id)->update([
            'name'=>$request->hoten,
            'phone'=>$request->phone,
        ]);
        return redirect()->route('taikhoan.index');
    }
    public function re_pass(){
        return view('users.taikhoan.re_pass');
    }
    public function re_passPost(MatKhauRequest $request){
        if (Hash::check($request->password_old,auth()->user()->getAuthPassword())){
            $this->user->find(auth()->user()->id)->update([
                'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('taikhoan.index')->with('jsAlert', 'Thay đổi mật khẩu thành công!');
        } else {
            $message = "Mật khẩu cũ không đúng";
            return view('users.taikhoan.re_pass',compact('message'));
        }
    }
}

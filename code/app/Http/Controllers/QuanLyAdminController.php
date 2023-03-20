<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class QuanLyAdminController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(){
        Paginator::useBootstrap();
        $users = $this->user->whereIn('loaitaikhoan',[1,3])->paginate(10);
        return view('admins.admin.index',compact('users'));
    }

    public function active(Request $request){
        if (auth()->guard('admin')->user()->loaitaikhoan == 1){
            $user = $this->user->find($request->id);
            if ($user->active==1){
                $user->update([
                    'active'=>0,
                ]);
            }  else{
                $user->update([
                    'active'=>1,
                ]);
            }
        }
        return response()->json([
            'code'=>200,
        ],200);
    }

    public function add(){
        return view('admins.admin.add');
    }

    public function addPost(AdminRegisterRequest $request){
        try {
            DB::beginTransaction();
            $user =$this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'loaitaikhoan'=>$request->loaitaikhoan,
                'active'=>1,
            ]);
            DB::commit();
            return redirect()->route('admins.admin.index');
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message' . $exception->getMessage() . 'Line : ' . $exception->getLine());
            $message = "Email đã tồn tại";
            return view('admins.admin.add',compact('message'));
        }
    }
}

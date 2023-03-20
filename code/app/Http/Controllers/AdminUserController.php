<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminUserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(){
        Paginator::useBootstrap();
        $users = $this->user->where('loaitaikhoan',2)->paginate(10);
        return view('admins.user.index',compact('users'));
    }

    public function active(Request $request){
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
        return response()->json([
            'code'=>200,
        ],200);
    }
}

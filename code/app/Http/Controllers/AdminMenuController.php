<?php

namespace App\Http\Controllers;

use App\Models\hangsanxuat;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminMenuController extends Controller
{
    use DeleteModelTrait;
    private $hangsanxuat;
    public function __construct(hangsanxuat $hangsanxuat)
    {
        $this->hangsanxuat=$hangsanxuat;
    }

    public function index(){
        Paginator::useBootstrap();
        $menus = $this->hangsanxuat->paginate(10);
        return view('admins.menu.index',compact('menus'));
    }

    public function create(){
        return view('admins.menu.add');
    }

    public function store(Request $request){
        $this->hangsanxuat->create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect()->route('menu.index');
    }

    public function edit($id){
        $menu = $this->hangsanxuat->find($id);
        return view('admins.menu.edit',compact('menu'));
    }

    public function update($id,Request $request){
        $this->hangsanxuat->find($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect()->route('menu.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id,$this->hangsanxuat);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    use DeleteModelTrait;
    private $danhmuc;
    public function __construct(danhmuc $danhmuc)
    {
        $this->danhmuc = $danhmuc;
    }

    public function index(){
        Paginator::useBootstrap();
        $danhmucs = $this->danhmuc->paginate(10);
        return view('admins.danhmuc.index',compact('danhmucs'));
    }

    public function create(){
        return view('admins.danhmuc.add');
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $this->danhmuc->create([
                'name'=>$request->name,
                'description'=>$request->description,
            ]);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
        }
        return redirect()->route('categories.index');
    }

    public function edit($id){
        $danhmuc = $this->danhmuc->find($id);
        return view('admins.danhmuc.edit',compact('danhmuc'));
    }

    public function update($id,Request $request){
        try {
            DB::beginTransaction();
            $this->danhmuc->find($id)->update([
                'name'=>$request->name,
                'description'=>$request->description,
            ]);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
        }
        return redirect()->route('categories.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id,$this->danhmuc);
    }

}

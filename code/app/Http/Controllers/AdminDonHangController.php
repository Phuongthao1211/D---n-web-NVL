<?php

namespace App\Http\Controllers;

use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminDonHangController extends Controller
{
    private $donhang;
    private $sanpham;
    private $chitietdonhang;
    public function __construct(donhang $donhang,sanpham $sanpham,chitietdonhang $chitietdonhang)
    {
        $this->donhang = $donhang;
        $this->sanpham = $sanpham;
        $this->chitietdonhang = $chitietdonhang;
    }

    public function choduyet(){
        Paginator::useBootstrap();
        $donhang = $this->donhang->where('active',1)->paginate(10);
        return view('admins.donhang.choduyet',compact('donhang'));
    }
    public function danggiao(){
        Paginator::useBootstrap();
        $donhang = $this->donhang->where('active',2)->paginate(10);
        return view('admins.donhang.danggiao',compact('donhang'));
    }
    public function dagiao(){
        Paginator::useBootstrap();
        $donhang = $this->donhang->where('active',3)->paginate(10);
        return view('admins.donhang.dagiao',compact('donhang'));
    }
    public function huy(){
        Paginator::useBootstrap();
        $donhang = $this->donhang->where('active',0)->paginate(10);
        return view('admins.donhang.huy',compact('donhang'));
    }
    public function view($id){
        $donhang = $this->donhang->find($id);
        if (isset($donhang))
        {
            $chitietdonhang = $donhang->chitietdonhang;
            return view('admins.donhang.view', compact('donhang', 'chitietdonhang'));
        }
        return redirect()->route('admins.donhang.choduyet');
    }
    public function huydon(Request $request){
        Paginator::useBootstrap();
        $donhang = $this->donhang->find($request->id);
        $ctdh = $this->chitietdonhang->where("donhang_id",$request->id)->get();
        foreach ($ctdh as $item){
            $sanpham = $this->sanpham->find($item->sanpham_id);
            $this->sanpham->find($item->sanpham_id)->update([
                'soluong'=> $sanpham->soluong + $item->soluong,
            ]);
        }
        $donhang->update([
           'active'=>0,
        ]);
        $chitietdonhang = $donhang->chitietdonhang;
        $partials_view = view('admins.donhang.partials.partials_view',compact('donhang','chitietdonhang'))->render();
        $donhang = $this->donhang->where('active',$request->dh)->paginate(10);
        $table_donhang = view('admins.donhang.partials.table_donhang',compact('donhang'))->render();
        return response()->json([
           'code'=>200,
            'partials_view'=>$partials_view,
            'table_donhang'=>$table_donhang,
        ]);
    }
    public function duyetdon(Request $request){
        Paginator::useBootstrap();
        $donhang = $this->donhang->find($request->id);
        $donhang->update([
            'active'=>2,
        ]);
        $chitietdonhang = $donhang->chitietdonhang;
        $partials_view = view('admins.donhang.partials.partials_view',compact('donhang','chitietdonhang'))->render();
        $donhang = $this->donhang->where('active',$request->dh)->paginate(10);
        $table_donhang = view('admins.donhang.partials.table_donhang',compact('donhang'))->render();
        return response()->json([
            'code'=>200,
            'partials_view'=>$partials_view,
            'table_donhang'=>$table_donhang,
        ]);
    }
    public function xacnhandon(Request $request){
        Paginator::useBootstrap();
        $donhang = $this->donhang->find($request->id);
        $donhang->update([
            'active'=>3,
        ]);
        $chitietdonhang = $donhang->chitietdonhang;
        $partials_view = view('admins.donhang.partials.partials_view',compact('donhang','chitietdonhang'))->render();
        $donhang = $this->donhang->where('active',$request->dh)->paginate(10);
        $table_donhang = view('admins.donhang.partials.table_donhang',compact('donhang'))->render();
        return response()->json([
            'code'=>200,
            'partials_view'=>$partials_view,
            'table_donhang'=>$table_donhang,
        ]);
    }
}

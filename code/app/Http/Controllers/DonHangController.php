<?php

namespace App\Http\Controllers;

use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\sanpham;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    private $donhang;
    private $chitietdonhang;
    private $sanpham;
    public function __construct(donhang $donhang,chitietdonhang $chitietdonhang,sanpham $sanpham)
    {
        $this->chitietdonhang = $chitietdonhang;
        $this->donhang = $donhang;
        $this->sanpham = $sanpham;
    }
    public function index(){
        $donhangchoduyet = $this->donhang->where('user_id',auth()->user()->id)->where('active',1)->get();
        $donhangdanggiao = $this->donhang->where('user_id',auth()->user()->id)->where('active',2)->get();
        $donhangdagiao = $this->donhang->where('user_id',auth()->user()->id)->where('active',3)->get();
        $donhanghuy = $this->donhang->where('user_id',auth()->user()->id)->where('active',0)->get();
        return view('users.donhang.index',compact('donhangchoduyet','donhangdanggiao','donhangdagiao','donhanghuy'));
    }
    public function delete($id){
        $donhang = $this->donhang->find($id);
        if ($donhang->active==1){
            if($donhang->user_id==auth()->user()->id){
                $ctdh = $this->chitietdonhang->where("donhang_id",$id)->get();
                foreach ($ctdh as $item){
                    $sanpham = $this->sanpham->find($item->sanpham_id);
                    $this->sanpham->find($item->sanpham_id)->update([
                       'soluong'=> $sanpham->soluong + $item->soluong,
                    ]);
                }
                $donhang->update([
                    'active'=>0,
                ]);
            }
            return redirect()->route('donhang.index');
        }
        return redirect()->route('donhang.index');
    }
    public function view($id){
        $donhang = $this->donhang->find($id);
        if (isset($donhang)){
            if($donhang->user_id==auth()->user()->id){
                $chitietdonhang = $donhang->chitietdonhang;
                return view('users.donhang.view',compact('donhang','chitietdonhang'));
            }
            return redirect()->route('donhang.index');
        }
        return redirect()->route('donhang.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\chitietkhuyenmai;
use App\Models\danhgia;
use App\Models\danhmuc;
use App\Models\hangsanxuat;
use App\Models\khuyenmai;
use App\Models\sanpham;
use App\Traits\UpdateKhuyenMai;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    use UpdateKhuyenMai;
    private $sanpham;
    private $danhmuc;
    private $hangsanxuat;
    private $chitietkhuyenmai;
    private $khuyenmai;
    private $danhgia;
    public function __construct(sanpham $sanpham,danhmuc $danhmuc,hangsanxuat $hangsanxuat,
        chitietkhuyenmai $chitietkhuyenmai,khuyenmai $khuyenmai,danhgia $danhgia)
    {
        $this->sanpham = $sanpham;
        $this->danhmuc = $danhmuc;
        $this->hangsanxuat = $hangsanxuat;
        $this->chitietkhuyenmai = $chitietkhuyenmai;
        $this->khuyenmai = $khuyenmai;
        $this->danhgia = $danhgia;
    }
    public function index(){
        Paginator::useBootstrap();
        $sanphams = $this->sanpham->where('active',1)->latest()->paginate(9);
        return view('users.sanpham.index',compact('sanphams'));
    }
    public function chitiet($id){
        $sanpham = $this->sanpham->find($id);
        $view = $sanpham->view;
        $sanpham->update([
            'view'=>$sanpham->view+1
        ]);
        $binhluans = $this->danhgia->where('sanpham_id',$id)->latest()->get();
        return view('users.sanpham.chitiet',compact('sanpham','binhluans'));
    }
    public function danhmuc($id){
        Paginator::useBootstrap();
        $sanphams = $this->sanpham->where("category_id",$id)->latest()->paginate(9);
        $danhmuc = $this->danhmuc->find($id)->name;
        return view('users.sanpham.sanpham_danhmuc',compact('sanphams','danhmuc'));
    }
    public function hangsanxuat($danhmuc,$id){
        Paginator::useBootstrap();
        $sanphams = $this->sanpham->where("category_id",$danhmuc)->where('menu_id',$id)->latest()->paginate(9);
        $hangsanxuat = $this->danhmuc->find($danhmuc)->name .' : '. $this->hangsanxuat->find($id)->name;
        return view('users.sanpham.sanpham_hangsanxuat',compact('sanphams','hangsanxuat'));
    }
    public function khuyenmai(){
        Paginator::useBootstrap();
        $sanphams = $this->chitietkhuyenmai->where('active',1)->latest()->paginate(9);
        return view('users.sanpham.khuyenmai',compact('sanphams'));
    }
    public function timkiem(Request $request){
        Paginator::useBootstrap();
        $search = $request->searchsp;
        $id_danhmuc = 0;
        $id_menu = 0;
        $sp = $this->sanpham->where('active',1);
        $danhmuc = $this->danhmuc->where('name','like','%'.$search.'%')->first();
        $hangsanxuat = $this->hangsanxuat->where('name','like','%'.$search.'%')->first();
        if (!empty($danhmuc)) $id_danhmuc=$danhmuc->id;
        if (!empty($hangsanxuat)) $id_menu=$hangsanxuat->id;
        $sanphams = $sp->where('tensp','like','%'.$search.'%')
            ->orwhere('category_id',$id_danhmuc)
            ->orWhere('menu_id',$id_menu)
            ->latest()->paginate(9);
        $search = 'Tìm kiếm '." : ".$search;
        return view('users.sanpham.timkiem',compact('sanphams','search'));
    }
}

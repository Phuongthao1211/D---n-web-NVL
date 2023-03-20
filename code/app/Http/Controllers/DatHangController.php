<?php

namespace App\Http\Controllers;

use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Diff\Exception;

class DatHangController extends Controller
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
    public function dathang(){
        $carts = session()->get('cart');
        if (empty($carts)){
            return redirect()->route('giohang.index');
        }
        session()->put('donhang',$carts);
        $hoadon = session()->get('donhang');
        $tongtien = 0;
        foreach ($hoadon as $item){
            $tongtien += $item['dongia'];
        }
        return view('users.dathang.index',compact('hoadon','tongtien'));
    }
    public function dathangpost(Request $request){
        /*
         * trạng thái 1 : đơn hàng chờ duyệt
         * trạng thái 2 : đơn hàng đã duyệt - chờ giao
         * trạng thái 3 : đơn hàng đã giao
         * trạng thái 0 : đơn hàng đã hủy
         * */
        try {
            $donhang = session()->get('donhang');
            if (empty($donhang)){
                return redirect()->route('giohang.index');
            }
            DB::beginTransaction();
            $diachi = $request->diachi . ", ".$request->phuong . ", ".$request->quan. ", ".$request->thanhpho;
            $donang = $this->donhang->create([
                'diachi'=>$diachi,
                'user_id'=>auth()->user()->id,
                'phone'=>$request->phone,
                'ghichu'=>$request->ghichu,
            ]);
            foreach ($donhang as $id=>$item){
                $this->chitietdonhang->create([
                    'donhang_id'=>$donang->id,
                    'sanpham_id'=>$id,
                    'soluong'=>$item['soluong'],
                    'dongia'=>$item['dongia']
                ]);
                $sanpham = $this->sanpham->find($id);
                $soluong = $sanpham->soluong - $item['soluong'];
                if ($soluong<0){
                    DB::rollBack();
                    $message = "Sản phẩm ". $sanpham->tensp. " đã hết hoặc không đủ số lượng sản phẩm bạn cần mua";
                    return Response()->json([
                        'code'=>201,
                        'message'=>$message,
                    ],200);
                } else{
                    $this->sanpham->find($id)->update([
                        'soluong'=> $soluong,
                    ]);
                }
            }
            $request->session()->forget('cart');
            $request->session()->forget('donhang');
            DB::commit();
            return Response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line : '.$exception->getLine());
            return Response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }
}

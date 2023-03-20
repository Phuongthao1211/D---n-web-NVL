<?php

namespace App\Http\Controllers;

use App\Models\chitietdonhang;
use App\Models\danhgia;
use App\Models\donhang;
use App\Models\sanpham;
use App\Models\User;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;
use function Sodium\add;

class AdminDashboardController extends Controller
{
    private $user;
    private $donhang;
    private $danhgia;
    private $chitietdonhang;
    private $sanpham;
    public function __construct(User $user,donhang $donhang,danhgia $danhgia,chitietdonhang $chitietdonhang,sanpham $sanpham)
    {
        $this->user = $user;
        $this->donhang = $donhang;
        $this->danhgia = $danhgia;
        $this->chitietdonhang = $chitietdonhang;
        $this->sanpham = $sanpham;
    }
    public function index(){
        $totalUer = $this->user->count();
        $totalView = $this->sanpham->sum('view');
        $totalDonHang = $this->donhang->count();
        $totalDanhGia = $this->danhgia->count();


        //doanh thu theo ngày
        $donhang_created = $this->donhang->select(DB::raw('DATE(Created_at) as month'))->where('active',3)->distinct();
        $donhang_created = $donhang_created->orderBy('month')->take(5)->pluck("month");
        $ngay_doanhthu = array();
        foreach ($donhang_created as $ngay){
            $day = date('d', strtotime($ngay));
            $month = date('m', strtotime($ngay));
            $year = date('Y', strtotime($ngay));
            $str = $day.'/'.$month.'/'.$year;
            $donhang = $this->donhang
                ->where('active',3)
                ->whereDay('Created_at',$day)
                ->whereMonth('Created_at',$month)
                ->whereYear('Created_at',$year)->get();
                $total = 0;
                foreach ($donhang as $item){
                    $total += $this->doanhthu($item->chitietdonhang);
                }
                $data_doanhthu[$str] = $total;
        }
        $ngay_doanhthu = array_keys($data_doanhthu);

        //doanh thu theo đơn hàng
        for($i=0;$i<4;$i++){
            $donhang = $this->donhang->where('active',$i)->get();
            $total = 0;
            foreach ($donhang as $item){
                $total += $this->doanhthu($item->chitietdonhang);
            }
            $doanhthu_donhang[$i] = $total;
        }

        //số lượng đơn hàng
        $i=0;
        foreach ($donhang_created as $ngay){
            $day = date('d', strtotime($ngay));
            $month = date('m', strtotime($ngay));
            $year = date('Y', strtotime($ngay));
            $str = $day.'/'.$month.'/'.$year;
            $donhang = $this->donhang
                ->where('active',3)
                ->whereDay('Created_at',$day)
                ->whereMonth('Created_at',$month)
                ->whereYear('Created_at',$year)->count();
            $data_sldonhang[$i] = $donhang;
            $i++;
        }

        //binhluan
        $binhluan = $this->danhgia->get();

        return view('admins.dashboard.index',
            compact('totalUer','totalView','totalDonHang','totalDanhGia',
            'ngay_doanhthu','data_doanhthu','doanhthu_donhang','binhluan','data_sldonhang'));
    }

    public function delete(Request $request){
        $this->danhgia->find($request->id)->delete();
        $binhluan = $this->danhgia->get();
        $partials_binhluan = view('admins.dashboard.partials.binhluan',compact('binhluan'))->render();
        return response()->json([
           'code'=>200,
           'partials_binhluan'=> $partials_binhluan
        ],200);
    }

    private function doanhthu($item){
        $total = 0;
        foreach ($item as $ctdn){
            $total += doubleval($ctdn->soluong*doubleval($ctdn->dongia));
        }
        return $total;
    }
}

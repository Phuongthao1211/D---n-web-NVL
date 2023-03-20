<div class="row">
    <div class="col-lg-7">
        @php
            $key = 1;
            $trangthai = '<span class="trangthai text-primary">Chờ duyệt</span>';
            if ($donhang->active ==0 ){
                $key = 0;
                $trangthai = '<span class="trangthai text-danger">Đã hủy</span>';
            }
            if ($donhang->active ==2 ){
                $key = 2;
                $trangthai = '<span class="trangthai text-warning">Đang giao</span>';
            }
            if ($donhang->active ==3 ){
                $key = 3;
               $trangthai = '<span class="trangthai text-success">Đã giao</span>';
            }
        @endphp
        <h3 class="mt-4">Trạng thái : {!! $trangthai !!}</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="new-adr-first-name" class="form-label font-16">Họ và tên</label>
                    <input class="form-control" type="text" value="{{$donhang->user->name}}" id="new-adr-first-name" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="new-adr-email-address" class="form-label  font-16">Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" value="{{$donhang->user->email}}" id="new-adr-email-address" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="new-adr-phone" class="form-label  font-16">Số điện thoại <span class="text-danger">*</span></label>
                    <input class="form-control" name="phone" type="text" value="{{$donhang->phone}}" id="new-adr-phone" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="new-adr-address" class="form-label  font-16">Địa chỉ</label>
                    <textarea name="diachi" class="form-control" disabled rows="3">{{$donhang->diachi}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label  font-16">Ghi chú</label>
                    <textarea name="ghichu" class="form-control" disabled rows="3">{{$donhang->ghichu}}</textarea>
                </div>
            </div>
        </div>
        <h4 class="mt-4  font-16">Phương thức thanh toán</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="border p-3 rounded mb-3 mb-md-0">
                    <div class="form-check">
                        <input type="radio" id="shippingMethodRadio1" name="shippingOptions" class="form-check-input" checked="">
                        <label class="form-check-label font-16 fw-bold" for="shippingMethodRadio1">Thanh toán khi nhận hàng</label>
                    </div>
                    <p class="mb-0 ps-3 pt-1">Miễn phí vận chuyển</p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
                <a href="javascript:window.location=document.referrer;" class="btn text-muted d-none d-sm-inline-block font-18 btn-link fw-semibold">
                    <i class="mdi mdi-arrow-left"></i> Trở lại đơn hàng </a>
            </div>
            @if($key==1)
                <div class="col-sm-6">
                    <div class="text-sm-end">
                        <a href="" data-url="{{route('admindonhang.huydon')}}" data-dh="{{$donhang->id}}" class="btn btn-danger rounded font-18 btn-huydon"><i class="mdi mdi-cancel me-1"></i> Hủy đơn </a>
                        <a href="" data-url="{{route('admindonhang.duyetdon')}}" data-dh="{{$donhang->id}}" class="btn btn-warning rounded font-18 btn-duyetdon"><i class="mdi mdi-check me-1"></i> Duyệt đơn </a>
                    </div>
                </div>
            @endif
            @if($key==2)
                <div class="col-sm-6">
                    <div class="text-sm-end">
                        <a href="" data-url="{{route('admindonhang.huydon')}}" data-dh="{{$donhang->id}}" class="btn btn-danger rounded font-18 btn-huydon"><i class="mdi mdi-cancel me-1"></i> Hủy đơn </a>
                        <a href="" data-url="{{route('admindonhang.xacnhandon')}}" data-dh="{{$donhang->id}}" class="btn btn-success rounded font-18 btn-xacnhangiao"><i class="mdi mdi-check me-1"></i> Xác nhận giao </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="col-lg-5" >
        <div class="border p-3 mt-4 mt-lg-0 rounded" id="hoadon_donhang">
            <div class="row">
                <div class="col-6">
                    <h3 class="">Hóa đơn {{$donhang->id}}</h3>
                </div>
                <div class="col-6">
                    <h3 class="float-end font-16">Ngày xuất : {{date("d/m/Y h:i:s ")}}</h3>
                </div>
            </div>
            <div class="row border-top border-5">
                <div class="col-4">
                    <h5 class="ms-4 font-16">Tên khách hàng :</h5>
                </div>
                <div class="col-8 ">
                    <h5 class="font-16">{{$donhang->user->name}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h5 class="ms-4 font-16">Email :</h5>
                </div>
                <div class="col-8">
                    <h5 class="font-16">{{$donhang->user->email}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h5 class="ms-4 font-16">Số điện thoại :</h5>
                </div>
                <div class="col-8">
                    <h5 class="font-16">{{$donhang->user->phone}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h5 class="ms-4 font-16">Địa chỉ :</h5>
                </div>
                <div class="col-8">
                    <h5 class="font-16">{{$donhang->diachi}}</h5>
                </div>
            </div>
            <div class="row border-bottom border-5">
                <div class="col-4">
                    <h5 class="ms-4 font-16">Ngày mua :</h5>
                </div>
                <div class="col-8">
                    <h5 class="font-16">{{$donhang->created_at}}</h5>
                </div>
            </div>
            <div class="row border-bottom border-2">
                <div class="col-7"><h5>Tên sản phẩm</h5></div>
                <div class="col-5"><h5 class="float-end">Thành tiền (VNĐ)</h5></div>
            </div>
            @php
                $total = 0;
            @endphp
            @foreach($chitietdonhang as $item)
                @php
                    $total += doubleval($item->soluong*doubleval($item->dongia));
                @endphp
                <div class="row">
                    <div class="col-12"><h5><a href="{{route('sanpham.chitiet',['id'=>$item->sanpham_id])}}" class="font-18">{{$item->sanpham->tensp}}</a></h5></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h6>{{$item->soluong}} x {{number_format($item->dongia)}}</h6>
                    </div>
                    <div class="col-6">
                        <h5 class="float-end font-16">{{number_format($item->soluong*doubleval($item->dongia))}}</h5>
                    </div>
                </div>
            @endforeach
            <div class="row border-top border-5">
                <div class="col-8"><h5 class="float-end">Tổng cộng:</h5></div>
                <div class="col-4"><h5 class="float-end font-16">{{number_format($total)}} VNĐ</h5></div>
            </div>
        </div>
        @if($donhang->active!=0)
        <div class="row mt-2">
            <div class="col-12">
                <input type="button" class="float-end w-25 btn btn-secondary" onclick="printDiv('hoadon_donhang')" value="In hóa đơn" />
            </div>
        </div>
        @endif
    </div>
</div>

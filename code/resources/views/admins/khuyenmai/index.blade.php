@extends('admins.layouts.admin')
@section('title')
    <title>Khuyến mãi</title>
@endsection
@section('link_css')

@endsection
@section('container-fluid')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item font-16"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active font-16"><a href="javascript: void(0);">Khuyến mãi</a></li>
                    </ol>
                </div>
                <h2 class="page-title font-24">Khuyến mãi</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('khuyenmai.create')}}" class="btn btn-primary btn-rounded font-16 mb-3">Thêm khuyến mãi</a>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered m-0 font-16" id="striped-rows-preview">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Tên khuyến mãi</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Trạng thái</th>
                                        <th class="text-center">Thêm sản phẩm</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($khuyenmais as $khuyenmai)
                                        <tr>
                                            <td>{{$khuyenmai->id}}</td>
                                            <td>{{$khuyenmai->name}}</td>
                                            <td>{{$khuyenmai->ngaybatdau}}</td>
                                            <td>{{$khuyenmai->ngayketthuc}}</td>
                                            <td>

                                                @switch($khuyenmai->active)
                                                    @case(0)
                                                    <i class="mdi mdi-circle text-warning"></i> Chưa diễn ra
                                                    @break
                                                    @case(1)
                                                    <i class="mdi mdi-circle text-success"></i> Đang diễn ra
                                                    @break
                                                    @case(2)
                                                    <i class="mdi mdi-circle text-danger"></i> Đã kết thúc
                                                    @break
                                                @endswitch

                                            </td>
                                            <td class="text-center">
                                                @switch($khuyenmai->active)
                                                    @case(2)
                                                    <a href="{{route('khuyenmai.add_product',['id'=>$khuyenmai->id])}}" class="btn btn-outline-dark btn-rounded"> <i class="mdi mdi-pencil-box-multiple"></i> Xem</a>
                                                    @break
                                                    @default
                                                    <a href="{{route('khuyenmai.add_product',['id'=>$khuyenmai->id])}}" class="btn btn-outline-dark btn-rounded"> <i class="mdi mdi-pencil-box-multiple"></i> Thêm / Xóa sản phẩm</a>
                                                @endswitch

                                            </td>
                                            <td class="text-center">
                                                @switch($khuyenmai->active)
                                                    @case(2)
                                                    <a href="javascript: void(0);" class="btn btn-secondary btn-rounded"> <i class="mdi mdi-cancel"></i></a>
                                                    @break
                                                    @default
                                                    <a href="{{route('khuyenmai.edit',['id'=>$khuyenmai->id])}}" class="btn btn-outline-dark btn-rounded"> <i class="mdi mdi-pencil"></i> Sửa</a>
                                                @endswitch
                                                <a href="javascript: void(0);" data-url="{{route('khuyenmai.delete',['id'=>$khuyenmai->id])}}" class="btn btn-outline-dark btn-rounded action_delete"> <i class="mdi mdi-delete"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-center d-flex justify-content-center">
                        {{$khuyenmais->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('link_js')
    <script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admin_resources/delete_ajax.js')}}"></script>
@endsection

@extends('admins.layouts.admin')
@section('title')
    <title>Tài khoản admin</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('admin_resources/taikhoan/taikhoan.css')}}">
@endsection
@section('container-fluid')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item font-16"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active font-16"><a href="javascript: void(0);">Tài khoản</a></li>
                    </ol>
                </div>
                <h2 class="page-title font-24">Thông tin tài khoản</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row font-18 info_admin">
                        <div class="col-12">
                            @include('admins.taikhoan.partials.info')
                            <div class="text-center">
                                <button type="button" class="btn btn-outline-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#infomodal">Thay đổi thông tin</button>
                                <a href="{{route('admintaikhoan.re_pass')}}" class="btn btn-outline-dark rounded-pill">Đổi mật khẩu</a>
                                <div class="modal fade" id="infomodal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myCenterModalLabel">Thay đổi thông tin</h4>
                                                <button type="button" class="btn-close font-18" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admintaikhoan.update')}}" method="post" id="form-update-info">
                                                    @csrf
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="name" required class="form-control" id="floatingInput" value="{{auth()->guard('admin')->user()->name}}" placeholder="Nhập họ tên..." />
                                                        <label for="floatingInput">Họ tên</label>
                                                    </div>

                                                    <div class="form-floating">
                                                        <input type="number" name="phone" required class="form-control" id="floatingPassword" value="{{auth()->guard('admin')->user()->phone}}" placeholder="Nhập số điện thoại" />
                                                        <label for="floatingPassword">Số điện thoại</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-2">Cập nhập</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('link_js')
    <script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admin_resources/taikhoan/taikhoan.js')}}"></script>
@endsection

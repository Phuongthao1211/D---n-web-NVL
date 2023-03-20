@extends('admins.layouts.admin')
@section('title')
    <title>Đổi mật khẩu</title>
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
                <h2 class="page-title font-24">Thay đổi mật khẩu</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row font-18 info_admin">
                        <div class="col-12">
                            <form action="{{route('admintaikhoan.re_passPost')}}" method="post" id="form-update-pass">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="password" name="password_old" required class="form-control" id="floatingInput"  placeholder="Nhập mật khẩu cữ" />
                                    <label for="floatingInput">Mật khẩu cũ</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="password" required class="form-control" id="floatingPassword" placeholder="Nhập mật khẩu mới" />
                                    <label for="floatingPassword">Mật khẩu mới</label>
                                </div>

                                <div class="form-floating">
                                    <input type="password" name="password_confirmation" required class="form-control" id="floatingPassword"  placeholder="Nhập lại mật khẩu" />
                                    <label for="floatingPassword">Nhập lại mật khẩu</label>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        @error('password')
                                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                        @if(isset($message))
                                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary rounded-pill">Cập nhập</button>
                                    <a href="{{route('admintaikhoan.index')}}" class="btn btn-outline-dark rounded-pill">Quay về</a>
                                </div>
                            </form>

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

@extends('admins.layouts.admin')
@section('title')
    <title>Thêm admin</title>
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
                        <li class="breadcrumb-item active font-16">Thêm admin</li>
                    </ol>
                </div>
                <h2 class="page-title font-24">Thêm tài khảon admin</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('admins.admin.index')}}" class="btn btn-dark rounded-pill mb-3">Quay về</a>
                    <form action="{{route('admins.admin.addPost')}}" method="post" class="font-18">
                        @csrf
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Họ tên</label>
                            <input type="text" value="{{ old('name') }}" id="simpleinput" class="form-control" name="name" placeholder="Nhập họ tên..." required>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Email</label>
                            <input type="email" value="{{ old('email') }}" id="simpleinput" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Nhập email..." required>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Password</label>
                            <input type="password" id="simpleinput" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Nhập password..." required>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Nhập lại Password</label>
                            <input type="password" id="simpleinput" class="form-control" name="password_confirmation" placeholder="Nhập lại password..." required>
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="simpleinput" class="form-label">Chọn loại tài khoản : </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio4" name="loaitaikhoan" class="form-check-input" value="3" required checked>
                                <label class="form-check-label" for="customRadio4">Nhân viên</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio3" name="loaitaikhoan" class="form-check-input" value="1" required>
                                <label class="form-check-label" for="customRadio3">Quản trị hệ thống (Admin)</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3 text-center">
                                @error('email')
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="btn-close @error('password') is-invalid @enderror" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
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
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('link_js')

@endsection

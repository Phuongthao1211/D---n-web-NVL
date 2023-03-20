@extends('admins.layouts.admin')
@section('title')
    <title>Tài khoản admin</title>
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
                        <li class="breadcrumb-item active font-16">Tài khoản admin</li>
                    </ol>
                </div>
                <h2 class="page-title font-24">Tài khoản admin</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('admins.admin.add')}}" class="btn btn-primary rounded-pill mb-3">Thêm tài khoản</a>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0 font-16">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Loại tài khoản</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->loaiTaiKhoanAdmin->name}}</td>
                                            <td>
                                                <div>
                                                    @if($user->active)
                                                        <input type="checkbox" id="{{'switch'.$user->id}}" checked data-switch="success"/>
                                                    @else
                                                        <input type="checkbox" id="{{'switch'.$user->id}}" data-switch="success"/>
                                                    @endif
                                                    <label for="{{'switch'.$user->id}}" data-url="{{route('admins.admin.active')}}" data-id="{{$user->id}}" data-on-label="Yes" data-off-label="No" class="mb-0 d-block active_user"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-center d-flex justify-content-center">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('link_js')
    <script src="{{asset('admin_resources/user/index.js')}}"></script>
@endsection

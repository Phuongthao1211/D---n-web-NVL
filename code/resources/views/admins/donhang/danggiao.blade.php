@extends('admins.layouts.admin')
@section('title')
    <title>Đơn hàng đang giao</title>
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
                        <li class="breadcrumb-item active font-16"><a href="javascript: void(0);">Đơn hàng</a></li>
                    </ol>
                </div>
                <h2 class="page-title font-24">Đơn hàng đang giao</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 table_donhang">
            @include('admins.donhang.partials.table_donhang')
        </div>
    </div>
@endsection
@section('link_js')
    <script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admin_resources/delete_ajax.js')}}"></script>
    <script src="{{asset('admin_resources/donhang/donhang.js')}}"></script>
@endsection

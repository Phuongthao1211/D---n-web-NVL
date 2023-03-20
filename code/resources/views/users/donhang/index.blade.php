@extends('users.layouts.home')
@section('title')
    <title>New Shop | Đơn hàng</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('user_resources/category/category.css')}}">
@endsection()
@section('link_js')
    <script src="{{asset('admin_resources/donhang/donhang.js')}}"></script>
    <script src="{{asset('user_resources/category/category.js')}}"></script>
@endsection()
@section('content')
    @include('users.sanpham.partials.danhmuc')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-3 mt-4">Đơn hàng</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card" style="min-height: 300px">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3 font-18">
                                <li class="nav-item">
                                    <a href="#choduyet" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <i class="mdi mdi-cart-minus d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Đơn hàng chờ duyệt</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#danggiao" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                        <i class="mdi mdi-check d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Đơn hàng đã duyệt - đang giao</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#dagiao" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                        <i class="mdi mdi-check-all d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Đơn hàng đã giao</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#huy" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                        <i class="mdi mdi-cancel d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Đơn hàng đã hủy</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane show active" id="choduyet">
                                    @if(count($donhangchoduyet)==0)
                                        <div class="row text-center">
                                            <h3>Không có đơn hàng chờ duyệt</h3>
                                        </div>
                                    @else
                                        @include('users.donhang.partials.choduyet')
                                    @endif
                                </div>
                                <div class="tab-pane" id="danggiao">
                                    @if(count($donhangdanggiao)==0)
                                        <div class="row text-center">
                                            <h3>Không có đơn hàng đang giao</h3>
                                        </div>
                                    @else
                                        @include('users.donhang.partials.danggiao')
                                    @endif
                                </div>
                                <div class="tab-pane" id="dagiao">
                                    @if(count($donhangdagiao)==0)
                                        <div class="row text-center">
                                            <h3>Không có đơn hàng đã giao</h3>
                                        </div>
                                    @else
                                        @include('users.donhang.partials.dagiao')
                                    @endif
                                </div>
                                <div class="tab-pane" id="huy">
                                    @if(count($donhanghuy)==0)
                                        <div class="row text-center">
                                            <h3>Không có đơn hàng hủy</h3>
                                        </div>
                                    @else
                                        @include('users.donhang.partials.huy')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection()

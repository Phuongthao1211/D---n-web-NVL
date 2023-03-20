@extends('users.layouts.home')
@section('title')
    <title>New Shop | Giỏ hàng</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('user_resources/category/category.css')}}">

@endsection()
@section('link_js')
    <script src="{{asset('user_resources/category/category.js')}}"></script>
    <script src="{{asset('user_resources/giohang/cart.js')}}"></script>
@endsection()
@section('content')
    <section>
        @include('users.sanpham.partials.danhmuc')

        <div class="container cart_wrapper">
            @include('users.giohang.partials.cart')
        </div>
    </section>
@endsection()

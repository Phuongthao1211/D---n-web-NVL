@extends('admins.layouts.admin')
@section('title')
    <title>Doanh thu dự kiến</title>
@endsection
@section('link_css')
    <link href="{{asset('resource/assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('resource/assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('resource/assets/css/vendor/buttons.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('container-fluid')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item font-16"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active font-16"><a href="javascript: void(0);">Báo cáo</a></li>
                    </ol>
                </div>
                <h2 class="page-title font-24">Doanh thu dự kiến (Tất cả đơn hàng)</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" data-url="{{route('baocao.selectdtdk')}}">
                        <div class="col-6">
                            <label for="example-date" class="form-label">Từ ngày</label>
                            <input class="form-control" id="date_start" type="date" name="date" value="{{$data[count($data)-1]['ngay']}}">
                        </div>
                        <div class="col-6">
                            <label for="example-date" class="form-label">Đến ngày</label>
                            <input class="form-control" id="date_end" type="date" name="date" value="{{$data[0]['ngay']}}">
                        </div>
                    </div>

                    @include('admins.baocao.partials.table')

                </div>
            </div>
        </div>
    </div>
@endsection
@section('link_js')
    <div class="load_js">

        @include('admins.baocao.partials.script')
        <script src="{{asset('admin_resources/baocao/baocao.js')}}"></script>

    </div>
@endsection

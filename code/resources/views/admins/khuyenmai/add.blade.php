@extends('admins.layouts.admin')
@section('title')
    <title>Thêm khuyến mãi</title>
@endsection
@section('link_css')
    <link href="{{asset('resource/assets/css/vendor/simplemde.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('resource/assets/css/vendor/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('container-fluid')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item font-16"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item font-16"><a href="javascript: void(0);">Khuyến mãi</a></li>
                        <li class="breadcrumb-item active font-16">Thêm khuyến mãi</li>
                    </ol>
                </div>
                <h2 class="page-title font-24">Thêm khuyến mãi</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('khuyenmai.index')}}" class="btn btn-secondary btn-rounded mb-3 font-16">Quay về</a>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="form-row-preview">
                            <form action="{{route('khuyenmai.store')}}" method="post" class="font-16">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="mb-1">Tên khuyến mãi</h5>
                                        <div class="tab-pane show active" id="striped-rows-preview">
                                            <div class="form-floating mb-3">
                                                <input name="name" type="text" class="form-control"  id="floatingInput" placeholder="Tên khuyến mãi" required />
                                                <label for="floatingInput">Tên khuyến mãi</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="mb-1">Ngày bắt đầu</h5>
                                        <div class="tab-pane show active" id="striped-rows-preview">
                                            <div class="form-floating mb-3">
                                                <input name="ngaybd" type="datetime-local" class="form-control" id="floatingInput" placeholder="Ngày bắt đầu" required />
                                                <label for="floatingInput">Ngày bắt đầu</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-1">Ngày kết thúc</h5>
                                        <div class="tab-pane show active" id="striped-rows-preview">
                                            <div class="form-floating mb-3">
                                                <input name="ngaykt" type="datetime-local" class="form-control" id="floatingInput" placeholder="Ngày kết thúc" required />
                                                <label for="floatingInput">Ngày kết thúc</label>
                                            </div>

                                        </div>
                                    </div>
                                    @if(isset($message))
                                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('link_js')
    <script src="{{asset('resource/assets/js/vendor/simplemde.min.js')}}"></script>
    <script src="{{asset('resource/assets/js/pages/demo.simplemde.js')}}"></script>
@endsection

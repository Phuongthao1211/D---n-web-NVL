@extends('admins.layouts.admin')
@section('title')
    <title>Thêm sản phẩm</title>
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
                        <li class="breadcrumb-item font-16"><a href="javascript: void(0);">Sản phẩm</a></li>
                        <li class="breadcrumb-item active font-16">Thêm sản phẩm</li>
                    </ol>
                </div>
                <h2 class="page-title font-24">Thêm sản phẩm</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('product.index')}}" class="btn btn-secondary btn-rounded mb-3 font-16">Quay về</a>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="form-row-preview">
                            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="font-16">
                                @csrf
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Danh mục</label>
                                        <select id="inputState" class="form-select" name="category_id">
                                            <option>Chọn danh mục</option>
                                            @foreach($danhmucs as $danhmuc)
                                                <option value="{{$danhmuc->id}}">{{$danhmuc->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Hãng vật liệu</label>
                                        <select id="inputState" class="form-select" name="menu_id">
                                            <option>Chọn hãng</option>
                                            @foreach($menus as $menu)
                                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tên sản phẩm</label>
                                        <input name="tensp" type="text" class="form-control" id="inputEmail4" placeholder="Tên sản phẩm">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Giá sản phẩm</label>
                                        <input name="dongia" type="text" class="form-control" id="inputEmail4" placeholder="Giá sản phẩm">
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="inputEmail4" class="form-label">Số lượng</label>
                                        <input name="soluong" type="text" class="form-control" id="inputEmail4" placeholder="Số lượng">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Ảnh đại diện</label>
                                        <input name="hinhanh" type="file" class="form-control" id="inputEmail4">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ảnh chi tiết</label>
                                    <input name="hinhanhchitiet[]" type="file" class="form-control" id="inputEmail4" multiple>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cấu hình</label>
                                    <textarea name="cauhinh" class="form-control my-editor-cauhinh"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mô tả</label>
                                    <textarea name="mota" class="form-control my-editor" rows="20"></textarea>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/tinymce.min.js" integrity="sha512-laacsEF5jvAJew9boBITeLkwD47dpMnERAtn4WCzWu/Pur9IkF0ZpVTcWRT/FUCaaf7ZwyzMY5c9vCcbAAuAbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admin_resources/sanpham/add.js')}}"></script>
@endsection

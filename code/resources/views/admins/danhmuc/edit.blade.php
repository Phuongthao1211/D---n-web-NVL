@extends('admins.layouts.admin')
@section('title')
    <title>Sửa danh mục</title>
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
                        <li class="breadcrumb-item font-16"><a href="javascript: void(0);">Danh mục</a></li>
                        <li class="breadcrumb-item active font-16">Sửa danh mục</li>
                    </ol>
                </div>
                <h2 class="page-title font-24">Sửa danh mục</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('categories.index')}}" class="btn btn-secondary btn-rounded font-16">Quay về</a>
                    <div class="tab-content">
                        <form action="{{route('categories.update',['id'=>$danhmuc->id])}}" method="post" class="font-16">
                            @csrf
                            <h4 class="mb-1 mt-3">Tên danh mục</h4>
                            <div class="tab-pane show active" id="striped-rows-preview">
                                <div class="form-floating mb-3">
                                    <input value="{{$danhmuc->name}}" name="name" type="text" class="form-control" id="floatingInput" placeholder="Tên danh mục" required/>
                                    <label for="floatingInput">Tên danh mục</label>
                                </div>
                            </div>
                            <h4 class="mb-1 mt-3">Mô tả</h4>
                            <div class="form-floating">
                                <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required>{{$danhmuc->description}}</textarea>
                                <label for="floatingTextarea">Mô tả</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('link_js')

@endsection

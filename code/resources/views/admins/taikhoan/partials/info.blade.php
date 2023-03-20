<div class="row mb-3">
    <label class="col-md-3 col-form-label text-center" for="name3">Họ tên</label>
    <div class="col-md-9">
        <div class="alert alert-primary fw-bold" role="alert">
            {{auth()->guard('admin')->user()->name}}
        </div>
    </div>
</div>
<div class="row mb-3">
    <label class="col-md-3 col-form-label text-center" for="surname3">Email</label>
    <div class="col-md-9">
        <div class="alert alert-info fw-bold" role="alert">
            {{auth()->guard('admin')->user()->email}}
        </div>
    </div>
</div>
<div class="row mb-3">
    <label class="col-md-3 col-form-label text-center" for="email3">Phone</label>
    <div class="col-md-9">
        <div class="alert alert-secondary fw-bold" role="alert">
            @if(auth()->guard('admin')->user()->phone)
                {{auth()->guard('admin')->user()->phone}}
            @else
                <span class="badge badge-outline-danger rounded-pill">* Vui lòng thêm số điện thoại</span>
            @endif
        </div>
    </div>
</div>
<div class="row mb-3">
    <label class="col-md-3 col-form-label text-center" for="surname3">Chức vụ</label>
    <div class="col-md-9">
        <div class="alert alert-warning fw-bold" role="alert">
            {{auth()->guard('admin')->user()->loaiTaiKhoanAdmin->name}}
        </div>
    </div>
</div>



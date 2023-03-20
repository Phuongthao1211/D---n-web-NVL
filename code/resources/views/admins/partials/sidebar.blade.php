<div class="leftside-menu">
    <a href="{{route('admin.dashboard.index')}}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{asset('resource/assets/images/logo.png')}}" alt="">
        </span>
        <span class="logo-sm">
            <img src="{{asset('resource/assets/images/logo_sm.png')}}" alt="">
        </span>
    </a>
    <a href="{{route('admin.dashboard.index')}}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{asset('resource/assets/images/logo-dark.png')}}" alt="">
        </span>
        <span class="logo-sm">
            <img src="{{asset('resource/assets/images/logo_sm_dark.png')}}" alt="">
        </span>
    </a>
    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        <ul class="side-nav">
            <li class="side-nav-title side-nav-item font-12">Thanh công cụ</li>
            <li class="side-nav-item">
                <a href="{{route('admin.dashboard.index')}}" class="side-nav-link font-18">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="side-nav-title side-nav-item font-12">Chức năng</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDanhMuc" aria-expanded="false" aria-controls="sidebarDanhMuc" class="side-nav-link font-18">
                    <i class="uil-store"></i>
                    <span> Danh mục </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarDanhMuc">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('categories.index')}}" class="font-16">Xem</a>
                        </li>
                        <li>
                            <a href="{{route('categories.create')}}" class="font-16">Thêm</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMenu" aria-expanded="false" aria-controls="sidebarMenu" class="side-nav-link font-18">
                    <i class="uil-envelope"></i>
                    <span> Hãng vật liệu </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMenu">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('menu.index')}}" class="font-16">Xem</a>
                        </li>
                        <li>
                            <a href="{{route('menu.create')}}" class="font-16">Thêm</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSanpham" aria-expanded="false" aria-controls="sidebarSanpham" class="side-nav-link font-18">
                    <i class="uil-briefcase"></i>
                    <span> Sản phẩm </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSanpham">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('product.index')}}" class="font-16">Xem</a>
                        </li>
                        <li>
                            <a href="{{route('product.create')}}" class="font-16">Thêm</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarKhuyenMai" aria-expanded="false" aria-controls="sidebarKhuyenMai" class="side-nav-link font-18">
                    <i class="uil-clipboard-alt"></i>
                    <span> Khuyến mãi </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarKhuyenMai">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('khuyenmai.index')}}" class="font-16">Xem</a>
                        </li>
                        <li>
                            <a href="{{route('khuyenmai.create')}}" class="font-16">Thêm</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDonHang" aria-expanded="false" aria-controls="sidebarDonHang" class="side-nav-link font-18">
                    <i class="uil-window"></i>
                    <span> Đơn hàng </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarDonHang">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admindonhang.choduyet')}}" class="font-16">Đơn chờ xác nhận</a>
                        </li>
                        <li>
                            <a href="{{route('admindonhang.danggiao')}}" class="font-16">Đơn đang giao</a>
                        </li>
                        <li>
                            <a href="{{route('admindonhang.dagiao')}}" class="font-16">Đơn đã giao</a>
                        </li>
                        <li>
                            <a href="{{route('admindonhang.huy')}}" class="font-16">Đơn hủy</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBaoCao" aria-expanded="false" aria-controls="sidebarBaoCao" class="side-nav-link font-18">
                    <i class="uil-folder-plus"></i>
                    <span> Báo cáo thống kê </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBaoCao">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('baocao.index')}}" class="font-16">Doanh thu đạt được</a>
                        </li>
                        <li>
                            <a href="{{route('baocao.dtdk')}}" class="font-16">Doanh thu dự kiến</a>
                        </li>
                        <li>
                            <a href="{{route('baocao.sanpham')}}" class="font-16">Sản phẩm</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-title side-nav-item mt-1 font-12">Tài khoản</li>
            <li class="side-nav-item">
                <a href="{{route('admins.user.index')}}" class="side-nav-link font-18">
                    <i class="uil-user-check"></i>
                    <span> Tài khoản user </span>
                </a>
            </li>
            @if(auth()->guard('admin')->user()->loaitaikhoan==1)
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarAdmin" aria-expanded="false" aria-controls="sidebarAdmin" class="side-nav-link font-18">
                        <i class=" uil-user-square"></i>
                        <span> Tài khoản admin </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAdmin">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('admins.admin.index')}}" class="font-16">Tài khoản admin</a>
                            </li>
                            <li>
                                <a href="{{route('admins.admin.add')}}" class="font-16">Thêm tài khoản admin</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
        <div class="clearfix"></div>
    </div>
</div>

<div class="navbar-custom font-18">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Tìm kiếm  ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>
        <li class="notification-list">
            <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                <i class="dripicons-gear noti-icon"></i>
            </a>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="{{asset('resource/assets/images/users/avatar.png')}}" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    @php
                        $admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
                    @endphp
                    <span class="account-user-name">{{$admin->name}}</span>
                    <span class="account-position font-14">{{$admin->loaiTaiKhoanAdmin->name}}</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0 font-16">Xin chào !</h6>
                </div>
                <a href="{{route('admintaikhoan.index')}}" class="dropdown-item notify-item font-18">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>Thông tin tài khoản</span>
                </a>
                <a href="{{route('admin.logout')}}" class="dropdown-item notify-item font-18">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Đăng xuất</span>
                </a>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
    <div class="app-search dropdown d-none d-lg-block">
        <form class="" style="min-width: 500px">
            <div class="input-group">
                <input type="text" class="form-control dropdown-toggle" placeholder="Tìm kiếm..." id="top-search">
                <span class="mdi mdi-magnify search-icon"></span>
                <button class="input-group-text btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown" style="min-width: 500px">
            <div class="dropdown-header noti-title">
                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
            </div>
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-notes font-16 me-1"></i>
                <span>Analytics Report</span>
            </a>
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-life-ring font-16 me-1"></i>
                <span>How can I help you?</span>
            </a>
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-cog font-16 me-1"></i>
                <span>User profile settings</span>
            </a>
        </div>
    </div>
</div>



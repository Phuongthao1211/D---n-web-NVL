<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Đăng nhập | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Chuyên bán linh kiện máy tính tại Việt Nam" name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="{{asset('resource/assets/images/logo_sm.png')}}">
    <link href="{{asset('resource/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('resource/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('resource/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="#">
                            <span><img src="{{asset('resource/assets/images/logo.png')}}" alt=""></span>
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Đăng Nhập</h4>
                            <p class="text-muted mb-4">Nhập Email và mật khẩu để truy cập quản trị hệ thống.</p>
                        </div>
                        <form action="{{route('admin.loginPost')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email</label>
                                <input name="email" class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" required="" placeholder="Nhập email">
                            </div>
                            @error('email')
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input name="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nhập password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                            @error('password')
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @if(isset($message))
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <div class="mb-3 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked name="remember_me">
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> Đăng nhập </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer footer-alt">
    2021 - Linh kiện máy tính NEW SHOP
</footer>

<script src="{{asset('resource/assets/js/vendor.min.js')}}"></script>
<script src="{{asset('resource/assets/js/app.min.js')}}"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        @yield('title')
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Chuyên bán linh kiện máy tính tại Việt Nam" name="description">
        <meta content="Coderthemes" name="author">
        <link rel="shortcut icon" href="{{asset('resource/assets/images/logo_sm.png')}}">
        <link href="{{asset('resource/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('resource/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
        <link href="{{asset('resource/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">
        @yield('link_css')
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="wrapper">

        @include('admins.partials.sidebar')
            <div class="content-page">
                <div class="content">

                    @include('admins.partials.header')

                    <div class="container-fluid">

                        @yield('container-fluid')

                    </div>
                </div>

                @include('admins.partials.footer')

            </div>
        </div>

        @include('admins.partials.setting')
        <div class="rightbar-overlay"></div>
        <script src="{{asset('resource/assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('resource/assets/js/app.min.js')}}"></script>
        @yield('link_js')
        <script>
            var msg = '{{Session::get('jsAlert')}}';
            var exist = '{{Session::has('jsAlert')}}';
            if(exist){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: msg,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        </script>
    </body>
</html>

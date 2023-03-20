@extends('admins.layouts.admin')
@section('title')
    <title>Báo cáo sản phẩm</title>
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
                <h2 class="page-title font-24">Sản phẩm</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Lượt xem</th>
                            <th>Lượt mua</th>
                            <th>Tồn kho</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$iteam)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$iteam['name']}}</td>
                                <td>{{$iteam['view']}}</td>
                                <td>{{$iteam['mua']}}</td>
                                <td>{{$iteam['tonkho']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('link_js')
    <script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('resource/assets/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('resource/assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('resource/assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('resource/assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('resource/assets/js/vendor/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('resource/assets/js/vendor/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('resource/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('resource/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('resource/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('resource/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('resource/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('resource/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $.fn.dataTable.ext.errMode = 'none';
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('.buttons-colvis').text("Chọn trường hiển thị")
        $('.buttons-print').text("In báo cáo")
        $('.buttons-pdf').text("Xuất PDF")
        $('.buttons-excel').text("Xuất Excel")
    </script>
@endsection

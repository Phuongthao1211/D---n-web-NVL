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

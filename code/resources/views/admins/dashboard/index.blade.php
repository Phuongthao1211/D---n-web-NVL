@extends('admins.layouts.admin')
@section('title')
    <title>Trang chủ Admin</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('admin_resources/dashboard/dashboard.css')}}">
@endsection
@section('container-fluid')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item font-16"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active font-16">Dashboard</li>
                    </ol>
                </div>
                <h2 class="page-title font-24">Dashboard</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card widget-inline">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body text-center">
                                                <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                                <h3><span>{{$totalUer}}</span></h3>
                                                <p class="text-muted font-15 mb-0">User đăng ký</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card shadow-none m-0 border-start">
                                            <div class="card-body text-center">
                                                <i class="dripicons-preview text-muted" style="font-size: 24px;"></i>
                                                <h3><span>{{$totalView}}</span></h3>
                                                <p class="text-muted font-15 mb-0">Tổng lượt xem</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card shadow-none m-0 border-start">
                                            <div class="card-body text-center">
                                                <i class="dripicons-to-do text-muted" style="font-size: 24px;"></i>
                                                <h3><span>{{$totalDonHang}}</span></h3>
                                                <p class="text-muted font-15 mb-0">Tổng đơn hàng</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card shadow-none m-0 border-start">
                                            <div class="card-body text-center">
                                                <i class="dripicons-message text-muted" style="font-size: 24px;"></i>
                                                <h3><span>{{$totalDanhGia}}</span></h3>
                                                <p class="text-muted font-15 mb-0">Lượt đánh giá</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 order-lg-2 order-xl-1">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="p-0 text-center">Doanh thu theo ngày</h3>
                                <div id="tongdoanhthu" class="font-18" style="min-height: 400px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-12 order-xl-2">
                        <div class="card">
                            <div class="card-body dashboard-binhluan">
                                @include('admins.dashboard.partials.binhluan')
                            </div>
                        </div>
                    </div>

            </div>
                <div class="row">
                    <div class="col-xl-6 order-lg-2 order-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="p-0 text-center">Doanh thu theo loại đơn hàng</h3>
                                <div id="doanhthudonhang" class="font-18" style="min-height: 400px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 order-lg-2 order-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="p-0 text-center">Số lượng đơn hàng theo ngày</h3>
                                <div id="donhangsl" class="font-18" style="min-height: 400px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('link_js')
    <script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admin_resources/dashboard/apexcharts.js')}}"></script>
    <script src="{{asset('admin_resources/dashboard/dashboard.js')}}"></script>
    <script>
        let ngay_doanhthu = <?php echo json_encode($ngay_doanhthu);?>;
        let doanhthu_ngay = Object.values(<?php echo json_encode($data_doanhthu);?>);
        let doanhthu_donhang = Object.values(<?php echo json_encode($doanhthu_donhang);?>);
        let sl_donhang = Object.values(<?php echo json_encode($data_sldonhang);?>);

        let doanhthudonhang = {
            series: doanhthu_donhang,
            labels: ['Đơn hủy', 'Chờ duyệt', 'Đang giao', 'Đã giao'],
            yaxis: {
                show:false,
                labels: {
                    style: {
                        fontSize: '16px'
                    },
                    formatter: function (value) {
                        return value.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                    }
                },
            },
            chart: {
                type: 'polarArea',
            },
            stroke: {
                colors: ['#fff']
            },
            fill: {
                opacity: 0.8
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };
        let tongdoanhthu = {
            series: [{
                name: "Doanh thu",
                data: doanhthu_ngay,
            }],
            yaxis: {
                labels: {
                    style: {
                        fontSize: '13px'
                    },
                    formatter: function (value) {
                        return value.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                    }
                },
            },

            chart: {
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: `Doanh thu trong vòng ${ngay_doanhthu.length} ngày`,
                align: 'left',
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ngay_doanhthu,
                labels: {
                    style: {
                        fontSize: '15px'
                    },
                },
            }
        };
        let sldonhang = {
            series: [{
                name: "Sl Đơn hàng",
                data: sl_donhang,
            }],
            chart: {
                type: 'bar',
                events: {
                    click: function(chart, w, e) {
                        // console.log(chart, w, e)
                    }
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '45%',
                    distributed: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            yaxis:{
                labels: {
                    style: {
                        fontSize: '16px'
                    }
                }
            },
            xaxis: {
                categories: ngay_doanhthu,
                labels: {
                    style: {
                        fontSize: '16px'
                    }
                }
            }
        };


        let doanhthu = new ApexCharts(document.querySelector("#tongdoanhthu"), tongdoanhthu);
        doanhthu.render();
        let donhang = new ApexCharts(document.querySelector("#doanhthudonhang"), doanhthudonhang);
        donhang.render();
        let donhangsl = new ApexCharts(document.querySelector("#donhangsl"), sldonhang);
        donhangsl.render();
    </script>
@endsection

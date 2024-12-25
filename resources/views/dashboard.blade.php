@extends('admin')

@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Aini Swalayan Website</h3>
                            <div class="nk-block-des text-soft">
                                <p>Selamat Datang <b>{{ Auth::user()->name }}</b>, di Website Aini Swalayan</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt"><a href="{{ route('laporan.pembelian') }}" class="btn btn-secondary"><em class="icon ni ni-reports"></em><span>Laporan Pembelian</span></a></li>
                                        <li class="nk-block-tools-opt"><a href="{{ route('laporan.penjualan') }}" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Laporan Penjualan</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-lg-7 col-xxl-6">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group pb-3 g-2">
                                        <div class="card-title card-title-sm">
                                            <h6 class="title">Statistik Penjualan Perhari</h6>
                                            <p>Penjualan Perhari Dalam Kurun Waktu 1 Bulan</p>
                                        </div>
                                        <div class="card-tools shrink-0 d-none d-sm-block">
                                            <ul class="nav nav-switch-s2 nav-tabs bg-white">
                                                <li class="nav-item"><a href="#" class="nav-link active">1 Bulan</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nk-ck-sm">
                                        <canvas class="line-chart" id="filledLineChart-PenjualanDashboard"></canvas>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-lg-7 col-xxl-6">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title card-title-sm">
                                            <h6 class="title">Statistik 10 Barang Terlaris</h6>
                                        </div>
                                        <div class="card-tools shrink-0 d-none d-sm-block">
                                            <ul class="nav nav-switch-s2 nav-tabs bg-white">
                                                <li class="nav-item"><a href="#" class="nav-link active">1 Bulan</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nk-ck-sm">
                                        <canvas class="pie-chart" id="pieChartData-PenjualanDashboard"></canvas>
                                    </div>
                                    <div class="mt-4">
                                        <h6 class="title">Detail Barang Terlaris</h6>
                                        <ul>
                                            @foreach($topSellingItems as $item)
                                                <li>{{ $item->barang->nama_barang ?? 'Nama Barang Tidak Ditemukan' }}: {{ $item->total }} terjual</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var salesData = @json($salesData);
        var labels = Array.from({length: 31}, (_, i) => i + 1);
        var data = Array(31).fill(0);

        salesData.forEach(sale => {
            var date = new Date(sale.date);
            data[date.getDate() - 1] = sale.total;
        });

        var filledLineChart = {
            labels: labels,
            dataUnit: 'Penjualan',
            lineTension: .4,
            datasets: [{
                label: "Total Penjualan",
                color: "#9d72ff",
                background: 'rgba(157, 114, 255, 0.4)',
                data: data
            }]
        };

        function lineChart(selector, set_data) {
            var $selector = selector ? $(selector) : $('.line-chart');
            $selector.each(function () {
                var $self = $(this),
                    _self_id = $self.attr('id'),
                    _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;

                var selectCanvas = document.getElementById(_self_id).getContext("2d");
                var chart_data = [];

                for (var i = 0; i < _get_data.datasets.length; i++) {
                    chart_data.push({
                        label: _get_data.datasets[i].label,
                        tension: _get_data.lineTension,
                        backgroundColor: _get_data.datasets[i].background,
                        borderWidth: 2,
                        borderColor: _get_data.datasets[i].color,
                        pointBorderColor: _get_data.datasets[i].color,
                        pointBackgroundColor: '#fff',
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: _get_data.datasets[i].color,
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 2,
                        pointRadius: 4,
                        pointHitRadius: 4,
                        data: _get_data.datasets[i].data
                    });
                }

                var chart = new Chart(selectCanvas, {
                    type: 'line',
                    data: {
                        labels: _get_data.labels,
                        datasets: chart_data
                    },
                    options: {
                        legend: {
                            display: _get_data.legend ? _get_data.legend : false,
                            rtl: NioApp.State.isRTL,
                            labels: {
                                boxWidth: 12,
                                padding: 20,
                                fontColor: '#6783b8'
                            }
                        },
                        maintainAspectRatio: false,
                        tooltips: {
                            enabled: true,
                            rtl: NioApp.State.isRTL,
                            callbacks: {
                                title: function title(tooltipItem, data) {
                                    return data['labels'][tooltipItem[0]['index']];
                                },
                                label: function label(tooltipItem, data) {
                                    return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
                                }
                            },
                            backgroundColor: '#eff6ff',
                            titleFontSize: 13,
                            titleFontColor: '#6783b8',
                            titleMarginBottom: 6,
                            bodyFontColor: '#9eaecf',
                            bodyFontSize: 12,
                            bodySpacing: 4,
                            yPadding: 10,
                            xPadding: 10,
                            footerMarginTop: 0,
                            displayColors: false
                        },
                        scales: {
                            yAxes: [{
                                display: true,
                                position: NioApp.State.isRTL ? "right" : "left",
                                ticks: {
                                    beginAtZero: false,
                                    fontSize: 12,
                                    fontColor: '#9eaecf',
                                    padding: 10
                                },
                                gridLines: {
                                    color: NioApp.hexRGB("#526484", .2),
                                    tickMarkLength: 0,
                                    zeroLineColor: NioApp.hexRGB("#526484", .2)
                                }
                            }],
                            xAxes: [{
                                display: true,
                                ticks: {
                                    fontSize: 12,
                                    fontColor: '#9eaecf',
                                    source: 'auto',
                                    padding: 5,
                                    reverse: NioApp.State.isRTL
                                },
                                gridLines: {
                                    color: "transparent",
                                    tickMarkLength: 10,
                                    zeroLineColor: NioApp.hexRGB("#526484", .2),
                                    offsetGridLines: true
                                }
                            }]
                        }
                    }
                });
            });
        }

        lineChart('#filledLineChart-PenjualanDashboard', filledLineChart);

        var topSellingItems = @json($topSellingItems);
        var pieLabels = topSellingItems.map(item => item.barang.nama_barang ?? 'Nama Barang Tidak Ditemukan');
        var pieData = topSellingItems.map(item => item.total);

        var pieChartData = {
            labels: pieLabels,
            dataUnit: 'Penjualan',
            datasets: [{
                borderColor: "#fff",
                background: ["#9d72ff", "#5ce0aa", "#f4aaa4", "#8feac5", "#ffa9ce", "#f9db7b", "#b8acff", "#9cabff", "#ff9d72", "#72ff9d"],
                data: pieData
            }]
        };

        function pieChart(selector, set_data) {
            var $selector = selector ? $(selector) : $('.pie-chart');
            $selector.each(function () {
                var $self = $(this),
                    _self_id = $self.attr('id'),
                    _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;

                var selectCanvas = document.getElementById(_self_id).getContext("2d");
                var chart_data = [];

                for (var i = 0; i < _get_data.datasets.length; i++) {
                    chart_data.push({
                        backgroundColor: _get_data.datasets[i].background,
                        borderWidth: 2,
                        borderColor: _get_data.datasets[i].borderColor,
                        hoverBorderColor: _get_data.datasets[i].borderColor,
                        data: _get_data.datasets[i].data
                    });
                }

                var chart = new Chart(selectCanvas, {
                    type: 'pie',
                    data: {
                        labels: _get_data.labels,
                        datasets: chart_data
                    },
                    options: {
                        legend: {
                            display: _get_data.legend ? _get_data.legend : false,
                            rtl: NioApp.State.isRTL,
                            labels: {
                                boxWidth: 12,
                                padding: 20,
                                fontColor: '#6783b8'
                            }
                        },
                        rotation: -.2,
                        maintainAspectRatio: false,
                        tooltips: {
                            enabled: true,
                            rtl: NioApp.State.isRTL,
                            callbacks: {
                                title: function title(tooltipItem, data) {
                                    return data['labels'][tooltipItem[0]['index']];
                                },
                                label: function label(tooltipItem, data) {
                                    return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
                                }
                            },
                            backgroundColor: '#eff6ff',
                            titleFontSize: 13,
                            titleFontColor: '#6783b8',
                            titleMarginBottom: 6,
                            bodyFontColor: '#9eaecf',
                            bodyFontSize: 12,
                            bodySpacing: 4,
                            yPadding: 10,
                            xPadding: 10,
                            footerMarginTop: 0,
                            displayColors: false
                        }
                    }
                });
            });
        }

        pieChart('#pieChartData-PenjualanDashboard', pieChartData);
    });
</script>
@endsection

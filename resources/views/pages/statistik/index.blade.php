@extends('layouts.master')

@section('title')
    SIM-TPU Kab. Cianjur
@endsection
@section('css')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            SIM-TPU
        @endslot
        @slot('title')
            Dashboard
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-4">
            <h5>Data Makam</h5>
            2021: {{ \App\Models\Makam::whereYear('tanggal_dimakamkan', 2021)->count() }} <br>
            2020: {{ \App\Models\Makam::whereYear('tanggal_dimakamkan', 2020)->count() }} <br>
            2019: {{ \App\Models\Makam::whereYear('tanggal_dimakamkan', 2019)->count() }}
        </div>
        <div class="col-lg-4">
            <h5>Data Retribusi</h5>
            @php
                $duasatu = \App\Models\Retribusi::with('registrasi.makam')
                    ->whereHas('registrasi.makam', function ($q) {
                        // Query the name field in status table
                        $q->whereYear('tanggal_meninggal', '=', 2021); // '=' is optional
                    })
                    ->sum('nominal');
                $duapuluh = \App\Models\Retribusi::with('registrasi.makam')
                    ->whereHas('registrasi.makam', function ($q) {
                        // Query the name field in status table
                        $q->whereYear('tanggal_meninggal', '=', 2020); // '=' is optional
                    })
                    ->sum('nominal');
                $sembilanbelas = \App\Models\Retribusi::with('registrasi.makam')
                    ->whereHas('registrasi.makam', function ($q) {
                        // Query the name field in status table
                        $q->whereYear('tanggal_meninggal', '=', 2019); // '=' is optional
                    })
                    ->sum('nominal');
            @endphp
            2021: Rp{{ number_format($duasatu, '2', ',', '.') }} <br>
            2020: Rp{{ number_format($duapuluh, '2', ',', '.') }} <br>
            2019: Rp{{ number_format($sembilanbelas, '2', ',', '.') }} <br>
        </div>
        <div class="col-lg-4">
            <h5>Data Herregistrasi</h5>
            @php
                $duadua = \App\Models\Herregistrasi::whereYear('tahun', 2022)->sum('nominal');
                $duadua_bayar = \App\Models\Herregistrasi::whereYear('tahun', 2022)
                    ->where('status', 'Sudah Bayar')
                    ->count();
                $duadua_belum = \App\Models\Herregistrasi::whereYear('tahun', 2022)
                    ->where('status', 'Belum Bayar')
                    ->count();

                $duasatu = \App\Models\Herregistrasi::whereYear('tahun', 2021)->sum('nominal');
                $duasatu_bayar = \App\Models\Herregistrasi::whereYear('tahun', 2021)
                    ->where('status', 'Sudah Bayar')
                    ->count();
                $duasatu_belum = \App\Models\Herregistrasi::whereYear('tahun', 2021)
                    ->where('status', 'Belum Bayar')
                    ->count();

                $duapuluh = \App\Models\Herregistrasi::whereYear('tahun', 2020)->sum('nominal');
                $duapuluh_bayar = \App\Models\Herregistrasi::whereYear('tahun', 2020)
                    ->where('status', 'Sudah Bayar')
                    ->count();
                $duapuluh_belum = \App\Models\Herregistrasi::whereYear('tahun', 2020)
                    ->where('status', 'Belum Bayar')
                    ->count();

            @endphp
            2022: Total Rp{{ number_format($duadua, '2', ',', '.') }} Sudah Bayar: {{ $duadua_bayar }} Belum Bayar:
            {{ $duadua_belum }} <br>
            2021: Total Rp{{ number_format($duasatu, '2', ',', '.') }} Sudah Bayar: {{ $duasatu_bayar }} Belum Bayar:
            {{ $duasatu_belum }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data TPU</h4>
                    <div id="chart" data-colors='["--bs-success"]' class="apex-charts" dir="ltr"></div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pembayaran Retribusi</h4>
                    <div id="Linechart1" data-colors='["--bs-success"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pembayaran Herregistrasi</h4>
                    <div id="Linechart" data-colors='["--bs-success"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script charset="utf-8" src="https://cdn.jsdelivr.net/npm/echarts@5.1.2/dist/echarts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                name: 'Jumlah Makam',
                data: [
                    {{ \App\Models\Makam::where('nama_tpu', 'Cikareo')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Cunangala')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Nona Manis')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Pamoyanan')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Paragajen')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Pasarean Agung')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Pasir Gombong')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Pasir Langkap')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Pasir Sereh')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Sarongge')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Sirnalaya I')->count() }},
                    {{ \App\Models\Makam::where('nama_tpu', 'Sirnalaya II')->count() }},
                ]
            }],
            chart: {
                type: 'bar',
                height: 500
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: true
            },
            xaxis: {
                categories: [
                    "Cikareo",
                    "Cunangala",
                    "Nona Manis",
                    "Pamoyanan",
                    "Paragajen",
                    "Pasarean Agung",
                    "Pasir Gombong",
                    "Pasir Langkap",
                    "Pasir Sereh",
                    "Sarongge",
                    "Sirnalaya I",
                    "Sirnalaya II",
                ],
            }
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [{
                    name: "Total",
                    data: [
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2019)->sum('nominal') }},
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2020)->sum('nominal') }},
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2021)->sum('nominal') }},
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2022)->sum('nominal') }},
                    ]
                },
                {
                    name: "Belum Bayar",
                    data: [
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2019)->where('status', 'Belum Bayar')->sum('nominal') }},
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2020)->where('status', 'Belum Bayar')->sum('nominal') }},
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2021)->where('status', 'Belum Bayar')->sum('nominal') }},
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2022)->where('status', 'Belum Bayar')->sum('nominal') }},
                    ]
                },
                {
                    name: "Sudah Bayar",
                    data: [
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2019)->where('status', 'Sudah Bayar')->sum('nominal') }},
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2020)->where('status', 'Sudah Bayar')->sum('nominal') }},
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2021)->where('status', 'Sudah Bayar')->sum('nominal') }},
                        {{ \App\Models\Herregistrasi::whereYear('tahun', 2022)->where('status', 'Sudah Bayar')->sum('nominal') }},
                    ]
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Data Pertahun',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['2019', '2020', '2021', '2022'],
            },
            yaxis: {
                title: {
                    text: 'Rupiah',
                },

            },
        };

        var chart = new ApexCharts(document.querySelector("#Linechart"), options);
        chart.render();
    </script>
     <script>
        var options = {
            series: [{
                    name: "Total",
                    data: [
                        {{ \App\Models\Retribusi::with('registrasi.makam')
                            ->whereHas('registrasi.makam', function ($q) {
                                // Query the name field in status table
                                $q->whereYear('tanggal_meninggal', '=', 2019); // '=' is optional
                            })
                            ->sum('nominal')
                        }},
                        {{ \App\Models\Retribusi::with('registrasi.makam')
                            ->whereHas('registrasi.makam', function ($q) {
                                // Query the name field in status table
                                $q->whereYear('tanggal_meninggal', '=', 2020); // '=' is optional
                            })
                            ->sum('nominal')
                        }},
                        {{ \App\Models\Retribusi::with('registrasi.makam')
                            ->whereHas('registrasi.makam', function ($q) {
                                // Query the name field in status table
                                $q->whereYear('tanggal_meninggal', '=', 2021); // '=' is optional
                            })
                            ->sum('nominal')
                        }},
                        {{ \App\Models\Retribusi::with('registrasi.makam')
                            ->whereHas('registrasi.makam', function ($q) {
                                // Query the name field in status table
                                $q->whereYear('tanggal_meninggal', '=', 2022); // '=' is optional
                            })
                            ->sum('nominal')
                        }},

                    ]
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Data Pertahun',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['2019', '2020', '2021', '2022'],
            },
            yaxis: {
                title: {
                    text: 'Rupiah',
                },

            },
        };

        var chart = new ApexCharts(document.querySelector("#Linechart1"), options);
        chart.render();
    </script>
@endsection

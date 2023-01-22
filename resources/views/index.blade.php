@extends('layouts.master')

@section('title') SIM-TPU Kab. Cianjur @endsection
@section('css')
<style>

</style>
@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') SIM-TPU @endslot
        @slot('title') Dashboard @endslot
    @endcomponent
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Total Retribusi</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>Rp{{number_format($retribusi,'2',',','.')}}<i class="mdi {{ $persentase > 0 ? 'mdi-chevron-up ms-1 text-success' : 'mdi-chevron-down ms-1 text-danger' }}"></i></h4>
                            <div class="d-flex">
                                <span class="badge {{ $persentase > 0 ? 'badge-soft-success' : 'badge-soft-danger' }} font-size-12">{{ $persentase > 0 ? '+' : '' }}{{ number_format($persentase*100) }}% </span> <span class="ms-2 text-truncate">dari tahun sebelumnya</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Herregistrasi</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>Rp{{number_format($herregistrasi,'2',',','.')}} <i class="mdi {{ $persentaseHerr > 0 ? 'mdi-chevron-up ms-1 text-success' : 'mdi-chevron-down ms-1 text-danger' }}"></i></h4>
                            <div class="d-flex">
                                <span class="badge {{ $persentaseHerr > 0 ? 'badge-soft-success' : 'badge-soft-danger' }} font-size-12">{{ $persentaseHerr > 0 ? '+' : '' }}{{ number_format($persentaseHerr*100) }}% </span> <span class="ms-2 text-truncate">dari tahun sebelumnya</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Makam</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{$makam->count()}}<i class="mdi {{ $persentaseMakam > 0 ? 'mdi-chevron-up ms-1 text-success' : 'mdi-chevron-down ms-1 text-danger' }}"></i></h4>
                            <div class="d-flex">
                                <span class="badge {{ $persentaseMakam > 0 ? 'badge-soft-success' : 'badge-soft-danger' }} font-size-12">{{ $persentaseMakam > 0 ? '+' : '' }}{{ number_format($persentaseMakam*100) }}%</span> <span class="ms-2 text-truncate">Dari tahun sebelumnya</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        {{ \App\Models\Herregistrasi::whereYear('tahun', \Carbon\Carbon::now()->subYear(1)->format('Y'))->where('status', 'Pembayaran Telah Diverifikas')->sum('nominal') }},
                        {{ \App\Models\Herregistrasi::whereYear('tahun', \Carbon\Carbon::now()->year)->where('status', 'Pembayaran Telah Diverifikasi')->sum('nominal') }},
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
                categories: ['{{\Carbon\Carbon::now()->subYear(3)->format('Y')}}', '{{\Carbon\Carbon::now()->subYear(2)->format('Y')}}', '{{\Carbon\Carbon::now()->subYear(1)->format('Y')}}', '{{\Carbon\Carbon::now()->year}}'],
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
                                $q->whereYear('tanggal_meninggal', '=', \Carbon\Carbon::now()->year); // '=' is optional
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
                categories: ['{{\Carbon\Carbon::now()->subYear(3)->format('Y')}}', '{{\Carbon\Carbon::now()->subYear(2)->format('Y')}}', '{{\Carbon\Carbon::now()->subYear(1)->format('Y')}}', '{{\Carbon\Carbon::now()->year}}'],
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

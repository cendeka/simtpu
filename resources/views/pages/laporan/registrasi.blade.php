@extends('layouts.master')

@section('title')
    Laporan
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Laporan
        @endslot
        @slot('title')
            Registrasi Pemakaman
        @endslot
    @endcomponent
    <h1>Laporan</h1>
    <form action="">
        <select name="tahun" id="">
            <option value="">Pilih Tahun</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
        </select>
        <select name="bulan" id="">
            <option value="">Pilih Bulan</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
        <button type="submit">Lihat</button>
    </form>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1><i class="fas fa-file-excel "></i></h1>
                <p>Laporan Registrasi Pemakaman Bulan {{ request()->get('bulan') ?? '' }} Tahun {{ request()->get('tahun') ?? '' }} </p>
            </div>
            <div class="col-12 text-center">
                @if (!$data->isEmpty())
                    <button class="btn btn-sm btn-success"
                        onclick="location.href='registrasi/download?tahun={{ request()->get('tahun') ?? '' }}&bulan={{ request()->get('bulan') ?? '' }}'">
                        Download</button>
                @else
                    <button disabled="disabled" class="btn btn-sm btn-danger">Tidak Tersedia</button>
                @endif
            </div>
        </div>
    </div>
    <br>
@endsection
@section('script')
@endsection

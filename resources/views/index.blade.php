@extends('layouts.master')

@section('title') SIM-TPU Kab. Cianjur @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') SIM-TPU @endslot
        @slot('title') Dashboard @endslot
    @endcomponent
<p>Jumlah Retribusi: {{$retribusi}}</p>
<p>Jumlah Registrasi Pemakaman: {{$registrasi->count()}}</p>
<p>Jumlah Makam: {{$makam->count()}}</p>
<p>Jumlah Registrasi tahun 2021: {{$subTahun1}}</p>
<p>Jumlah Registrasi tahun 2020: {{$subTahun2}}</p>
<p>Jumlah Registrasi tahun 2019: {{$subTahun3}}</p>

@endsection

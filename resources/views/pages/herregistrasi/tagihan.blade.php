@extends('layouts.master')

@section('title')
    Registrasi Pemakaman
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pemakaman
        @endslot
        @slot('title')
            Registrasi
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-4">
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Pilih Tahun<i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('registrasi')}}?tahun=2021">2021</a>
                        <a class="dropdown-item" href="{{route('registrasi')}}?tahun=2020">2020</a>
                        <a class="dropdown-item" href="{{route('registrasi')}}?tahun=2019">2019</a>
                    </div>
            </div>
            <button class="btn  btn-primary" data-bs-toggle="modal" data-bs-target=".modal-upload">Import data</button>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

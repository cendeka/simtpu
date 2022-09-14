@extends('layouts.master')

@section('title')
Konfigurasi Siste
@endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('li_1')
        Konfigurasi
    @endslot
    @slot('title')
        Konfigurasi Sistem
    @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("konfig.store") }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="konfig">Name</label>
                        <input type="text" name="konfig" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="properties">Properties</label>
                        <div class="col">
                            <input type="text" name="properties[0][kode_rekening]" class="form-control" placeholder="Kode Rekening">
                        </div>
                        <div class="col">
                            <input type="text" name="properties[0][uraian]" class="form-control" placeholder="Uraian">
                        </div>
                        <div class="col">
                            <input type="number" name="properties[0][nominal]" class="form-control" placeholder="Nominal">
                        </div>
                    </div>
                    <div>
                        <input class=" btn btn-danger" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Jenis</th>
                            <th>Kode Rekening</th>
                            <th>Uraian</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $value)
                        @foreach($value->properties as $p)
                        <tr>
                            <td>{{$value->konfig}}</td>
                            <td>{{$p['kode_rekening']}}</td>
                            <td>{{$p['uraian']}}</td>
                            <td>{{$p['nominal']}}</td>
                        </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection

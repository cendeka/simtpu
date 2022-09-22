@extends('layouts.master')

@section('title')
Konfigurasi
@endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('li_1')
        Konfigurasi
    @endslot
    @slot('title')
        Konfigurasi Retribusi
    @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("konfig.store") }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="konfig">Nama</label>
                        <input type="text" name="konfig" class="form-control" placeholder="Nama Item">
                    </div>
                    <label for="properties">Properties</label>
                    <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <input type="text" name="properties[0][kode_rekening]" class="form-control" placeholder="Kode Rekening">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <input type="text" name="properties[0][uraian]" class="form-control" placeholder="Uraian">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                <input type="number" name="properties[0][nominal]" class="form-control" placeholder="Nominal">
                                </div>
                            </div>
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>Kode Rekening</th>
            <th>Uraian</th>
            <th>Nominal</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
      @foreach($data as $value)
      @foreach($value->properties as $p)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$value->konfig}}</td>
        <td>{{$p['kode_rekening']}}</td>
        <td>{{$p['uraian']}}</td>
        <td>Rp{{ number_format($p['nominal'],'2',',','.') }}</td>
        <td><div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="" id="editData" data-toggle="modal" data-target='#editModal' data-id="{{ $value->id }}">Ubah</a>
                    <a class="dropdown-item btn-hapus" href="">Hapus</a>
                </div>
            </div>
        </td>
      </tr>
      @endforeach
      @endforeach
    </tbody>
</table>
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
       <form id="konfigData">
            <div class="modal-content">
            <input type="text" id="id" name="id" value="">
            <div class="modal-body">
            </div>
            <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
        </div>
       </form>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            ordering: true,
            info: true,
            buttons: [{
                    extend: 'copyHtml5',
                    className: 'btn btn-dark',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'excelHtml5',
                    className: 'btn btn-dark',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-dark',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    className: 'btn btn-dark',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
            ]
        });
        $('#datatable_filter input').addClass('form-control form-control-sm'); // <-- add this line
        $('#datatable_filter label').addClass('text-muted'); // <-- add this line
    });
</script>
<script>
    
$(document).ready(function () {

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

$('body').on('click', '#editData', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    $('#id').val(id);
    $.get('konfigurasi/' + id + '/edit', function (data) {
        data.forEach(function(e))
     })
});

}); 
</script>
@endsection

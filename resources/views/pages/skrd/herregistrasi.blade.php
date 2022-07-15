@extends('layouts.master')

@section('title')
    Herregistrasi Pemakaman
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
        Herregistrasi
        @endslot
        @slot('title')
        Herregistrasi Pemakaman
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Orang yang Meninggal</th>
                                <th>Tahun Meninggal</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                     <td>{{ $item->nama_meninggal }}</td>
                                     <td>{{date('Y',strtotime($item->makam->tanggal_dimakamkan))}}</td>
                                    <td>
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Detail</a>
                                                <a href="#" class="dropdown-item" href="javascript:void(0)" onclick="tambah({{$item->id}})">Buat Tagihan</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Tagihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('herregistrasi.store')}}" method="POST">
                        @csrf
                      <div class="row">
                        <div class="col">
                            <input type="hidden" name="registrasi_id" id="registrasi_id">
                            <input type="hidden" name="herrID" id="herrID">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal">
                            <label for="masa">Masa</label>
                            <input type="text" class="form-control" name="masa" id="masa" placeholder="Masa">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                               <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                   Simpan
                               </button>
                        </div>
                      </div>
                      </form>
                      <br>
                      <div class="row">
                        <h3>History</h3>
                        <div class="col">
                            <table id="history" class="table table-bordered dt-responsive nowrap w-100">
                                <tr>
                                    <th>Masa</th>
                                    <th>Tahun</th>
                                    <th>Nominal</th>
                                </tr>
                            </table>
                        </div>
                      </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
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
        function tambah(id) {
            var array = [];
            var rows  = $("#history tbody tr");
            $.ajax({
                type: "POST",
                url: "{{route('skrd.herregistrasi')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $.each(res, function(k, v) {
                        $('#modal-tambah').modal('show');
                        $('#registrasi_id').val(v.id);
                       $.each(v.herregistrasi, function(index, row) {
                        let tableBody = document.getElementById("history");
                        tableBody.innerHTML += '<tr><td>' + row.masa + '</td><td>' + row.tahun + '</td><td>' + row.nominal + '</td></tr>';
                       });
                    });
                }
            });
        }
    </script>
@endsection

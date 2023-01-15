@extends('layouts.master')

@section('title')
Data Makam
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}"
    rel="stylesheet" type="text/css" />
<style>
    select.form-control {
        display: inline;
        width: 200px;
        height: ;
        margin-left: 25px;
    }

</style>
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('li_1')
        Makam
    @endslot
    @slot('title')
        Data Makam
    @endslot
@endcomponent
<div class="row">
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="margin-bottom: 10px;">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah
                    </button>
                </div>
                <div class="category-filter">
                    <select id="categoryFilter" class="form-control">
                        <option value="">Lihat Semua</option>
                        <option value="Cikareo">Cikareo</option>
                        <option value="Cunangala">Cunangala</option>
                        <option value="Pamoyanan">Pamoyanan</option>
                        <option value="Paragajen">Paragajen</option>
                        <option value="Pasarean Agung">Pasarean Agung</option>
                        <option value="Pasir Gombong">Pasir Gombong</option>
                        <option value="Pasir Langkap">Pasir Langkap</option>
                        <option value="Pasir Sereh">Pasir Sereh</option>
                        <option value="Sarongge">Sarongge</option>
                        <option value="Sirnalaya I">Sirnalaya I</option>
                        <option value="Sirnalaya II">Sirnalaya II</option>

                    </select>
                </div>
                <table id="makamTable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Makam</th>
                            <th>Tahun Dimakamkan</th>
                            <th>TPU</th>
                            <th>Blok</th>
                            <th>Kode Registrasi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->registrasi->nama_meninggal ?? '' }}</td>
                                <td>{{ date('Y', strtotime($item->tanggal_dimakamkan)) }}</td>
                                <td>{{ $item->nama_tpu }} </td>
                                <td>{{ $item->registrasi->kode_registrasi ?? '' }}</td>
                                <td>Blok {{ $item->blok_tpu }} - {{ $item->nomor_tpu }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">Opsi <i
                                                class="mdi mdi-chevron-down"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="makam/detail?registrasi_id={{ $item->registrasi->id ?? '' }}">Detail
                                                Makam</a>
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
<div class="row">
    <div class="col">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Existing Makam</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('registrasi.store') }}" method="POST"
                            class="needs-validation" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="mb-3 position-relative">
                                        <label for="nama_meninggal">Nama Makam</label>
                                        <input type="text" class="form-control" id="nama_meninggal"
                                            name="nama_meninggal" placeholder="Nama Makam" value="" required>
                                        <div class="invalid-tooltip">
                                            Nama Makam Wajib Diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="tanggal_meninggal">Tanggal Meninggal</label>
                                        <input type="date" class="form-control" id="tanggal_meninggal"
                                            name="tanggal_meninggal" placeholder="Tanggal Meninggal" value="" required>
                                        <input type="hidden" class="form-control" id="tanggal_dimakamkan"
                                            name="tanggal_dimakamkan" placeholder="Tanggal Meninggal" value="">
                                        <div class="invalid-tooltip">
                                            Tanggal Meninggal Wajib Diisi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nama">Nama Ahliwaris</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Nama Ahli Waris" value="" required>
                                        <div class="invalid-tooltip">
                                            Nama Ahli Waris Wajib Diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="alamat1">Alamat Ahliwaris</label>
                                        <input type="text" class="form-control" id="alamat1" name="alamat1"
                                            placeholder="Alamat Ahli Waris" value="" required>
                                        <div class="invalid-tooltip">
                                            Alamat Ahli Waris Wajib Diisi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="nama_tpu">Nama TPU</label>
                                        {{-- <input type="text" class="form-control" id="nama_tpu" name="nama_tpu"
                                            placeholder="Nama TPU" value=""> --}}
                                        <select class="form-control" name="nama_tpu" id="nama_tpu" required>
                                            <option value="">Pilih Nama TPU</option>
                                            @foreach($tpu as $item)
                                                <option value="{{ $item->nama_tpu }}">{{ $item->nama_tpu }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip">
                                            TPU Wajib Diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="blok_tpu">Blok</label>
                                        {{-- <input type="text" class="form-control" id="blok_tpu" name="blok_tpu"
                                            placeholder="Blok Makam" value=""> --}}
                                        <select class="form-control" name="blok_tpu" id="blok_tpu" required>
                                            <option value="">Pilih Blok</option>
                                            <option value="A">Blok A</option>
                                            <option value="B">Blok B</option>
                                            <option value="C">Blok C</option>
                                            <option value="D">Blok D</option>
                                            <option value="E">Blok E</option>
                                            <option value="F">Blok F</option>
                                        </select>
                                        <div class="invalid-tooltip">
                                            Blok Makam Wajib Diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="nomor_tpu">Nomor</label>
                                        <input type="text" class="form-control" id="nomor_tpu" name="nomor_tpu"
                                            placeholder="Nomor Makam" value="" required>
                                        <div class="invalid-tooltip">
                                            Nomor Makam Wajib Diisi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5>Luas Lahan</h5>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="luas_lahan1">Panjang</label>
                                        <input type="number" step=0.1 class="form-control" id="luas_lahan1"
                                            name="luas_lahan1" placeholder="P" value="" required>
                                        <div class="invalid-tooltip">
                                            Panjang Makam Wajib Diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="luas_lahan2">Lebar</label>
                                        <input type="number" step=0.1 class="form-control" id="luas_lahan2"
                                            name="luas_lahan2" placeholder="L" value="" required>
                                        <div class="invalid-tooltip">
                                            Lebar Makam Wajib Diisi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
<script>
    $("document").ready(function () {

        $("#makamTable").dataTable({
            "searching": true
        });

        //Get a reference to the new datatable
        var table = $('#makamTable').DataTable();

        //Take the category filter drop down and append it to the datatables_filter div.
        //You can use this same idea to move the filter anywhere withing the datatable that you want.
        $("#makamTable_filter.dataTables_filter").append($("#categoryFilter"));

        //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
        //This tells datatables what column to filter on when a user selects a value from the dropdown.
        //It's important that the text used here (Category) is the same for used in the header of the column to filter
        var categoryIndex = 0;
        $("#makamTable th").each(function (i) {
            if ($($(this)).html() == "TPU") {
                categoryIndex = i;
                return false;
            }
        });

        //Use the built in datatables API to filter the existing rows by the Category column
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var selectedItem = $('#categoryFilter').val()
                var category = data[categoryIndex];
                if (selectedItem === "" || category.includes(selectedItem)) {
                    return true;
                }
                return false;
            }
        );

        //Set the change event for the Category Filter dropdown to redraw the datatable each time
        //a user selects a new filter.
        $("#categoryFilter").change(function (e) {
            table.draw();
        });

        table.draw();
    });

</script>
<script>
    $('#tanggal_meninggal').on('change', function () {
        var tm = $(this).val();
        $("#tanggal_dimakamkan").val(tm);
        // console.log(tm);
    });

</script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            ordering: true,
            info: true,
            paging: true,
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
@endsection

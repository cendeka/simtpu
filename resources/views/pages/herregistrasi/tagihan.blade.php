@extends('layouts.master')

@section('title')
    Tagihan Herregistrasi Pemakaman
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Herregistrasi
        @endslot
        @slot('title')
            Tagihan
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="verticalnav-firstname-input">Tahun</label>
                                    {{-- <input class="form-control" type="text" name="tahun" placeholder="Tahun" value="{{ Request::get('tahun') }}"> --}}
                                    <select class="form-control" name="tahun" id="tahun">
                                        <option value="{{request()->get('tahun') ?? ''}}" selected>{{request()->get('tahun') ?? 'Tahun'}}</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="verticalnav-lastname-input">Bulan</label>
                                    {{-- <input class="form-control" type="text" name="masa" placeholder="Masa" value="{{ Request::get('masa') }}"> --}}
                                    <select class="form-control" name="masa" id="">
                                        <option value="{{request()->get('masa') ?? ''}}" selected>{{request()->get('masa') ?? 'Bulan'}}</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="verticalnav-lastname-input">Status</label>
                                    {{-- <input class="form-control" type="text" name="status" placeholder="Status" value="{{ Request::get('status') }}"> --}}
                                    <select class="form-control" name="status" id="">
                                        <option value="{{request()->get('status') ?? ''}}" selected>{{request()->get('status') ?? 'Status Pembayaran'}}</option>
                                        <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                        <option value="Pembayaran Selesai">Pembayaran Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-success btn-sm" type="submit" value="Cari">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Meninggal</th>
                                <th>TPU</th>
                                <th>Nominal</th>
                                <th>Bulan</th>
                                <th>Status</th>
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
                                    <td>
                                        @foreach ($item->registrasi as $register)
                                            {{ $register->nama_meninggal }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($item->registrasi as $register)
                                            {{ $register->makam->nama_tpu }}
                                        @endforeach
                                    </td>
                                    <td>{{ $item->nominal }}</td>
                                    <td>{{ $item->masa }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">Opsi <i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a href="#" id="detail" class="dropdown-item"
                                                    href="javascript:void(0)"
                                                    onclick="detail({{ $item->id }})">Detail</a>
                                                <a href="#" class="dropdown-item" href="javascript:void(0)"
                                                    onclick="tambah({{ $item->id }})">Buat Tagihan</a>
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
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        @if ($errors->any())
            Swal.fire({
                title: 'Error!',
                html: '{!! implode('', $errors->all('<div>:message</div>')) !!}',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        @endif
        @if (session()->has('message'))
            swal.fire({
                title: 'Simpan Data',
                text: '{{ session('message') }}',
                icon: 'success',
                timer: 3000,
            });
        @endif
    </script>
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
@endsection

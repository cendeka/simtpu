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
            @if (request()->all() != null)
                {{ request()->get('tahun') }}
            @else
                {{ \Carbon\Carbon::now()->year }}
            @endif
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
                                        <option value="{{ request()->get('tahun') ?? '' }}" selected>
                                            {{ request()->get('tahun') ?? 'Tahun' }}</option>
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
                                    <select class="form-control" name="bulan" id="">
                                        <option value="{{ request()->get('bulan') ?? '' }}" selected>
                                            {{ request()->get('bulan') ?? 'Bulan' }}</option>
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
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="verticalnav-lastname-input">Status</label>
                                    {{-- <input class="form-control" type="text" name="status" placeholder="Status" value="{{ Request::get('status') }}"> --}}
                                    <select class="form-control" name="status" id="">
                                        <option value="{{ request()->get('status') ?? '' }}" selected>
                                            {{ request()->get('status') ?? 'Status Pembayaran' }}</option>
                                        <option value="Belum Bayar">Belum Bayar</option>
                                        <option value="Sudah Bayar">Sudah Bayar</option>
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
                                    <td>Rp{{ number_format($item->nominal, '2', ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tahun)->format('F') }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <button class="btn btn-success" style="{{$item->status == "Belum Bayar" ? 'display: none;' : '' }}" data-bs-toggle="modal"
                                            data-bs-target="#modal-verif{{ $item->id }}"><i
                                                class="fa fa-check"></i>Verifikasi</button>
                                        <button style="{{$item->status == "Sudah Bayar" ? 'display: none;' : '' }}" onclick="tambah({{ $item->id }})" type="button"
                                            class="btn btn-primary waves-effect waves-light">
                                            <i class="bx bx-money  font-size-16 align-middle me-2"></i> Bayar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col">
            <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel">Bayar Tagihan: <span id="inv"></span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('pembayaran.store') }}" method="POST">
                                @csrf
                                <h5>Jumlah Tagihan: <span id="jumlah"></span></h5>
                                <input type="hidden" name="no_inv" id="no_inv">
                                <input type="hidden" name="registrasi_id" id="registrasi_id">
                                <input type="text" name="herrID" id="herrID">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="nominal">Uraian</label>
                                            <input type="text" class="form-control" name="uraian" id="uraian"
                                                placeholder="Uraian">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="nominal">Nominal</label>
                                            <input type="text" class="form-control" name="nominal" id="nominal"
                                                placeholder="Nominal">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="nominal">Tanggal</label>
                                            <input type="date" class="form-control" name="tanggal" id="tanggal"
                                                placeholder="Tanggal">
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                        Simpan
                                    </button>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <div class="col">
            @foreach ($data as $d)
            <div class="modal modal-blur fade" id="modal-verif{{ $d->id }}" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Verifikasi Data Registrasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="{{ route('pembayaran.verif') }}" method="POST">
                                            @csrf
                                         <input type="text" name="pembayaranId" value="{{$d->pembayaran->id ?? 0}}">
                                         <input class="form-check-input" type="checkbox" id="verifikasi" name="verifikasi"
                                            value="1" checked="">
                                        <label class="form-check-label" for="verifikasi">
                                            Data Telah Sesuai
                                        </label>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-success">Kirim</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div> <!-- end row -->

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        function tambah(id) {
            $.ajax({
                type: "GET",
                url: "{{ route('herregistrasi.get') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $.each(res, function(k, v) {
                        $('#modal-tambah').modal('show');
                        $('#jumlah').text(v.nominal);
                        $('#inv').text(v.no_inv);
                        $('#no_inv').val(v.no_inv);
                        $('#registrasi_id').val(v.registrasi_id);
                        $('#herrID').val(v.id);
                    });
                }
            });
        }
    </script>
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

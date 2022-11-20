@extends('layouts.master')

@section('title')
    Herregistrasi Pemakaman
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

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
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="width: 50px !important;">Makam</th>
                                <th>TPU</th>
                                <th>Meninggal</th>
                                <th>Herregistrasi Terkahir</th>
                                <th>Herregistrasi Selanjutnya</th>
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
                                    <td>{{ $item->nama_meninggal ?? ''}}</td>
                                    <td>{{$item->makam->nama_tpu ?? ''}}</td>
                                    <td>{{ date('m-Y', strtotime($item->makam->tanggal_dimakamkan ?? '')) }}</td>
                                    <td>
                                       @if ($item->herregistrasi->isNotEmpty())
                                           @foreach ($item->herregistrasi as $herregistrasi)
                                            @if ($loop->last)
                                                <span class="badge bg-success" title="Tagihan terakhir">{{ \Carbon\Carbon::parse($herregistrasi->tahun ?? '')->format('m-Y') }}</span>
                                            @endif
                                           @endforeach
                                       @else
                                       <span class="badge bg-danger" title="Tagihan belum dibuat">{{ \Carbon\Carbon::parse($item->makam->tanggal_dimakamkan ?? '')->addYears(2)->format('m-Y') }}</span>
                                       @endif
                                    </td>
                                    <td>
                                        @foreach ($item->herregistrasi as $herregistrasi)
                                            @if ($loop->last)
                                                <span class="badge bg-info" title="Tagihan belum dibuat">{{ \Carbon\Carbon::parse($herregistrasi->tahun ?? '')->addYears(2)->format('m-Y') }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn btn-sm">
                                            <a href="/makam/detail?registrasi_id={{$item->id}}#pembayaran" id="detail"> <i class="fa fa-eye"></i></a>
                                        </button>
                                        <button class="btn btn-sm">
                                            <a href="javascript:void(0)" onclick="tambah({{ $item->id }})"> <i class="fa fa-edit"></i></a>
                                        </button>
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
            <div class="modal fade" id="modal-tambah" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">Tambah Tagihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('herregistrasi.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="registrasi_id" id="registrasi_id">
                            <input type="hidden" name="herrID" id="herrID">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Rincian Herregistrasi</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <select class="form-control" name="" id="retribusi">
                                            <option value="">Pilih Retribusi</option>
                                            @foreach ($konfig as $value)
                                                @foreach ($value->properties as $p)
                                                    <option value="{{ json_encode($p) }}">{{ $p['uraian'] }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="retribusi">
                                    <table class="table table-bordered" id="dynamicAddRemove">
                                        <tr>
                                            <td>
                                                    <input type="text" name="properties[0][korek]" id="korek0" class="form-control" value="{{ old('properties[0][korek]') }}" readonly>
                                            </td>
                                            <td>
                                                    <input type="text" name="properties[0][uraian]" id="uraian0" class="form-control" value="{{ old('properties[0][uraian]') }}" readonly>
                                            </td>
                                            <td>
                                                    <input type="text" name="properties[0][nominal]" id="nominal0" class="form-control input-mask text-start" value="{{ old('properties[0][nominal]') }}" readonly>
                                            </td>
                                            <td>
                                                    <button type="button" name="add" id="dynamic-ar"
                                                        class="btn btn-outline-primary">Tambah</button>
                                            </td>
                                        </tr>
                                    </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="nominal">Tanggal</label>
                                        <input type="date" class="form-control" name="tahun" id="tahun"
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
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>
    <script>
          var i = 0;
        var retribusi;
        var ret;

        $('#retribusi').on('change', function() {
            var retribusi = $(this).val();
            var ret = jQuery.parseJSON(retribusi);
            $("#korek" + i).val(ret.kode_rekening);
            $("#uraian" + i).val(ret.uraian);
            $("#nominal" + i).val(ret.nominal);
            // console.log(ret.nominal);
        });
        $("#dynamic-ar").click(function() {
                ++i;
                $("#dynamicAddRemove").append('<tr><td><input readonly type="text" id="korek'+i+'" name="properties[' + i +
                    '][korek]" placeholder="Kode Rekening" class="form-control" /></td><td><input readonly type="text" name="properties[' +
                    i +
                    '][uraian]" placeholder="Uraian" id="uraian'+i+'" class="form-control" id="uraian"' + i +
                    ' /></td><td><input readonly name="properties[' +
                    i +
                    '][nominal]" placeholder="Nominal"  class="form-control input-mask text-start" id="nominal' + i +
                    '" /></td><input type="hidden" name="retribusi[' +
                    i +
                    '][id]" placeholder="Nominal" class="form-control" /><td><button type="button" class="btn btn-outline-danger remove-input-field">Hapus</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-field', function() {
                $(this).parents('tr').remove();
        });

    </script>
    <script>
$(document).on('change', function() {
            $(".input-mask").inputmask({
                alias: 'numeric',
                groupSeparator: '.',
                radixPoint: ',',
                autoGroup: true,
                prefix: ' Rp',
                placeholder: '0',
                autoUnmask: true,
                removeMaskOnSubmit: true
            });
        });
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
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-dark',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-dark',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
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
            $('#modal-tambah').modal('show');
            $.ajax({
                type: "POST",
                url: "{{ route('skrd.herregistrasi') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $.each(res, function(k, v) {
                        $('#registrasi_id').val(v.id);
                    });
                }
            });
        }
    </script>
    <script>
        $('#retribusi').on('change', function() {
            var retribusi = $(this).val();
            var ret = jQuery.parseJSON(retribusi);
            $("#nominal").val(ret.nominal);
            // console.log(ret.nominal);
        });
    </script>
@endsection

@extends('layouts.master')

@section('title')
    Form Data Registrasi
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Form
        @endslot
        @slot('title')
            Data Registrasi
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('registrasi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" id="regId" name="regId">
                        <input type="hidden" id="awID" name="awID">
                        <input type="hidden" id="makamID" name="makamID">
                        <input type="hidden" id="retriID" name="retriID">
                        <div>
                            <!-- data ahli waris -->
                            @php
                                echo $data->verifikasi;
                            @endphp
                            <h3>Ahli Waris<i class="{{ $data->verifikasi == 'TRUE' ? 'text-success' : 'text-danger' }} bx bx-badge-check "></i>
                            </h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Nama">
                                        @error('nama')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Nomor Induk Kependudukan (NIK)</label>
                                        <input type="text" class="form-control" id="nik1" name="nik1"
                                            placeholder="Nomor Induk Kependudukan">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-phoneno-input">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir1" name="tempat_lahir1"
                                            placeholder="Kabupaten/Kota Tempat Lahir">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir1" name="tanggal_lahir1"
                                            placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Jenis Kelamin</label>
                                        <select name="jenis_kelamin1" id="jenis_kelamin1" class="form-control">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Agama</label>
                                        <input type="text" class="form-control" id="agama1" name="agama1"
                                            placeholder="Agama">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Pekerjan</label>
                                        <input type="text" class="form-control" id="pekerjaan1" name="pekerjaan1"
                                            placeholder="Pekerjaan">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                                            placeholder="Nomor Telepon/Handphone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="verticalnav-address-input">Alamat Lengkap</label>
                                        <textarea id="alamat1" name="alamat1" class="form-control" rows="2" placeholder="Alamat Lengkap"></textarea>
                                    </div>
                                </div>
                            </div>


                            <!-- data orang yang meninggal -->
                            <h3>Orang Yang Meninggal</h3>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Nama</label>
                                        <input type="text" class="form-control" id="nama_meninggal"
                                            name="nama_meninggal" placeholder="Nama Orang yang Meninggal">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Nomor Induk Kependudukan (NIK)</label>
                                        <input type="text" class="form-control" id="nik2" name="nik2"
                                            placeholder="Nomor Induk Kependudukan">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-phoneno-input">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir2"
                                            name="tempat_lahir2" placeholder="Kabupaten/Kota Tempat Lahir">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir2"
                                            name="tanggal_lahir2" placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Jenis Kelamin</label>
                                        <select name="jenis_kelamin2" id="jenis_kelamin2" class="form-control">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Agama</label>
                                        <input type="text" class="form-control" id="agama2" name="agama2"
                                            placeholder="Agama">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan2" name="pekerjaan2"
                                            placeholder="Pekerjaan">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Hubungan dengan Ahli Waris</label>
                                        <input type="text" class="form-control" id="hubungan" name="hubungan"
                                            placeholder="Hubungan dengan Ahliwaris">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="verticalnav-address-input">Alamat Lengkap</label>
                                        <textarea id="alamat2" name="alamat2" class="form-control" rows="2" placeholder="Alamat Lengkap"></textarea>
                                    </div>
                                </div>
                            </div>


                            <!-- data makam -->
                            <h3>Data Makam</h3>

                            <div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-namecard-input">Tanggal Meninggal</label>
                                            <input type="date" class="form-control" id="tanggal_meninggal"
                                                name="tanggal_meninggal" placeholder="Tanggal Meninggal">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-namecard-input">Tanggal Dimakamkan</label>
                                            <input type="date" class="form-control" id="tanggal_dimakamkan"
                                                name="tanggal_dimakamkan" placeholder="Tanggal Dimakamkan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="verticalnav-cardno-input">Luas Lahan</label>
                                            <input type="text" class="form-control" id="luas_lahan" name="luas_lahan"
                                                placeholder="Luas Lahan Makam">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="verticalnav-card-verification-input">Nama TPU</label>
                                            <input type="text" class="form-control" id="nama_tpu" name="nama_tpu"
                                                placeholder="Nama TPU">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="verticalnav-card-verification-input">Blok TPU</label>
                                            <input type="text" class="form-control" id="blok_tpu" name="blok_tpu"
                                                placeholder="Blok TPU">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="verticalnav-card-verification-input">Nomor TPU</label>
                                            <input type="text" class="form-control" id="nomor_tpu" name="nomor_tpu"
                                                placeholder="Nomor TPU">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="verticalnav-expiration-input">Nama yang Ditumpang</label>
                                            <input type="text" class="form-control" id="nama_ditumpang"
                                                name="nama_ditumpang" placeholder="Nama yang Ditumpang">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- retribusi -->
                            <h3>Retribusi</h3>

                            <div class="retribusi">
                                <table class="table table-bordered" id="dynamicAddRemove">
                                    <tr>
                                        <td><button type="button" name="add" id="dynamic-ar"
                                                class="btn btn-outline-primary">Tambah</button></td>
                                    </tr>
                                    <tr> 
                                        @foreach($konfig as $value)
                                        <select>
                                        @foreach($value->properties as $p)
                                            <option value="">{{$p['uraian']}}</option>
                                        </select>
                                        @endforeach
                                    @endforeach
                                                <input value="" type="hidden" name="retribusi[0][id]"
                                                    placeholder="Kode Rekening" class="form-control" />
                                                <td><input type="text"
                                                        name="retribusi[0][korek]" placeholder="Kode Rekening"
                                                        class="form-control" /></td>
                                                <td><input type="text"
                                                        name="retribusi[0][uraian]" placeholder="Uraian"
                                                        class="form-control" /></td>
                                                <td><input name="retribusi[0][nominal]"
                                                        class="form-control input-mask text-start" placeholder="Nominal"></td>
                                    </tr>
                                    @if (isset($data->retribusi))
                                        @foreach ($data->retribusi as $item)
                                            {{-- <input type="text" name="retriID" value="{{$item->id}}"> --}}
                                            <tr>
                                                <input value="{{ $item->id }}" type="hidden" name="retribusi[0][id]"
                                                    placeholder="Kode Rekening" class="form-control" />
                                                <td><input value="{{ $item->korek }}" type="text"
                                                        name="retribusi[0][korek]" placeholder="Kode Rekening"
                                                        class="form-control" /></td>
                                                <td><input value="{{ $item->uraian }}" type="text"
                                                        name="retribusi[0][uraian]" placeholder="Uraian"
                                                        class="form-control" /></td>
                                                <td><input value="{{ $item->nominal }}" name="retribusi[0][nominal]"
                                                        class="form-control input-mask text-start"></td>
                                                <td><button type="button" class="btn btn-outline-danger"
                                                        href="javascript:void(0)"
                                                        onclick="hapus({{ $item->id }})">Hapus</button></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target=".modal-verif">Verifikasi</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-verif" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Verifikasi Data Registrasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                    <form action="{{ route('registrasi.verif') }}" method="POST">
                        @csrf
                        <input type="hidden" name="regID" id="verifID">
                            <label for="">Diverifikasi Oleh:</label>
                            <input class="form-control" type="text" name="verif_oleh" id="">
                            <input class="form-check-input" type="checkbox" id="verifikasi"  name="verifikasi" value="TRUE" checked="">
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
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
@section('script')
    <script src="{{ asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>

    <!-- form mask init -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
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
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="retribusi[' + i +
                '][korek]" placeholder="Kode Rekening" class="form-control" /></td><td><input type="text" name="retribusi[' +
                i +
                '][uraian]" placeholder="Uraian" class="form-control" /></td><td><input name="retribusi[' +
                i +
                '][nominal]" placeholder="Nominal" class="form-control input-mask text-start" /></td><input type="hidden" name="retribusi[' +
                i +
                '][id]" placeholder="Uraian" class="form-control" /><td><button type="button" class="btn btn-outline-danger remove-input-field">Hapus</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
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
            $.ajax({
                type: "GET",
                url: window.location.href,
                dataType: 'json',
                success: function(res) {
                    $('#regId').val(res.id);
                    $('#verifID').val(res.id);
                    $('#awID').val(res.ahliwaris.id);
                    $('#makamID').val(res.makam.id);

                    $('#nama').val(res.ahliwaris.nama);
                    $('#nik1').val(res.ahliwaris.nik1);
                    $('#tempat_lahir1').val(res.ahliwaris.tempat_lahir1);
                    $('#tanggal_lahir1').val(res.ahliwaris.tanggal_lahir1);
                    $('#jenis_kelamin1').find('option[value="' + res.ahliwaris.jenis_kelamin1 + '"]')
                        .prop('selected', true);
                    $('#agama1').val(res.ahliwaris.agama1);
                    $('#pekerjaan1').val(res.ahliwaris.pekerjaan1);
                    $('#alamat1').val(res.ahliwaris.alamat1);

                    $('#nama_meninggal').val(res.nama_meninggal);
                    $('#nik2').val(res.nik2);
                    $('#tempat_lahir2').val(res.tempat_lahir1);
                    $('#tanggal_lahir2').val(res.tanggal_lahir2);
                    $('#jenis_kelamin2').find('option[value="' + res.jenis_kelamin2 + '"]').prop(
                        'selected', true);
                    $('#agama2').val(res.agama2);
                    $('#pekerjaan2').val(res.pekerjaan2);
                    $('#hubungan').val(res.hubungan);
                    $('#alamat2').val(res.alamat2);

                    $('#tanggal_meninggal').val(res.makam.tanggal_meninggal);
                    $('#tanggal_dimakamkan').val(res.makam.tanggal_dimakamkan);
                    $('#luas_lahan').val(res.makam.luas_lahan);
                    $('#nama_tpu').val(res.makam.nama_tpu);
                    $('#blok_tpu').val(res.makam.blok_tpu);
                    $('#nomor_tpu').val(res.makam.nomor_tpu);
                    $('#nama_ditumpang').val(res.makam.nama_ditumpang);
                }
            });

        });
    </script>
    <script>
        function hapus(id) {
            var url = '{{ route('retribusi.hapus') }}';
            var id = id;
            Swal.fire({
                title: "Apakah Anda Yakin ?",
                text: "Data Yang Sudah Dihapus Tidak Bisa Dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Tetap Hapus!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id,
                        },
                        success: function(response) {
                            swal.fire({
                                title: 'Hapus Data',
                                text: 'Data Berhasil Dihapus.',
                                icon: 'success',
                                timer: 2000,
                            });
                            location.reload();
                        }
                    })
                }
            })
        }
    </script>
@endsection

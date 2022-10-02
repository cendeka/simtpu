@extends('layouts.master')

@section('title')
    Formulir Registrasi Pemakaman
@endsection
@section('css')
<style>
    @media print {
  #printPageButton {
    display: none;
  }
}
</style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Registrasi
        @endslot
        @slot('title')
            Formulir Registrasi Pemakaman
        @endslot
    @endcomponent
@if (is_null($data))
    Data Tidak Ditemukan
@else
<button class="btn btn-lg btn-success" id="printPageButton" onClick="window.print();">
    <i class="fas fa-print "></i> Print
</button>
<div class="row align-items-center">
    <div class="col-lg-12">
        <h3 class="text-center">Formulir Penguburan</h3>
        <p class="text-center">Nomor: {{$data->kode_registrasi}}</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table>
            <tbody>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Saya yang bertandatangan di bawah ini</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Nama Ahliwaris</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->ahliwaris->nama}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Tempat / Tanggal Lahir</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->ahliwaris->tempat_lahir1}}, {{$data->ahliwaris->tanggal_lahir1}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Jenis Kelamin</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->ahliwaris->jenis_kelamin1}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">NIK</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->ahliwaris->nik1}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Agama</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->ahliwaris->agama1}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Pekerjaan</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->ahliwaris->pekerjaan1}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Alamat</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->ahliwaris->alamat1}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Desa/Kelurahan</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Hubungan Dengan yang Meninggal</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->hubungan}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Menerangkan Bahwa</td>
                    <td style="width: 23px;">&nbsp;</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Nama yang Meninggal</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->nama_meninggal}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Tempat / Tanggal Lahir</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->tempat_lahir2}}, {{$data->tanggal_lahir2}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Jenis Kelamin</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->jenis_kelamin2}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">NIK</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->nik2}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Agama</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->agama2}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Pekerjaan</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->pekerjaan2}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Alamat</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->alamat2}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Desa/Kelurahan</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Telah Meninggal Pukul</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{ $time = date('H:i', strtotime($data->tanggal_meninggal)) }}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Tanggal Meninggal</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$time = date('d-m-Y', ($data->tanggal_meninggal))}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Tanggal Dimakamkan</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$time = date('d-m-Y', ($data->tanggal_dimakamkan))}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Luas Lahan Pemakaman</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->luas_lahan}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Lokasi TPU dan Blok</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">{{$data->makam->nama_tpu}} Blok {{$data->makam->blok_tpu}}-{{$data->makam->nomor_tpu}}</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">
                    Data Rekam Medis dari Rumah Sakit Klinik/Puskesmas/Instansi Terkait
                    </td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">
                        Bersedia Dimakamkan Ditumpang dengan
                        Pemakaman Ahli Waris yang Sama
                    </td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Nama yang Ditumpang</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row" style="margin-top: 30px">
    <div class="col-lg-12">
        Dengan ini saya mohon izin untuk melakukan penguburan yang bersangkutan di lokasi pemakaman yang dikelola oleh pemerintah daerah
        dan saya sanggup memenuhi segala peraturan dan perundang-undangan yang berlaku.
    </div>
    <div class="col-lg-12" style="margin-top: 10px">
        Demikian permohonan ini disampaikan untuk mendapat perhatian.
    </div>
</div>
<div class="row" style="margin-top: 15px;">
    <div class="col">   
    </div>
    <div class="col">   
    </div>
    <div class="col align-self-end" >
        Cianjur, ................
    </div>
</div>
<div class="row" style="margin-top: 10px">
<div class="col">
    Juru Pungut Retribusi
    <div style="margin-top: 100px;">
        <strong><u>Wawan Kurniawan</u></strong>
    </div>
    <div>
        NIP.000000000000000
    </div>
</div>
<div class="col">
    Koordinator Pemakaman
    <div style="margin-top: 100px;">
        <strong><u>Dani Hamdani, S.IP.</u></strong>
    </div>
    <div>
        NIP.000000000000000
    </div>
</div>
<div class="col">
    Pemohon/Ahli Waris
    <div style="margin-top: 30px;">
       materai
    </div>
    <div style="margin-top: 45px;">
       {{$data->ahliwaris->nama}}
    </div>
</div>
</div>
@endif
@endsection
@section('script')
{{-- <script>
    $(document).ready(function () {
    window.print();
});
</script> --}}
@endsection
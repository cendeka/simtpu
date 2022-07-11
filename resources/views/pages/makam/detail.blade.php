@extends('layouts.master')

@section('title')
Detail Makam
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Data Makam @endslot
@slot('title') Detail Makam @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product-detai-imgs">
                            <div class="row">
                                <div class="col-md-2 col-sm-3 col-4">
                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true">
                                            <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        <a class="nav-link" id="product-2-tab" data-bs-toggle="pill" href="#product-2" role="tab" aria-controls="product-2" aria-selected="false">
                                            <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        <a class="nav-link" id="product-3-tab" data-bs-toggle="pill" href="#product-3" role="tab" aria-controls="product-3" aria-selected="false">
                                            <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        <a class="nav-link" id="product-4-tab" data-bs-toggle="pill" href="#product-4" role="tab" aria-controls="product-4" aria-selected="false">
                                            <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                            <div>
                                                <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-2" role="tabpanel" aria-labelledby="product-2-tab">
                                            <div>
                                                <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-3" role="tabpanel" aria-labelledby="product-3-tab">
                                            <div>
                                                <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-4" role="tabpanel" aria-labelledby="product-4-tab">
                                            <div>
                                                <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                            <i class="bx bx-user me-2"></i> Tambah Foto
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="mt-4 mt-xl-3">
                            {{-- <a href="javascript: void(0);" class="text-primary">{{$data->registrasi->nama_meninggal}}</a> --}}
                            <h4 class="mt-1 mb-3">{{$data->registrasi->nama_meninggal}}</h4>
                            <h4 class="mt-1 mb-3">{{$data->registrasi->ahliwaris->nama}} (Ahli Waris)</h4>
                            <p class="text-muted mb-4">To achieve this, it would be necessary to have uniform grammar pronunciation and more common words If several languages coalesce</p>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Tempat Lahir {{$data->registrasi->tempat_lahir2}}</p>
                                        <p class="text-muted"><i class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i> Tanggal Lahir {{$data->registrasi->tanggal_lahir2}}</p>
                                        <p class="text-muted"><i class="bx bx-battery font-size-16 align-middle text-primary me-1"></i>NIK {{$data->registrasi->nik2}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted"><i class="bx bx-user-voice font-size-16 align-middle text-primary me-1"></i>Agama {{$data->registrasi->agama2}}</p>
                                        <p class="text-muted"><i class="bx bx-cog font-size-16 align-middle text-primary me-1"></i> Alamat {{$data->registrasi->alamat2}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="mt-5">
                    <h5 class="mb-3">Detail TPU</h5>

                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 400px;">Kode Registrasi</th>
                                    <td>{{$data->registrasi->kode_registrasi}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">TPU</th>
                                    <td>{{$data->nama_tpu}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Blok</th>
                                    <td>{{$data->blok_tpu}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor</th>
                                    <td>{{$data->nomor_tpu}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Luas Lahan</th>
                                    <td>{{$data->luas_lahan}} m2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end Specifications -->

            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->
@endsection
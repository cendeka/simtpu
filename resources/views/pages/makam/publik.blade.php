@extends('layouts.master-without-nav')


@section('title')
Detail Makam
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="mt-5">
                    <h5 class="mb-3">Detail Makam {{$data->registrasi->nama_meninggal}}</h5>

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
                <div class="mt-5" id="pembayaran">
                    <h5 class="mb-3">Daftar Pembayaran Herregistrasi</h5>

                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered">
                            <thead>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Bulan</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                              @foreach ($data->registrasi->herregistrasi as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->tahun}}</td>
                                    <td>{{$item->masa}}</td>
                                    <td>{{$item->status}}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <div class="col-md-12 text-end">
                                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(255, 0, 0)->merge('/public/assets/images/pemda.png')->size(200)->generate("".env('APP_URL')."/makam/info?registrasi_id=".$data->registrasi->id."")) !!} ">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Specifications -->

            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!--  Large modal example -->
<div class="modal fade modal-upload" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Foto Makam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('makam.upload')}}" method="post" enctype="multipart/form-data">
                    <h3 class="text-center mb-5">Upload Foto</h3>
                      @csrf
                      @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                          <strong>{{ $message }}</strong>
                      </div>
                    @endif
                    @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif
                      <div class="custom-file">
                            <input type="hidden" value="{{$data->registrasi->id}}" name="registrasi_id">
                          <input type="file" name="file" class="custom-file-input" id="chooseFile">
                          <label class="custom-file-label" for="chooseFile">Select file</label>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                          Upload
                      </button>
                  </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end row -->
@endsection
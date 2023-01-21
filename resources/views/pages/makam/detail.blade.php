@extends('layouts.master')


@section('title')
    Detail Makam
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            Data Makam
        @endslot
        @slot('title')
            Detail Makam
        @endslot
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
                                        <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">

                                        </div>
                                    </div>
                                    <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="product-1" role="tabpanel"
                                                aria-labelledby="product-1-tab">
                                                <div>
                                                    <img src="{{ $data->foto_path }}" alt=""
                                                        class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-2" role="tabpanel"
                                                aria-labelledby="product-2-tab">
                                                <div>
                                                    <img src="{{ $data->foto_path }}" alt=""
                                                        class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-3" role="tabpanel"
                                                aria-labelledby="product-3-tab">
                                                <div>
                                                    <img src="assets/images/product/img-7.png" alt=""
                                                        class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-4" role="tabpanel"
                                                aria-labelledby="product-4-tab">
                                                <div>
                                                    <img src="assets/images/product/img-8.png" alt=""
                                                        class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button"
                                                class="btn btn-primary waves-effect waves-light mt-2 me-1"
                                                data-bs-toggle="modal" data-bs-target=".modal-upload">
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
                                <h4 class="mt-1 mb-3">{{ $data->registrasi->nama_meninggal }}</h4>
                                <h4 class="mt-1 mb-3">{{ $data->registrasi->ahliwaris->nama }} (Ahli Waris)</h4>
                                <!-- <p class="text-muted mb-4">To achieve this, it would be necessary to have uniform grammar
                                                        pronunciation and more common words If several languages coalesce</p> -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted"><i
                                                    class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Tempat
                                                Lahir {{ $data->registrasi->tempat_lahir2 }}</p>
                                            <p class="text-muted"><i
                                                    class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i>
                                                Tanggal Lahir {{ $data->registrasi->tanggal_lahir2 }}</p>
                                            <p class="text-muted"><i
                                                    class="bx bx-battery font-size-16 align-middle text-primary me-1"></i>NIK
                                                {{ $data->registrasi->nik2 }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted"><i
                                                    class="bx bx-user-voice font-size-16 align-middle text-primary me-1"></i>Agama
                                                {{ $data->registrasi->agama2 }}</p>
                                            <p class="text-muted"><i
                                                    class="bx bx-cog font-size-16 align-middle text-primary me-1"></i>
                                                Alamat {{ $data->registrasi->alamat2 }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <img id="image" src="data:image/png;base64, {!! base64_encode(
                                            QrCode::format('png')->color(255, 0, 0)->merge('/public/assets/images/pemda.png')->size(200)->generate('' . env('APP_URL') . '/makam/info?kode_registrasi=' . $data->registrasi->kode_registrasi . ''),
                                        ) !!} ">
                                    </div>
                                    <div class="col-md-6">
                                    <button class="btn btn-success" id="print">Print QRCode</button>
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
                                        <td>{{ $data->registrasi->kode_registrasi }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TPU</th>
                                        <td>{{ $data->nama_tpu }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Blok</th>
                                        <td>{{ $data->blok_tpu }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nomor</th>
                                        <td>{{ $data->nomor_tpu }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Luas Lahan</th>
                                        <td>{{ $data->luas_lahan }} m2</td>
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
                                            <td>{{ $i++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tahun)->format('Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tahun)->format('F') }}</td>
                                            <td>{{ $item->status }}</td>
                                        </tr>
                                    @endforeach
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
    <!--  Large modal example -->
    <div class="modal fade modal-upload" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Foto Makam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('makam.upload') }}" method="post" enctype="multipart/form-data">
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
                            <input type="hidden" value="{{ $data->registrasi->id }}" name="registrasi_id">
                            <input type="file" accept="image/*" name="file" class="custom-file-input"
                                id="chooseFile">
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
@section('script')
    <script>
        const printBtn = document.getElementById('print');

        printBtn.addEventListener('click', function() {
            const iframe = document.createElement('iframe');

            // Make it hidden
            iframe.style.height = 0;
            iframe.style.visibility = 'hidden';
            iframe.style.width = 0;

            // Set the iframe's source
            iframe.setAttribute('srcdoc', '<html><body></body></html>');

            document.body.appendChild(iframe);
            iframe.addEventListener('load', function() {
            // Clone the image
            const image = document.getElementById('image').cloneNode();
            image.style.maxWidth = '100%';

            // Append the image to the iframe's body
            const body = iframe.contentDocument.body;
            body.style.textAlign = 'center';
            body.appendChild(image);

            image.addEventListener('load', function() {
                // Invoke the print when the image is ready
                iframe.contentWindow.print();
            });
        });
        });

    </script>
@endsection

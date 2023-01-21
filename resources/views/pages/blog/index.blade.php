@extends('layouts.master')

@section('title')
    Blog
@endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Blog
        @endslot
        @slot('title')
            Daftar Artikel
        @endslot
    @endcomponent
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">Terbaru</h5>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <tr>
                            <th scope="col" colspan="2">Judul Artikel</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Opsi</th>
                          </tr>
                        <tbody>
                          @foreach ($post as $item)
                          <tr>
                            <td style="width: 100px;"><img src="{{$item->foto_path}}" alt="" class="avatar-md h-auto d-block rounded"></td>
                            <td>
                                <h5 class="font-size-13 text-truncate mb-1"><a href="javascript: void(0);" class="text-dark">{{$item->judul}}</a></h5>
                                <p class="text-muted mb-0">{{date('d-m-Y', strtotime($item->created_at))}}</p>
                            </td>
                            <td><i class="bx bx-user align-middle me-1"></i> {{$item->author}}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="text-muted font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="/blog/update?id={{$item->id}}">Ubah</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="hapus({{$item->id}})">Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
        function hapus(id) {
            var url = '{{ route('blog.hapus') }}';
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

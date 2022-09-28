@extends('layouts.master')

@section('title')
    Blog
@endsection
@section('css')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Blog
        @endslot
        @slot('title')
            Tambah Post
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="post_id" value="{{$post->id ?? ''}}">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" value="{{$post->judul ?? ''}}" name="judul" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori" id="">
                                        <option value="Lainnya" selected>Lainnya</option>
                                        <option value="Artikel">Artikel</option>
                                        <option value="Pengumuman">Pengumuman</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <input type="file" name="file" class="form-control" accept="image/*"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                            <label>Post</label>
                            <textarea class="tinymce-editor" id="post" name="post"></textarea>
                        </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-block">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
<script src="{{URL::asset('assets/js/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
<script src="https://cdn.tiny.cloud/1/sjcuvozoutp6vaaxpevv2rfyqdnqh7u5zudlxkma34jep46y/tinymce/6/plugins.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      setup: function (editor) {
        editor.on('init', function () {
            var content = "{!! $post->post ?? '' !!}";
            editor.setContent(content);
        });
    }  
    });
  </script>
@endsection

@extends('layouts.main-front')
@section('content')
    <section class="ud-page-banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-banner-content">
              <h1>{{$post->judul}}</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Blog Details Start ====== -->
    <section id="home" class="ud-blog-details" style="margin-bottom: 50px;">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="ud-blog-details-image">
                <img
                  src="{{$post->foto_path}}"
                  alt="blog details"
                />
                <div class="ud-blog-overlay">
                  <div class="ud-blog-overlay-content">
                    <div class="ud-blog-author">
                      <img src="#" alt="author" />
                      <span>
                        By <a href="javascript:void(0)"> {{Auth::user()->name}} </a>
                      </span>
                    </div>
  
                    <div class="ud-blog-meta">
                      <p class="date">
                        <i class="lni lni-calendar"></i> <span>12 Jan 2024</span>
                      </p>
                      <p class="comment">
                        <i class="lni lni-comments"></i> <span>50</span>
                      </p>
                      <p class="view">
                        <i class="lni lni-eye"></i> <span>35</span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-12">
              <div class="ud-blog-details-content">
                <h2 class="ud-blog-details-title">
                  {{$post->judul}}
                </h2>
                {!! $post->post !!}
              </div>
            </div>
          </div>
        </div>
      </section>
<div class="row">
    <div class="col"></div>
</div>
@endsection
@section('script')

@endsection

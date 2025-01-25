@extends('frontend.app')

@section('title')

        News | Healthcare Pharmaceuticals

@endsection


@section('main')
<div class="hero-section">
    @php
        $lastSlug = basename(url()->current());
        $menu = \App\Menu::where('slug', $lastSlug)->first();
        $banner = $menu ? $menu->image : null;
    @endphp

    @if($banner)
        <div class="hero-single" style="background: url({{ asset('uploads/menu/' . $banner) }}); max-height: 180px;">
        </div>
    @else
        <div class="hero-single" style="background: url({{ asset('front/assets/img/slider/4.jpg') }}); max-height: 180px;">
        </div>
    @endif
  </div>


 <!-- News Area -->
  <div class="blog-area py-80">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
          <div class="site-heading text-center">
            <span class="site-title-tagline">
              <i class="fas fa-bring-forward"></i> Our News </span>
            <h2 class="site-title">Latest <span>News</span>
            </h2>
            <div class="heading-divider"></div>
          </div>
        </div>
      </div>
      <div class="row">


        {{-- <div class="col-md-6 col-lg-4">
          <div class="blog-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
            <span class="blog-date">
              <i class="far fa-calendar-alt"></i> Aug 16, 2024 </span>
            <div class="blog-item-img">
              <a href="news-details.html"> <img src="assets/img/news/2.jpg" alt="Thumb"></a>
            </div>
            <div class="blog-item-info">
              <h4 class="blog-title">
                <a href="#">News Title Name Here</a>
              </h4>

              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore. </p>
              <a class="theme-btn news-btn" href="news-details.html">Read More <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div> --}}

        @foreach(\App\News::orderBy('id', 'desc')->limit(6)->get() as $news)

          <div class="col-md-6 col-lg-4">
            <div class="blog-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
              <span class="blog-date">
                {{-- <i class="far fa-calendar-alt"></i> Aug 16, 2024 </span> --}}
                <i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($news->sub_title)->format('d M Y') }} </span>
              <div class="blog-item-img">
                <a href="{{ route('news.details',$news->slug) }}"> <img src="{{asset('/') }}uploads/news/{{ $news->image }}" alt="Thumb"></a>
              </div>
              <div class="blog-item-info">
                <h4 class="blog-title">
                  <a href="{{ route('news.details',$news->slug) }}">{{ $news->title }}</a>
                </h4>

                <p> {{ $news->short}} </p>
                <a class="theme-btn news-btn" href="{{ route('news.details',$news->slug) }}">Read More <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          @endforeach



      </div>
    </div>
  </div>
<!-- News Area -->



@endsection

@extends('frontend.app')

@section('title')

    {{$news->title}} | Healthcare Pharmaceuticals

@endsection


@section('main')

<div class="hero-section">
    <div class="hero-slider owl-carousel owl-theme">
      <div class="hero-single" style="background: url(assets/img/slider/4.jpg); max-height: 180px;">
      </div>
    </div>
  </div>


 <!-- News Area -->
  <div class="blog-single-area pt-50 pb-50">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="blog-single-wrap">
            <div class="blog-single-content">
              <div class="blog-thumb-img">
                <img src="{{asset('/') }}uploads/news/{{ $news->image }}" alt="thumb">
              </div>
              <div class="blog-info">
                <div class="blog-meta">
                  <div class="blog-meta-left">
                    <ul>
                      <li>
                        <i class="far fa-calendar-alt"></i>
                        {{-- <a href="#">28 Nov 2024</a> --}}
                        <a href="#">{{ \Carbon\Carbon::parse($news->sub_title)->format('d M Y') }}</a>
                      </li>
                    </ul>
                  </div>
                  {{-- <div class="blog-meta-right">
                    <a href="#" class="share-link">
                      <i class="far fa-share-alt"></i>Share </a>
                  </div> --}}
                </div>
                <div class="blog-details">
                  <h3 class="blog-details-title mb-20">{{$news->title}}</h3>
                  <p class="mb-10"> {!! $news->description !!} </p>
                  
                  <hr>

                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <aside class="sidebar">
            {{-- <div class="widget search">
              <h5 class="widget-title">Search</h5>
              <form class="search-form">
                <input type="text" class="form-control" placeholder="Search Here...">
                <button type="submit">
                  <i class="far fa-search"></i>
                </button>
              </form>
            </div> --}}
            
            <div class="widget recent-post">
              <h5 class="widget-title">Recent News</h5>

              @foreach(\App\News::orderBy('id', 'DESC')->take(5)->get() as $news)

              <div class="recent-post-single">
                <div class="recent-post-img">
                  <img src="{{asset('/') }}uploads/news/{{ $news->image }}" alt="thumb">
                </div>
                <div class="recent-post-bio">
                  <h6>
                    <a href="#">{{$news->title}}</a>
                  </h6>
                  <span>
                    <i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($news->sub_title)->format('d M Y') }} </span>
                </div>
              </div>

             @endforeach


            </div>
            {{-- <div class="widget social-share">
              <h5 class="widget-title">Follow Us</h5>
              <div class="social-share-link">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i class="fab fa-whatsapp"></i>
                </a>
                <a href="#">
                  <i class="fab fa-youtube"></i>
                </a>
                <a href="#">
                  <i class="fab fa-x-twitter"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
                
              </div>
            </div> --}}
          </aside>
        </div>
      </div>
    </div>
  </div>
<!-- News Area -->


@endsection

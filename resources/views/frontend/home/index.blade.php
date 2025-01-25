@extends('frontend.app')

@section('title','HPL Formulations')


@section('main')


<main class="main">

    <div class="hero-section">
      <div class="hero-slider owl-carousel owl-theme">

        @foreach ($sliders as $slider)
        <div class="hero-single" style="background-image: url('{{ asset('uploads/slider/' . $slider->image) }}'); background-size: cover; background-position: center;">

            {{-- <div class="hero-single" style="background: url({{ asset('/') }}/uploads/slider/{{ $slider->image }})"> --}}
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-7 col-lg-7">
                <div class="hero-content">
                  <h1 class="hero-title" data-animation="fadeInUp" data-delay=".50s"> {{ $slider->title }} </h1>

                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach


      </div>
    </div>


    <!-- Start: About Us -->
    <div class="about-area py-80">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="about-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".25s">
              <div class="about-img">
                <div class="about-img-1">
                  <img src="{{ asset('uploads/object/' . $about->image) }}" alt>
                </div>
                <!--<div class="about-img-2">-->
                <!--  <img src="assets/img/about/02.jpg" alt>-->
                <!--</div>-->
              </div>
              <div class="about-shape">
                <img src="{{asset('front') }}/assets/img/shape/01.png" alt>
              </div>
              <!--<div class="about-experience">-->
              <!--  <h1>25+</h1>-->
              <!--  <div class="about-experience-text"> Years Of <br> Experience </div>-->
              <!--</div>-->
            </div>
          </div>
          <div class="col-lg-6">
            <div class="about-right wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
              <div class="site-heading mb-3">
                <span class="site-title-tagline">
                  <i class="fas fa-bring-forward"></i> About Us </span>
                <!-- <h2 class="site-title"> We have 25+ Years of experiance in Pharmaceuticals company </h2> -->
              </div>

              <div class="logo-container">
                <img src="{{asset('front') }}/assets/img/logo/logo.png" alt="Logo" class="logo">

              </div>


              <p class="about-text">
                {!! $about->description !!}</p>
              <div class="about-list-wrap">
                <ul class="about-list list-unstyled">
                  <li>
                    <div class="icon">
                      <img src="{{asset('front') }}/assets/img/icon/award.svg" alt>
                    </div>
                    <div class="content">
                      <h4>Vision</h4>
                      <p>{!! $aboutmissionvission->short !!}</p>
                    </div>
                  </li>
                  <li>
                    <div class="icon">
                      <img src="{{asset('front') }}/assets/img/icon/trusted.svg" alt>
                    </div>
                    <div class="content">
                      <h4>Mission</h4>
                      <p>{!! $aboutmissionvission->description !!}</p>
                    </div>
                  </li>

                  <li>
                    <div class="icon">
                      <img src="{{asset('front') }}/assets/img/icon/values.png" alt>
                    </div>
                    <div class="content">
                      <h4>Values</h4>
                      <p>{!! $aboutmissionvission->short !!}</p>
                    </div>
                  </li>
                </ul>
              </div>
              <a href="#" class="theme-btn mt-4">Discover More <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End: About Us -->




    <!-- Start: Hpl Team -->
      <section class="hpl-team bg py-80">
        <div class="container">
          <div class="row">
          <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
            <div class="site-heading text-center">
              <span class="site-title-tagline">
                <!-- <i class="fas fa-bring-forward"></i> Our Team </span> -->
              <h2 class="site-title">Board of<span> Directors</span>
              </h2>
              <div class="heading-divider"></div>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="management">
                    @foreach ($direcotr as $key => $leader)
                        <div class="leadership-two_block wow
            @if ($key == 0) fadeInLeft
            @elseif ($key == 1) fadeInRight style-two
            @else {{ $key % 2 == 0 ? 'fadeInLeft' : 'fadeInRight' }}
                        @endif"
                             data-wow-duration="1s"
                             data-wow-delay="{{ ($key + 1) * 0.3 }}s"
                             data-aos-easing="ease-in-sine"
                             style="visibility: visible; animation-duration: 1s; animation-delay: {{ ($key + 1) * 0.3 }}s;">
                            <div class="leadership-two_block-inner">
                                <div class="leadership-two_block-image">
                                    <img src="{{ asset('uploads/life/' . $leader->image) }}" alt="">
                                    <div class="leadership-two_block-icon flaticon-voice"></div>
                                </div>
                                <div class="leadership-two_block-content">
                                    <div class="leadership-two_block-time">{{ $leader->Batch }}</div>
                                    <h3 class="leadership-two_block-title"><a href="#">{{ $leader->Name }}</a></h3>
                                    <div class="leadership-two_block-location">{{ $leader->Address }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{--                <div class="management">--}}
{{--                    @foreach ($direcotr as $key => $leader)--}}
{{--                        <div class="leadership-two_block wow {{ $key % 2 == 0 ? 'fadeInLeft' : 'fadeInRight' }}"--}}
{{--                             data-wow-duration="1s"--}}
{{--                             data-wow-delay=".30s"--}}
{{--                             data-aos-easing="ease-in-sine">--}}
{{--                            <div class="leadership-two_block-inner">--}}
{{--                                <div class="leadership-two_block-image">--}}
{{--                                    <!-- Dynamically set image source from database -->--}}
{{--                                    <img src="{{ asset('uploads/life/' . $leader->image) }}" alt="">--}}
{{--                                    <div class="leadership-two_block-icon flaticon-voice"></div>--}}
{{--                                </div>--}}
{{--                                <div class="leadership-two_block-content">--}}
{{--                                    <div class="leadership-two_block-time">{{ $leader->Batch }}</div>--}}
{{--                                    <h3 class="leadership-two_block-title"><a href="#">{{ $leader->Name }}</a></h3>--}}
{{--                                    <div class="leadership-two_block-location">{{ $leader->Address }}</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                --}}
            </div>
        </div>


        </div>
      </section>
    <!-- End: Hpl Team -->





    <!-- Start: Our Facilities -->
    <div class="facilities-area py-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
            <div class="site-heading text-center">
              {{-- <span class="site-title-tagline">
                <i class="fas fa-bring-forward"></i> Facilities </span> --}}
              <h2 class="site-title text-white">Facilities </h2>
              <div class="heading-divider"></div>
            </div>
          </div>
        </div>
        <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
            @foreach(\App\Facility::all() as $key => $facility)

            <div class="service-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
              <div class="service-icon">
                <img src="{{asset('front') }}/assets/img/icon/quality.svg" alt>
              </div>
              <div class="service-content">
                <h3 class="service-title">
                  <a href="#">{{ $facility->title }}</a>
                </h3>
                {{-- <p class="service-text"> {!! $facility->short  !!}   </p> --}}
                <p class="service-text"> {{ \Illuminate\Support\Str::words(strip_tags($facility->short), 50, '...') }} </p>

                <div class="service-arrow">
                  <a href="{{ route('facility.details', $facility->slug) }}" class="service-btn">
                    <i class="far fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>

            @endforeach







        </div>
      </div>
    </div>
    <!-- End: Our Facilities -->



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

          @foreach(\App\News::orderBy('id', 'desc')->where('url',1)->limit(6)->get() as $news)

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

    <!-- Count Down -->


    @php
    $count=App\Objects::find(3);
    @endphp
    @if($count->slug ==1)
    <div class="counter-area">
      <div class="container">
        <div class="counter-wrap">
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <div class="counter-box wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                <div class="icon">
                  <img src="{{asset('front') }}/assets/img/count/4.png" alt="">
                </div>
                <div>
                  <span class="counter" data-count="+" data-to="{{ $count->short }}" data-speed="3000">{{ $count->short }}</span>
                  <h6 class="title">+  Employess </h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="counter-box wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                <div class="icon">
                  <img src="{{asset('front') }}/assets/img/count/6.png" alt="">
                </div>
                <div>
                  <span class="counter" data-count="+" data-to="{{ $count->description }}" data-speed="3000">{{ $count->description }}</span>
                  <h6 class="title">+ Registered Medicine</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="counter-box wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                <div class="icon">
                  <img src="{{asset('front') }}/assets/img/count/8.png" alt="">
                </div>
                <div>
                  <span class="counter" data-count="+" data-to="{{ $count->instagram }}" data-speed="3000">{{ $count->instagram }}</span>
                  <h6 class="title">+ Nutritional products</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="counter-box wow fadeInUp" data-wow-duration="1s" data-wow-delay=".90s">
                <div class="icon">
                  <img style="width: 40px;" src="{{asset('front') }}/assets/img/count/14.png" alt="">
                </div>
                <div>
                  <span class="counter" data-count="+" data-to="{{ $count->whatsapp }}" data-speed="3000">{{ $count->whatsapp }}</span>
                  <h6 class="title">+ Generic</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    <!-- Count Down -->


  </main>


@endsection

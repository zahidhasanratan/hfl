@extends('frontend.app')

@section('title','Global Operations | Healthcare Pharmaceuticals')


@section('main')
<main class="main">
    <div class="hero-section">
       <div class="hero-slider owl-carousel owl-theme">
        <div class="hero-single" style="background: url({{ asset('front/assets/img/slider/4.jpg') }}); max-height: 180px;">
        </div>
       </div>
     </div>
    <!-- Start: page source links -->
    <!--<section class="page-direction sec-ptb pt-200">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-start wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">-->
    <!--            <div class="col-md-7">-->
    <!--                <div class="menu-links-top">-->
    <!--                    <ul>-->


    <!--                        <li><a class="active menu-page-link" href="#">Research & Development</a></li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- End: page source links -->



    <!-- Start: Facilities Section -->
    <section class="facilities-details-wrap py-80">
        <div class="container">
            <div class="row justify-content-start align-items-center wow fadeInUp pb-30 mb-50" data-wow-delay="500ms" data-wow-duration="1500ms">

                {{-- <div class="col-md-12">
                    <div class="facilities-video">
                        @php
                            preg_match("/v=([a-zA-Z0-9_-]+)/", $news->video, $matches);
                             $videoId = $matches[1];
                        @endphp
                        <iframe class="mapp" width="100%" height="400" src="https://www.youtube.com/embed/{{ $videoId }}" title="Healthcare Pharmaceuticals Limited Industrial park virtual tour" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


                    </div>
                </div> --}}

                <div class="col-md-12">
                    <div class="facilities-video">
                        @if(!empty($news->video) && preg_match("/v=([a-zA-Z0-9_-]+)/", $news->video, $matches))
                            @php
                                $videoId = $matches[1];
                            @endphp
                            <iframe class="mapp" width="100%" height="400" 
                                    src="https://www.youtube.com/embed/{{ $videoId }}" 
                                    title="Healthcare Pharmaceuticals Limited Industrial park virtual tour" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    referrerpolicy="strict-origin-when-cross-origin" 
                                    allowfullscreen>
                            </iframe>
                        @elseif(!empty($news->image))
                            <img src="{{ asset('/') }}uploads/facility/{{ $news->image }}" 
                                 alt="News Image" 
                                 width="100%" 
                                 height="400">
                        @else
                            <p>No video or image available.</p>
                        @endif
                    </div>
                </div>
                

                <div class="col-md-12">
                    <div class="facilities-details mt-30">
                        <h2>{{ $news->title }}</h2>
                        <div class="facilities-inner-details">
                            {!! $news->description !!}
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- End: Facilities Section -->



@endsection

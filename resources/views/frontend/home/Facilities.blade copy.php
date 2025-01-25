@extends('frontend.app')

@section('title','Facility | Healthcare Pharmaceuticals')


@section('main')

 <div class="static-bg">
        <img class="lazy lazyLoaded" data-load-priority="0" src="{{asset('front') }}/assets/images/background/rotate.jpg" alt="">
    </div>


    <!-- Start: page source links -->
    <!--<section class="page-direction sec-ptb pt-200">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-start wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">-->
    <!--            <div class="col-md-7">-->
    <!--                <div class="menu-links-top">-->
    <!--                    <ul>-->

    <!--                         <li><a href="#">Facilities</a></li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- End: page source links -->



    <!-- Start: Facilities Section -->
    <section class="facilities-details-wrap pt-200">
        <div class="container">
           @foreach(\App\Facility::all() as $key => $facility)
    @if($key % 2 == 0)
        <div class="row justify-content-start align-items-center wow fadeInUp pb-30 mb-50" data-wow-delay="500ms" data-wow-duration="1500ms">
            <div class="col-md-7 order-2 order-md-1">
                <div class="facilities-details">
                    <h2>{{ $facility->title }}</h2>
                    <div class="facilities-inner-details">
                        <div class="about-info">
                            <p>{{ $facility->short }}</p>
                            <div class="btn-box text-center mt-30">
                                <a href="{{ route('facility.details', $facility->slug) }}" class="read-more-btn-wo-border">Know more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 order-1 order-md-2">
                <div class="facilities-video">
                    @php
                        $videoId = '';
                        if (preg_match("/v=([a-zA-Z0-9_-]+)/", $facility->video, $matches)) {
                            $videoId = $matches[1];
                        }
                    @endphp
                    @if($videoId)
                        <iframe class="mapp" width="100%" height="280" src="https://www.youtube.com/embed/{{ $videoId }}" title="{{ $facility->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @else
                        <p>No video available.</p>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-start align-items-center wow fadeInUp pb-30 mb-50" data-wow-delay="500ms" data-wow-duration="1500ms">
            <div class="col-md-5">
                <div class="facilities-video">
                    @php
                        $videoId = '';
                        if (preg_match("/v=([a-zA-Z0-9_-]+)/", $facility->video, $matches)) {
                            $videoId = $matches[1];
                        }
                    @endphp
                    @if($videoId)
                        <iframe class="mapp" width="100%" height="280" src="https://www.youtube.com/embed/{{ $videoId }}" title="{{ $facility->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @else
                        <p>No video available.</p>
                    @endif
                </div>
            </div>
            <div class="col-md-7">
                <div class="facilities-details">
                    <h2>{{ $facility->title }}</h2>
                    <div class="facilities-inner-details">
                        <p>{{ $facility->short }}</p>
                    </div>
                    <div class="btn-box text-center mt-30">
                        <a class="read-more-btn-wo-border" href="{{ route('facility.details', $facility->slug) }}">Know more</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach


        </div>
    </section>

    <!-- End: Facilities Section -->


    <!-- Start:vision-mission-area -->
  

    <!-- Ed:vision-mission-area -->


   @include('frontend.home.technology_partner')


    <!-- Start: large video -->
    <section class="accreditation mt-30 mb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="large-video facilities-video">
                        @php
                            $explore_hpl= \App\Objects::where('id', 1)->first();
                            preg_match("/v=([a-zA-Z0-9_-]+)/", $explore_hpl->instagram, $matches);
                             $videoId = $matches[1];
                        @endphp
                        <iframe style="" class="mapp" width="100%" height="600" src="https://www.youtube.com/embed/{{ $videoId }}" title="Healthcare Pharmaceuticals Limited Industrial park virtual tour" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- END: Good Manufacturing -->


@endsection

@extends('frontend.app')

@section('title','About | Healthcare Pharmaceuticals')


@section('main')

    <div class="static-bg">
        <img class="lazy lazyLoaded" data-load-priority="0" src="{{asset('front') }}/assets/images/background/rotate.jpg" alt="">
    </div>

    <!--  start: About Us  -->
    <section class="about-us-wrapper sec-ptb pt-200">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                 <div class="col-md-3 col-lg-2">
                    <div class="about-us-title">
                        <h3>About Us <span>
                    <i class="fa fa-angle-double-right"></i>
                  </span>
                        </h3>
                    </div>
                </div>
                <div class="col-md-9 col-lg-10">
                    @php
                        $about = \App\Objects::find(5);
                    @endphp
                    <div class="about-info">
                        <p>{{ $about->short }}
                            <br>
                        </p>
                        <div class="additional-content about-info content pt-50" style="display: none">
                            <p>{!! $about->description !!}</p>

                        </div>

                        <div class="btn-box mt-30">
                            <a id="readMoreBtn" class="read-more-btn-wo-border" href="#"> Know more </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:  About Us -->



    <!--  start: Director-all  -->
    <div class="product-specification pb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbing-sppec tabing-director">
                        <input id="tab-1" type="radio" name="tabs" checked>
                        <label for="tab-1">Board of Directors </label>
                        <input id="tab-2" type="radio" name="tabs">
                        <label for="tab-2">Executive Directors</label>
                        <input id="tab-3" type="radio" name="tabs">
                        <label for="tab-3">Directors</label>
                        <div class="content">
                            <div id="content-1">

                                @foreach(\App\LifeMember::where('phone', 'Board of Directors')->orderBy('id')->limit(1)->get() as $team)
                                    <div class="row align-items-center justify-content-center mt-30">
                                        <div class="col-md-7">
                                            <div class="director-section-about wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                                <div class="circular-image-container-chairman">

                                                    <a href="{{ route('life.details', $team->slug) }}"><img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" /></a>
                                                </div>
                                                <div class="director-details no-align mt-30">
                                                    <p>{{ $team->Address }}<a class="seemore" href="{{ route('life.details', $team->slug) }}">...see more </a>
                                                        <a class="moreless-button" href="#">...see more</a>
                                                    </p>

                                                    <!-- Chairperson -->
                                                    <div class="facilities-details-wrap moretext chairman-mobile">
                                                        <div class="row justify-content-start">

                                                            <div class="col-md-12">
                                                                <div class="director-message">
                                                                    <p>{!!  $team->short  !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="justify-content-center">
                                                            <div class="col-lg-12">
                                                                <div class="sec-content text-center">
                                                                    <div class="director-details">
                                                                        <p>{!!  $team->Address1  !!}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- Chairperson -->
                                                    <h3><a href="{{ route('life.details', $team->slug) }}">{{ $team->Name }}</a></h3>
                                                    <h4>{{ $team->Batch }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                       </div>


                                @endforeach


                                <div class="row justify-content-center align-items-center mt-30">
                                    @foreach(\App\LifeMember::where('phone', 'Board of Directors')->orderBy('id')->skip(1)->limit(1)->get() as $team)

                                        <div class="col-md-6 pull-left wow slideInLeft animated animated" data-wow-delay="10ms" data-wow-duration="1500ms">
                                        <div class="chairman-section align-items-center ">

                                            <div class="col-md-5">
                                                <div class="director-card-left">
                                                    <div class="circular-image-container-director">
                                                       <a  href="{{ route('life.details', $team->slug) }}"><img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" /></a>
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-md-7">
                                                <div class="chairman-details ml-20">
                                                    <p>{{ $team->Address }}<a class="seemore" href="{{ route('life.details', $team->slug) }}">...see more </a>
                                                        <a class="moreless-button-director" href="#">...see more</a>
                                                    </p>
                                                    <section class="facilities-details-wrap moretext-director">
                                                        <div class="row justify-content-start">
                                                            <div class="col-md-12">
                                                                <div class="director-message">
                                                                    <p>{!!  $team->Address1  !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </section>
                                                    <h4>  <a  href="{{ route('life.details', $team->slug) }}"> {{ $team->Name }} </a></h4>
                                                    <h5>{{ $team->Batch }}</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    @endforeach
                                        @foreach(\App\LifeMember::where('phone', 'Board of Directors')->orderBy('id')->skip(2)->limit(1)->get() as $team)

                                        <div class="col-md-6  pull-right wow slideInRight animated animated" data-wow-delay="10ms" data-wow-duration="1500ms">
                                        <div class="chairman-section d-flex align-items-center">

                                            <div class="col-md-7">
                                                <div class="chairman-details mr-20">
                                                    <p>{{ $team->Address }}<a class="seemore" href="{{ route('life.details', $team->slug) }}">...see more </a>
                                                        <a class="moreless-button-dmd" href="#">...see more</a>
                                                    </p>
                                                    <section class="facilities-details-wrap moretext-dmd">
                                                        <div class="row justify-content-start">
                                                            <div class="col-md-12">
                                                                <div class="director-message">
                                                                    <p>{!!  $team->Address1  !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </section>
                                                    <h4><a href="{{ route('life.details', $team->slug) }}">{{ $team->Name }}</a></h4>
                                                    <h5>{{ $team->Batch }}</h5>
                                                </div>
                                            </div>

                                            <div class="col-md-5 order-first order-md-1">
                                                <div class="circular-image-container-director">
                                                   <a href="{{ route('life.details', $team->slug) }}"> <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach

                            </div>
                            <div id="content-2">

                                <div class="row justify-content-center mt-30">
                                    @foreach(\App\LifeMember::where('phone', 'Executive Directors')->orderBy('id')->limit(1)->get() as $team)

                                    <div class="col-md-5 pull-left wow slideInLeft">
                                        <div class="chairman-section d-flex align-items-center">

                                            <div class="director-card-left">
                                                <div class="circular-image-container-director">
                                                    <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" />
                                                </div>
                                            </div>
                                            <div class="chairman-details ml-20">
                                                <h4>{{ $team->Name }}</h4>
                                                <h5>- {{ $team->Batch }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                        @foreach(\App\LifeMember::where('phone', 'Executive Directors')->orderBy('id')->skip(1)->limit(1)->get() as $team)

                                       <div class="col-md-5 offset-md-1 pull-right wow slideInRight">
                                        <div class="chairman-section d-flex align-items-center">
                                            <div class="chairman-details mr-20 order-2 order-md-1 mr-md-20">
                                                <h4>{{ $team->Name }}</h4>
                                                <h5>- {{ $team->Batch }}</h5>
                                            </div>

                                            <div class="circular-image-container-director order-1 order-md-2">
                                                <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                                <div class="row justify-content-center mt-30">
                                    @foreach(\App\LifeMember::where('phone', 'Executive Directors')->orderBy('LM_No')->skip(2)->limit(1)->get() as $team)

                                    <div class="col-md-6 pull-left wow slideInLeft">
                                        <div class="chairman-section d-flex justify-content-center align-items-center">


                                            <div class="circular-image-container-director">
                                                <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" />
                                            </div>
                                            <div class="chairman-details ml-20">
                                                <h4>{{ $team->Name }}</h4>
                                                <h5>- {{ $team->Batch }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                            </div>

                                <div id="content-3">
                                    <div class="row justify-content-center mt-30">
                                        @foreach(\App\LifeMember::where('phone', 'Directors')->orderBy('LM_No')->limit(1)->get() as $team)

                                        <div class="col-md-5 pull-left wow slideInLeft">
                                            <div class="chairman-section d-flex justify-content-center align-items-center">
                                                <div class="circular-image-container-director">
                                                    <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" />
                                                </div>
                                                <div class="chairman-details ml-20">
                                                    <h4>{{ $team->Name }}</h4>
                                                    <h5>- {{ $team->Batch }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                            @foreach(\App\LifeMember::where('phone', 'Directors')->orderBy('LM_No')->skip(1)->limit(1)->get() as $team)

                                                <div class="col-md-5 offset-md-1 pull-right wow slideInRight">
                                                    <div class="chairman-section d-flex align-items-center">
                                                        <div class="chairman-details order-2 order-md-1 mr-md-20 mr-20">
                                                    <h4>{{ $team->Name }}</h4>
                                                    <h5>- {{ $team->Batch }}</h5>
                                                </div>
                                                        <div class="circular-image-container-director order-1 order-md-2">
                                                    <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" />
                                                </div>
                                            </div>

                                        </div>
                                            @endforeach
                                    </div>
                                    <div class="row justify-content-center mt-30">
                                        @foreach(\App\LifeMember::where('phone', 'Directors')->orderBy('LM_No')->skip(2)->limit(1)->get() as $team)
                                        <div class="col-md-5 pull-left wow slideInLeft">
                                            <div class="chairman-section d-flex justify-content-center align-items-center">
                                                <div class="circular-image-container-director">
                                                    <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" />
                                                </div>
                                                <div class="chairman-details ml-20">
                                                    <h4>{{ $team->Name }}</h4>
                                                    <h5>- {{ $team->Batch }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                            @foreach(\App\LifeMember::where('phone', 'Directors')->orderBy('LM_No')->skip(3)->limit(1)->get() as $team)
                                                <div class="col-md-5 offset-md-1 pull-right wow slideInRight">
                                            <div class="chairman-section d-flex align-items-center">
                                                <div class="chairman-details order-2 order-md-1 mr-md-20 mr-20">
                                                    <h4>{{ $team->Name }}</h4>
                                                    <h5>- {{ $team->Batch }}</h5>
                                                </div>
                                                <div class="circular-image-container-director order-1 order-md-2">
                                                    <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                </div>



                                <div class="row justify-content-center mt-30">

                                    @foreach(\App\LifeMember::where('phone', 'Directors')->orderBy('LM_No')->skip(4)->limit(1)->get() as $team)
                                        <div class="col-md-5 pull-left wow slideInLeft">
                                        <div class="chairman-section d-flex justify-content-center align-items-center">
                                            <div class="circular-image-container-director">
                                                <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" />
                                            </div>
                                            <div class="chairman-details ml-20">
                                                <h4>{{ $team->Name }}</h4>
                                                <h5>- {{ $team->Batch }}</h5>
                                            </div>
                                        </div>
                                    </div>


                                    @endforeach

                                        @foreach(\App\LifeMember::where('phone', 'Directors')->orderBy('LM_No')->skip(5 )->limit(1)->get() as $team)

                                            <div class="col-md-5 offset-md-1 pull-right wow slideInRight">
                                                <div class="chairman-section d-flex align-items-center">
                                                    <div class="chairman-details order-2 order-md-1 mr-md-20 mr-20 mr-20">
                                                        <h4>{{ $team->Name }}</h4>
                                                        <h5>- {{ $team->Batch }}</h5>
                                                    </div>

                                                    <div class="circular-image-container-director order-1 order-md-2">
                                                        <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" />
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End:  Director-all -->






    <!-- Start:vision-mission-area -->
    <section class="vision-mission-area wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
        <div class="container">
            <div class="row">
                @php
                    $mission = \App\Objects::find(4);
                @endphp
                <div class="col-md-6">
                    <div class="vision-card wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="vision-icon">
                            <img src="{{asset('front') }}/assets/images/about/vision.png">
                        </div>
                        <div class="vision-contents">
                            <h2>Vision</h2>
                           <p>{{ $mission->short }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="vision-card wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="vision-icon">
                            <img src="{{asset('front') }}/assets/images/about/mission.png">
                        </div>
                        <div class="vision-contents">
                            <h2>Mission</h2>
                            <p>{{ $mission->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ed:vision-mission-area -->



    <!-- Start:Ploicy -->
    <section class="policy-area wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="policy-card">
                        <div class="accordion" id="regularAccordionRobots">

                         @foreach(\App\Service::all() as $policy)
                            <div class="accordion-item accordion-item-custom-about">
                                <h2 class="accordion-header" id="regularHeadingFourth{{ $policy->id }}">
                                    <button class="accordion-button collapsed accordion-button-custom-about" type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseFourth{{ $policy->id }}" aria-expanded="false" aria-controls="regularCollapseFourth{{ $policy->id }}">
                                        {{ $policy->title }}
                                    </button>
                                </h2>
                                <div id="regularCollapseFourth{{ $policy->id }}" class="accordion-collapse collapse" aria-labelledby="regularHeadingFourth{{ $policy->id }}" data-bs-parent="#regularAccordionRobots">
                                    <div class="accordion-body">
                                        <p class="accordion-text">{!! $policy->short !!} </p>
                                        @if($policy->image !='')
                                             <a class="click-btn btn-style500" href="{{ asset('') }}/uploads/service/{{ $policy->image }}">Download Now</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Ploicy -->










    <!-- Progessbar -->
    <style>
        :root {
            --white: #fff;
            --black: #fff;
            --crystal: #a8dadd;
            --columbia-blue: #cee9e4;
            --midnight-green: #43e2f1;
            --yellow: #1e59a8;
            --timeline-gradient: rgba(206, 233, 228, 1) 0%, rgba(206, 233, 228, 1) 50%,
            rgba(206, 233, 228, 0) 100%;
        }
        .accordion-body>ul>li {
            list-style: disc;
            padding: 0px;
            margin:0px;
        }

        /*https://codepen.io/tutsplus/details/GRYEwXX*/
    </style>



    <!-- Start: JOURNEY -->
    <div class="container wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
        <div class="row">
            <div class="col-md-12">
                <div class="title-timeline">
                    <h3>JOURNEY</h3>
                </div>
            </div>
        </div>
        <div class="row desktop-timeline">
            <div class="col-md-12">
                 <div class="draggable-section">
                    <div class="ticker-wrapper-h">
                        <section class="timeline">
                            <ol class="news-ticker-h">
                                @foreach(\App\Activity::orderby('title', 'asc')->get() as $Journey)
                                <li>
                                    <div>
                                        <time>{{ $Journey->title }}</time> {{ $Journey->short }}
                                    </div>
                                </li>
                                @endforeach
        
        
                                <li></li>
                            </ol>
                        </section>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
    <div class="row mobile-timeline">
        <div class="col-md-12">
            <div class="timelinecc">
                <ul>
                    @foreach(\App\Activity::orderby('title', 'asc')->get() as $Journey)
                    <li>
                        <div class="contentss">
                            <p>{{ $Journey->short }} </p>
                        </div>
                        <div class="time">
                            <h4> {{ $Journey->title }}</h4>
                        </div>
                    </li>
                    @endforeach

                    <div style="clear:both;"></div>
                </ul>
            </div>
        </div>
    </div>


<style>
/* Container for the ticker */
.ticker-wrapper-h {
    display: flex;
    position: relative;
    overflow: hidden;
    
}

/* Styling for the news ticker items */
.news-ticker-h {
    display: flex;
    margin: 0;
    padding: 0;
    padding-left: 100%;
    z-index: 999;
    animation: scrollTicker 50s linear infinite;
}

.news-ticker-h li {
    display: flex;
    align-items: center;
    white-space: nowrap;
    padding-left: 20px;
}

.news-ticker-h:hover {
    animation-play-state: paused;
}

.news-ticker-h li div {
    /*display: flex;*/
    /*align-items: center;*/
}

/* Style for each <time> element with animation */
/* Style for each <time> element with animation */
.news-ticker-h li:nth-child(1) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 2s;
}
.news-ticker-h li:nth-child(2) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 4s;
}
.news-ticker-h li:nth-child(3) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 6s;
}
.news-ticker-h li:nth-child(4) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 8s;
}
.news-ticker-h li:nth-child(5) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 10s;
}

.news-ticker-h li:nth-child(6) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 12s;
}
.news-ticker-h li:nth-child(7) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 14s;
}


.news-ticker-h li:nth-child(8) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 16s;
}
.news-ticker-h li:nth-child(10) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 18s;
}

.news-ticker-h li:nth-child(11) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 20s;
}

.news-ticker-h li:nth-child(12) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 22s;
}

.news-ticker-h li:nth-child(13) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 24s;
}

.news-ticker-h li:nth-child(14) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 26s;
}

.news-ticker-h li:nth-child(15) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 28s;
}

.news-ticker-h li:nth-child(16) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 30s;
}

.news-ticker-h li:nth-child(17) time {
    animation: fadeUp 1s ease forwards;
    animation-delay: 32s;
}

/* Fade-up animation */
@keyframes fadeUp {
    0% {
        opacity: 0;
        transform: translateY(10px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}




@keyframes scrollTicker {
    0% {
        transform: translate3d(0, 0, 0);
    }
    100% {
        transform: translate3d(-100%, 0, 0);
    }
}


/* Continuous scroll animation */
@keyframes scrollTicker {
    0% {
        transform: translate3d(0, 0, 0);
    }
    100% {
        transform: translate3d(-50%, 0, 0); /* Scroll halfway to include duplicate items */
    }
}
</style>


    <!-- SISTER CONCERN section start 1 -->
    <section class="brand-secpull-left  sistern-card-wrapper"style="margin:60px 0px 10px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sec-content text-center">
                        <h2 class="sec-title">SISTER CONCERN</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-30 sister-consern-padding">
                <div class="all-sisier-logo">
                    <div class="circle" style="background-image: url({{asset('front') }}/assets/images/background/sister-shape.png);">


                        <div class="logo-sister-2 logo10" >
                            <a href=""><img src="{{asset('front') }}/assets/images/sister-consern/hpl.png" alt="Logo 4"></a>
                        </div>
                        @foreach(\App\photo_gallery_table::get() as $key=>$sister1)

                            @if($key==0)
                                <div class="logo-sister logo1">
                                    <a href="{{ $sister1->description }}"><img src="{{asset('/') }}uploads/photo/{{ $sister1->image }}" alt="{{ $sister1->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister1->title }}</h2>
                                </div>
                            @endif

                            @if($key==1)
                                <div class="logo-sister logo2">
                                    <a href="{{ $sister1->description }}"><img src="{{asset('/') }}uploads/photo/{{ $sister1->image }}" alt="{{ $sister1->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister1->title }}</h2>
                                </div>
                            @endif
                            @if($key==2)
                                <div class="logo-sister logo3">
                                    <a href="{{ $sister1->description }}"><img src="{{asset('/') }}uploads/photo/{{ $sister1->image }}" alt="{{ $sister1->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister1->title }}</h2>
                                </div>
                            @endif
                            @if($key==3)
                                <div class="logo-sister logo4">
                                    <a href="{{ $sister1->description }}"><img src="{{asset('/') }}uploads/photo/{{ $sister1->image }}" alt="{{ $sister1->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister1->title }}</h2>
                                </div>
                            @endif
                            @if($key==4)
                                <div class="logo-sister logo5">
                                    <a href="{{ $sister1->description }}"><img src="{{asset('/') }}uploads/photo/{{ $sister1->image }}" alt="{{ $sister1->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister1->title }}</h2>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="all-sisier-logo-2">
                    <div class="circle-2" style="background-image: url({{asset('front') }}/assets/images/background/sister-shape.png);">
                        @foreach(\App\photo_gallery_table::get() as $key2 => $sister2)
                            @if($key2 == 5)
                                <div class="logo-sister-2 logo55">
                                    <a href="{{ $sister2->description }}"><img src="{{ asset('/') }}uploads/photo/{{ $sister2->image }}" alt="{{ $sister2->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister2->title }}</h2>
                                </div>
                            @endif

                            @if($key2 == 6)
                                <div class="logo-sister-2 logo6">
                                    <a href="{{ $sister2->description }}"><img src="{{ asset('/') }}uploads/photo/{{ $sister2->image }}" alt="{{ $sister2->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister2->title }}</h2>
                                </div>
                            @endif

                            @if($key2 == 7)
                                <div class="logo-sister-2 logo7">
                                    <a href="{{ $sister2->description }}"><img src="{{ asset('/') }}uploads/photo/{{ $sister2->image }}" alt="{{ $sister2->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister2->title }}</h2>
                                </div>
                            @endif

                            @if($key2 == 8)
                                <div class="logo-sister-2 logo8">
                                    <a href="{{ $sister2->description }}"><img src="{{ asset('/') }}uploads/photo/{{ $sister2->image }}" alt="{{ $sister2->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister2->title }}</h2>
                                </div>
                            @endif
                        @endforeach




                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SISTER CONCERN section 1 end -->





    <!-- Start: GMP Accreditation -->
    <section class="accreditation mt-30 mb-50">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="row justify-content-center">
                        <div class="sec-content text-center">
                            <h2 class="sec-title">
                                <a href="#"> GMP Accreditation</a>
                            </h2>
                        </div>
                    </div>
                    
                    <div class="row">
                       <div class="testimonial-slider owl-carousel owl-theme">
                            @foreach(\App\Gmp::all() as $gmp)
                          <div class="accreditation-logo  wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <img src="{{asset('') }}uploads/gmp/{{ $gmp->image }}">
                          </div>
                           @endforeach
        
                       </div>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="row justify-content-center">
                        <div class="sec-content text-center">
                            <h2 class="sec-title">
                                <a href="#"> AWARDS</a>
                            </h2>
                        </div>
                    </div>
                    
                    <div class="row">
                       <div class="testimonial-slider owl-carousel owl-theme">
                            @foreach(\App\Award::all() as $gmp)
                          <div class="accreditation-logo  wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <img src="{{asset('') }}uploads/award/{{ $gmp->image }}">
                            <p class="award-logo">{{ $gmp->title }}</p>
                          </div>
                          
                           @endforeach
        
                       </div>
                    </div>
                        <!--@foreach(\App\Award::all() as $gmp)-->
                        <!--    <div class="col-md-3 col-6 justify-content-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">-->
                        <!--        <div class="accreditation-logo">-->
                        <!--            <img src="{{asset('') }}uploads/award/{{ $gmp->image }}">-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--@endforeach-->
                    
                </div>
            </div>
        </div>
    </section>
    
    <style>
        .award-logo{
            font-size:13px;
            color:#222;
            text-align:center;
            font-weight:500;
        }
    </style>
    <!-- END: GMP Accreditation -->
    
     <script type="text/javascript">
        
document.addEventListener("DOMContentLoaded", function () {
    const ticker = document.querySelector(".news-ticker-h");
    const tickerItems = ticker.innerHTML;
    ticker.innerHTML += tickerItems; // Duplicate items to create seamless scroll

    // Reset fade-up animation at the end of each scroll cycle
    ticker.addEventListener("animationiteration", () => {
        const timeElements = document.querySelectorAll(".news-ticker-h time");

        timeElements.forEach((time, index) => {
            // Remove and re-add the fadeUp class to trigger the animation again
            time.style.animation = "none";
            setTimeout(() => {
                time.style.animation = `fadeUp 1s ease forwards ${index * 2}s`; // Staggered delay for each <time>
            }, 0);
        });
    });
});


    </script>
    
    
@endsection

@extends('frontend.app')

@section('title')

    Photo Gallery | Healthcare Pharmaceuticals

@endsection


@section('main')


    <!-- Slider Gallery -->
    <section class="hero-sec3" style="padding-top:150px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-slider owl-carousel owl-theme">
                        @foreach(\App\Item::all() as $cat)
                        <div class="item hero-slider-item">
                            <img src="{{ asset('uploads/item/'.$cat->image) }}">
                            
                        </div>
                        @endforeach




                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Slider Gallery -->
    
    <style type="text/css">
        .hero-slider-item {
            width: 100%;
            height: auto;
            /* background-size: cover; */
            background-position: center center;
            background-repeat: no-repeat;
        }
      </style>


    @foreach($category as $photos)
        <section class="pt-20" style="padding-bottom: 0px !important">
            <div class="gallery-block grid-gallery">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-7 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="news-animation-pic news-title-pb-0">
                                <div class="sec-content text-left">
                                    <h2 class="sec-title text-left">{{$photos->name}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach(explode(',', $photos->images2) as $image)
                            <div class="col-md-6 col-lg-4 item">
                                <a class="lightbox" href="{{ asset('images/' . $image) }}">
                                    <img class="img-fluid image scale-on-hover" src="{{ asset('images/' . $image) }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endforeach




@endsection

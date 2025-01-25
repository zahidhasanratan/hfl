@extends('frontend.app')

@section('title')
    Museum | Dhaka | Jatiyo Party
@endsection

@section('about')

    <!-- start wpo-page-title -->
    <section class="wpo-page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>Museum</h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="{{ asset('/') }}">Home</a></li>
                            <li>Dhaka </li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->

    <!-- Gallery -->
    <!-- start wpo-portfolio-section -->
    <section class="wpo-portfolio-section section-padding">
        <div class="container">
            <div class="sortable-gallery">
                <!-- <div class="gallery-filters"></div> -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolio-grids portfolio-grids-custom gallery-container clearfix">

                            @foreach($medicalslider as $photos)
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('uploads/microslider/'.$photos->image) }}" class="fancybox"
                                           data-fancybox-group="gall-1">
                                            <img style="height: 250px;" src="{{ asset('uploads/microslider/'.$photos->image) }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div> <!-- end container -->
    </section>
    <!-- end wpo-portfolio-section -->
    <!-- Gallery -->


@endsection
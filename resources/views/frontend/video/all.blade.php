@extends('frontend.app')

@section('title')

    Video Gallery | DMC Alumni

@endsection


@section('main')
    <!-- Inner Page Header Serction Start Here -->
    <div class="inner-page-header">
        <div class="banner">
            <img src="{{asset('front') }}/images/banner/3.jpg" alt="Banner">
        </div>
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-page-locator">
                            <ul>

                                <li><a href="{{ asset('') }}">Home <i class="fa fa-compress" aria-hidden="true"></i> </a> Video Gallery</li>

                            </ul>
                        </div>
                        <div class="header-page-title">

                            <h1>Video Gallery</h1>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inner Page Header serction end here -->
    <!-- Home About Start Here -->
    <div class="blog-page-area gellary-area-main gallery-page gellary-area">
        <div class="container">
            <div class="row">
                <div class="main-title">
                    <h3 class="title-bg">Video Gallery</h3>
                </div>
            </div>
            <div class="row">


                @foreach($video as $video)
                <div class="col-md-4">
                    <div class="single-blog-item">
                        <div class="img-holder">

                            <iframe width="100%" height="180" src="https://www.youtube.com/embed/<?php echo $video->video;?>" title="<?php echo $video->title;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="text-holder">
                            <a href="#">
                                <h3 class="blog-title"><?php echo $video->title;?> </h3>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>
    <!-- Home About End Here -->



    <!-- Home About End Here -->
@endsection

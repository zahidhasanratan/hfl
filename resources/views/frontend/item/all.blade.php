@extends('frontend.app')

@section('title')

    {{$category->name }} | DMC Alumni

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

                                <li><a href="{{ asset('') }}">Home <i class="fa fa-compress" aria-hidden="true"></i> </a>  {{$category->name }}</li>

                            </ul>
                        </div>
                        <div class="header-page-title">

                            <h1> {{$category->name }}</h1>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Home About Start Here -->
    <div class="blog-page-area gellary-area-main gallery-page gellary-area">
        <div class="container">
            <div class="row">
                <div class="main-title">
                    <h3 class="title-bg">Photo Gallery</h3>
                </div>
            </div>
            <div class="row">

                @foreach(explode(',', $category->images2) as $image)
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-gellary">
                        <div class="image">
                            <img src="{{ asset('images/' . $image) }}" alt="">
                            <div class="overley">
                                <ul>
                                    <li><a href="{{ asset('images/' . $image) }}" data-lightbox="example-set" data-title="Photos from {{$category->name }}"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
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

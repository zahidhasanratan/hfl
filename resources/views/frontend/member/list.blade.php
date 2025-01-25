@extends('frontend.app')

@section('title')

    Executive Committee | DMC Alumni

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

                                <li><a href="{{ asset('') }}">Home <i class="fa fa-compress" aria-hidden="true"></i> </a> Executive Committee</li>

                            </ul>
                        </div>
                        <div class="header-page-title">

                            <h1>Executive Committee</h1>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inner Page Header serction end here -->
    <!-- Home About Start Here -->



    <!-- Home About Start Here -->
    <div class="team-page-area">
        <div class="container">
            @foreach(\App\photo_gallery_table::all() as $key=>$photo)

            <div class="col-md-3 col-lg-3 col-sm-6">
                <div class="single-member-area">
                    <div class="cl-single-member">
                        <figure><img class="img-responsive" src="{{asset('/') }}uploads/photo/{{ $photo->image }}" alt="jon"></figure>
                    </div>
                    <div class="article">
                        <h3><a href="#" data-id="1" class="cl-single-item-popup">{{ $photo->title }}</a></h3>
                        <div class="member-title">{{ $photo->designation }}</div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
    <!-- Home About End Here -->



    <!-- Home About End Here -->
@endsection

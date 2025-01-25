@extends('frontend.app')

@section('title')
    {{$page->title}} | Modern Herbal
@endsection

@section('slider')
    <div class="banner banner-static has-bg banner-small al-center has-bg-image">
        <div class="banner-cpn">
            <div class="container">
                <div class="content row">

                    <div class="banner-text pos-center">
                        <h1 class="page-title">{{$page->title}}</h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="banner-bg imagebg bg-image-loaded" style="background-image: url({{asset('front/image/banner-blog.jpg') }});">
            <img src="{{asset('front/image/banner-blog.jpg') }}" alt="">
        </div>
    </div>

@endsection

@section('about')
    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">

                <div class="row row-column">
                    <div class="col-md-12">
                        <h2 class="heading">{{$page->title}}</h2>
                        {!! $page->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('frontend.app')

@section('title')
    Career | Modern Herbal
@endsection

@section('slider')
    <div class="banner banner-static has-bg banner-small al-center has-bg-image">
        <div class="banner-cpn">
            <div class="container">
                <div class="content row">

                    <div class="banner-text pos-center">
                        <h1 class="page-title">Career</h1>
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
    <div class="section section-contents section-pad bg-light">
        <div class="container">
            <div class="content row">

                <!--<h2>What’s covered with life &amp; health insurance?</h2>-->
                <div class="row row-column-md mgtop-md">


                  @foreach($career as $intiatives)

                        <div class="carrier-box">
                            <div class="carrier-title">
                                <p><strong>{{$intiatives->title}}</strong><br></p>
                                <p>Modern Herbal Group</p>
                            </div>
                            {!! $intiatives->description !!}
                            <a target="_blank" style="margin-top: 10px" href="{{$intiatives->sub_title}}"
                             class="btn btn-sm">Bd Jobs Link</a>
                        </div>
                  @endforeach


                </div>

            </div>
        </div>
    </div>
@endsection
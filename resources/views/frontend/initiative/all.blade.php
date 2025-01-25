@extends('frontend.app')

@section('title')
    Initiatives | Modern Herbal
@endsection

@section('slider')
    <div class="banner banner-static has-bg banner-small al-center has-bg-image">
        <div class="banner-cpn">
            <div class="container">
                <div class="content row">

                    <div class="banner-text pos-center">
                        <h1 class="page-title">Initiatives</h1>
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


                  @foreach($initative as $intiatives)

                    <div class="col-sm-4">
                        <div class="image"><img style="height:190px;width:100%;" src="{{ asset('uploads/activity/'.$intiatives->image) }}" alt=""></div>
                        <a href="{{route('iniative.details',$intiatives->slug)}}"><h5>{{$intiatives->title}}</h5></a>
                        {!! $intiatives->short !!}
                    </div>
                  @endforeach


                </div>

            </div>
        </div>
    </div>
@endsection
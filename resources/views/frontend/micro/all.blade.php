@extends('frontend.app')
@section('title')
    Micro Finance  | PRISM Bangladesh Foundation
@endsection

@section('about')
    <div id="featured-title" class="clearfix featured-title-left">
        <div id="featured-title-inner" class="wprt-container clearfix">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading">Programs</h1>
                </div>

                <div id="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="breadcrumb-trail"><a href="{{asset('/')}}" title="Home" rel="home" class="trail-begin">Home</a> <span class="sep"><i class="rt-icon-right-arrow12"></i></span> <span class="trail-end">Micro Finance</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Main Content -->
        <div id="main-content" class="site-main clearfix">
            <div id="content-wrap">
                <div id="site-content" class="site-content clearfix">
                    <div id="inner-content" class="inner-content-wrap">
                        <div class="page-content">

                            <!-- ABOUT -->
                            <div class="row-about">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="wprt-spacer clearfix" data-desktop="20" data-mobi="60" data-smobi="60"></div>

                                            <div class="wprt-headings style-1 clearfix text-center">
                                                <h2 class="heading clearfix">Micro Finance</h2>
                                                <div class="sep clearfix"></div>

                                            </div>

                                            <div class="wprt-spacer clearfix" data-desktop="45" data-mobi="40" data-smobi="40"></div>
                                        </div>
                                    </div>

                                    <div class="row medium-gutters">

                                        <div class="col-md-6 col-sm-6">
                                            @foreach($medicalfeature as $i => $medicalfeature)

                                                @if($i == 0)
                                            <div class="wprt-headings style-1 clearfix">

                                                <p class="sub-heading clearfix">
                                                    {{$medicalfeature->short}}
                                                    <a style="padding-left: 7px" href="{{route('microfeature.details',$medicalfeature->slug)}}"> See more </a></p>

                                            </div>
                                                @endif
                                             @endforeach
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="wprt-images-grid" data-layout="slider" data-column="1" data-column2="1" data-column3="1" data-column4="1" data-gaph="0" data-gapv="0">
                                                <div id="images-wrap" class="cbp">

                                                 @foreach($medicalslider as $medicalslider)
                                                    <div class="cbp-item">
                                                        <div class="item-wrap">

                                                            <img src="{{ asset('uploads/microslider/'.$medicalslider->image) }}" alt="{{$medicalslider->title}}">
                                                        </div>
                                                    </div><!-- /.cbp-item -->
                                                @endforeach

                                                </div>
                                            </div><!-- /.wprt-images-grid -->

                                            <div class="wprt-spacer clearfix" data-desktop="0" data-mobi="15" data-smobi="40"></div>
                                        </div>
                                    </div>
                                </div><!-- /.container -->
                            </div>
                            <!-- END ABOUT -->


                        @foreach($medicalfeaturedata as $i => $medicalfeaturedata)

                            @if($i > 0)
                            <!-- What we dO -->
                            <div class="row-about">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="wprt-spacer clearfix" data-desktop="20" data-mobi="60" data-smobi="60"></div>

                                            <div class="wprt-headings style-1 clearfix text-center">
                                                <h2 class="heading clearfix">{{$medicalfeaturedata->title}}</h2>
                                                <div class="sep clearfix"></div>

                                            </div>

                                            <div class="wprt-spacer clearfix" data-desktop="45" data-mobi="40" data-smobi="40"></div>
                                        </div>
                                    </div>

                                    <div class="row medium-gutters">

                                        <div class="col-md-12">
                                            <div class="wprt-headings style-1 clearfix">

                                                <p class="sub-heading clearfix">
                                                    {{$medicalfeaturedata->short}}
                                                    <a style="padding-left: 7px" href="{{route('microfeature.details',$medicalfeaturedata->slug)}}"> See more </a></p>

                                            </div>
                                        </div>


                                    </div>
                                </div><!-- /.container -->
                            </div>
           @endif                 <!-- END What we dO -->
@endforeach


                            <!--Working Area -->
                            <div class="row-about ">
                                <div class="container">


                                    <!--<div class="row medium-gutters">-->

                                    <!--    <div class="col-md-12">-->
                                    <!--        <div class="working-map ">-->
                                    <!--            <a href=""><img class="work-map" src="{{asset('front/assets/img/map.png') }}"></a>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    
                                    
                                    <!---->
                                     <div class="row medium-gutters">

                                     <div class="col-md-12">
                                        <div class="working-map ">
                                            <!-- <a href=""><img class="work-map" src="assets/img/map.png"></a> -->
                                            <ul id="continents3">
                                                <li class="chandpur">
                                                    <a href="#">

                                                        <span class="con-info">
                                                            <strong>Chandpur</strong> 
                                                        <h3>Md. Abdul Rouf</h3>
                                                        <h3 style="color:#fff; font-size:15px">Co-ordinator</h3>  
                                                        <h3> 01712 079605</h3>                     
                                                        </span>
                                                    </a>
                                                </li>


                                                <li class="noakhali">
                                                    <a href="#">
                                                        <span class="con-info">
                                                            <strong>Noakhali</strong>
                                                           <h3>Md. Abdul Rouf</h3>
                                                        <h3 style="color:#fff; font-size:15px">Co-ordinator</h3>  
                                                        <h3> 01712 079605</h3> 
                                                        </span>
                                                    </a>
                                                </li>   


                                                <li class="feni">
                                                    <a href="#">
                                                        <span class="con-info">
                                                            <strong>Feni</strong>
<h3>Md. Abdul Rouf</h3>
                                                        <h3 style="color:#fff; font-size:15px">Co-ordinator</h3>  
                                                        <h3> 01712 079605</h3> 
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="lakshmipur">
                                                    <a href="#">
                                                        <span class="con-info">
                                                            <strong>Lakshmipur</strong>
                                                            <h3>Md. Abdul Rouf</h3>
                                                        <h3 style="color:#fff; font-size:15px">Co-ordinator</h3>  
                                                        <h3> 01712 079605</h3> 
                                                        </span>

                                                    </a>
                                                </li>
                                                <li class="comilla">
                                                    <a href="#">
                                                    <span class="con-info">
                                                        <strong>Comilla</strong>
                                                        <h3>Md. Abdul Rouf</h3>
                                                        <h3 style="color:#fff; font-size:15px">Co-ordinator</h3>  
                                                        <h3> 01712 079605</h3> 
                                                    </span>
                                                    </a>

                                                </li>
                                                <!--<li class="europe">-->
                                                <!--    <a href="#">-->
                                                <!--        <span>-->
                                                <!--            <strong>Europe</strong>-->
                                                <!--            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod-->
                                                <!--            tempor incididunt ut labore et dolore magna .-->
                                                <!--        </span>-->
                                                <!--    </a>-->
                                                <!--</li>    -->

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <style>
        /*****************MIcro finance************************/
        .con-info h3{
            color: #fff;
            font-size: 14px;
            margin-bottom: 0px;
            font-weight: 400;
        }


ul#continents1, ul#continents2, ul#continents3 {
    list-style: none;
    width: 600px;
    height: 800px;
    position: relative;
    background: url(front/assets/img/map.png) no-repeat 0 0;
    margin: 0 auto;
    /*border: 1px dashed #434844;*/
}

ul#continents1 li, ul#continents2 li, ul#continents3 li {
    position: absolute;
}

.chandpur {
    width: 51px;
    height: 60px;
    top: 438px;
    left: 322px;
    /*border: 1px solid #2285a4;*/
}

.noakhali {
    width: 40px;
    height: 55px;
    top: 492px;
    left: 378px;
    /*border: 1px solid #2000ff;*/
}

.feni {
    width: 32px;
    height: 56px;
    top: 487px;
    left: 422px;
    /*border: 1px solid #00ffe7;*/
}

.lakshmipur {
    width: 36px;
    height: 56px;
    top: 497px;
    left: 342px;
    /*border: 1px solid #2000ff;*/
}

.comilla {
    width: 49px;
    height: 76px;
    top: 417px;
    left: 371px;
    /*border: 1px solid #f00;*/
}

/*.europe {
    width: 120px;
    height: 84px;
    top: 1px;
    left: 211px;
}
*/




ul#continents1 li a, ul#continents2 li a, ul#continents3 li a  {
    display: block;
    outline: none;
    height: 100%;
}

ul#continents1 li a, ul#continents2 li a  {
    text-indent: -9000px;
}

ul#continents2 li a:hover, ul#continents3 li a:hover {
    /*background: url(images/map.png) no-repeat 0 0;    */
}

ul#continents2 li.chandpur a:hover, ul#continents3 li.chandpur a:hover {
    background-position: 0 -270px;
}

ul#continents2 li.noakhali a:hover, ul#continents3 li.noakhali a:hover {
    background-position: -226px -273px;
}

ul#continents2 li.comilla a:hover, ul#continents3 li.comilla a:hover {
    background-position: -209px -417px;
}

ul#continents2 li.europe a:hover, ul#continents3 li.europe a:hover {
    background-position: -22px -427px;
}

ul#continents2 li.feni a:hover, ul#continents3 li.feni a:hover {
    background-position: -363px -268px;
}

ul#continents2 li.lakshmipur a:hover, ul#continents3 li.lakshmipur a:hover {
    background-position: -412px -455px;
}

ul#continents3 li a span {
    display: none;
}

ul#continents3 li a:hover span {
    display: block;
}

ul#continents3 li a:hover span {
    display: block;
    padding: 16px;
    width: 285px;
    background: #2b863d;
    position: relative;
    top: 50%;
    font: 11px Arial, Helvetica, sans-serif;
    opacity: .95;
    filter: alpha(opacity=75);
    color: #FFF;
    font-size: 15px;
}

ul#continents3 li a:hover span strong {
    display: block;
    margin-bottom: 16px;
    font-size: 20px;
    text-decoration: underline;
}
    </style>
                                    <!---->
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="wprt-spacer clearfix" data-desktop="30" data-mobi="60" data-smobi="60"></div>
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                            </div>
                            <!-- END Working Area -->



                        </div><!-- /.page-content -->
                    </div><!-- /#inner-content -->
                </div><!-- /#site-content -->
            </div><!-- /#content-wrap -->
        </div><!-- /#main-content -->
@endsection


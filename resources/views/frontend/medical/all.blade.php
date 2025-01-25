@extends('frontend.app')
@section('title')
    Medical Waste Management | PRISM Bangladesh Foundation
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
                        <div class="breadcrumb-trail"><a href="{{asset('/')}}" title="Home" rel="home" class="trail-begin">Home</a> <span class="sep"><i class="rt-icon-right-arrow12"></i></span> <span class="trail-end">Medical Waste Management</span></div>
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
                                                <h2 class="heading clearfix">Medical Waste Management</h2>
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
                                                    <a style="padding-left: 7px" href="{{route('medicalfeature.details',$medicalfeature->slug)}}"> See more </a></p>

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

                                                            <img src="{{ asset('uploads/medicalslider/'.$medicalslider->image) }}" alt="{{$medicalslider->title}}">
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
                                                    <a style="padding-left: 7px" href="{{route('medicalfeature.details',$medicalfeaturedata->slug)}}"> See more </a></p>

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
                                                <li class="dhaka">
                                                    <a href="#">

                                                        <span class="con-info">
                                                            <strong>Dhaka</strong> 
                                                            
                                                        <h3>Mazharul Islam</h3>
                                                        <h3>Program Coordinator</h3>  
                                                        <h3> 01715 305107</h3>
                                                        
                                                        </span>
                                                    </a>
                                                </li>


                                                <li class="narayanganj">
                                                    <a href="#">
                                                        <span class="con-info">
                                                            <strong>Narayanganj</strong>
                                                           <h3>Mazharul Islam</h3>
                                                        <h3>Program Coordinator</h3>  
                                                        <h3> 01715 305107</h3>
                                                        </span>
                                                    </a>
                                                </li>   


                                                <li class="rangpur">
                                                    <a href="#">
                                                        <span class="con-info">
                                                            <strong>Rangpur</strong>

                                                           <h3>Istak Mahfuz</h3>
                                                        <h3>District Coordinator</h3>  
                                                        <h3> 01718 020896</h3>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="sylhet">
                                                    <a href="#">
                                                        <span class="con-info">
                                                            <strong>Sylhet</strong>
                                                           <h3>Moinul Islam</h3>
                                                        <h3>District Coordinator</h3>  
                                                        <h3> 01718 048792</h3>
                                                        </span>

                                                    </a>
                                                </li>
                                                <li class="khulna">
                                                    <a href="#">
                                                    <span class="con-info">
                                                        <strong>Jessore</strong>
                                                        <h3>Kh. Ezazur Rahman</h3>
                                                        <h3>Plant Operation Manager</h3>  
                                                        <h3> 01610 655050</h3>
                                                    </span>
                                                    </a>

                                                </li>
                                                <li class="rajshahi">
                                                    <a href="#">
                                                        <span class="con-info">
                                                            <strong>Rajshahi</strong>
                                                           <h3>Faruk jahangir Mithu</h3>
                                                        <h3>District Coordinator</h3>  
                                                        <h3> 01911 242937</h3>
                                                        </span>
                                                    </a>
                                                </li>    

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
                                        background: url({{asset('front/assets/img/mwm.png') }}) no-repeat 0 0;
                                        margin: 0 auto;
                                        /*border: 1px dashed #434844;*/
                                    }

                                    ul#continents1 li, ul#continents2 li, ul#continents3 li {
                                        position: absolute;
                                    }

                                    .dhaka {
                                        width: 52px;
                                        height: 55px;
                                        top: 372px;
                                        left: 264px;
                                        /*border: 1px solid #f00;*/
                                    }

                                    .narayanganj {
                                        width: 33px;
                                        height: 64px;
                                        top: 380px;
                                        left: 316px;
                                        /*border: 1px solid #f00;*/
                                    }

                                    .rangpur {
                                        width: 75px;
                                        height: 82px;
                                        top: 115px;
                                        left: 119px;
                                        /*border: 1px solid #f00;*/
                                    }

                                    .sylhet {
                                        width: 99px;
                                        height: 71px;
                                        top: 215px;
                                        left: 457px;
                                        /*border: 1px solid #f00;*/
                                    }

                                   .khulna {
                                    	width: 82px;
                                    	height: 77px;
                                    	top: 458px;
                                    	left: 115px;
                                    	/* border: 1px solid #f00; */
                                    }

                                   .rajshahi {
                                        width: 78px;
                                        height: 79px;
                                        top: 276px;
                                        left: 41px;
                                        /*border: 1px solid #222;*/
                                    }





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

                                    ul#continents2 li.dhaka a:hover, ul#continents3 li.dhaka a:hover {
                                        background-position: 0 -270px;
                                    }

                                    ul#continents2 li.narayanganj a:hover, ul#continents3 li.narayanganj a:hover {
                                        background-position: -226px -273px;
                                    }

                                    ul#continents2 li.rangpur a:hover, ul#continents3 li.rangpur a:hover {
                                        background-position: -363px -268px;
                                    }

                                     ul#continents2 li.sylhet a:hover, ul#continents3 li.sylhet a:hover {
                                        background-position: -412px -455px;
                                    }


                                    ul#continents2 li.khulna a:hover, ul#continents3 li.khulna a:hover {
                                        background-position: -209px -417px;
                                    }

                                    ul#continents2 li.rajshahi a:hover, ul#continents3 li.rajshahi a:hover {
                                        background-position: -22px -427px;
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
	/* opacity: .95; */
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


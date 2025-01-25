@extends('frontend.app')

@section('title')
    Executive Comittee | PRISM Bangladesh Foundation
@endsection


@section('about')
    <div id="featured-title" class="clearfix featured-title-left">
        <div id="featured-title-inner" class="wprt-container clearfix">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading"> Executive Committee</h1>
                </div>

                <div id="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="breadcrumb-trail"><a href="{{asset('/')}}" title="Home" rel="home" class="trail-begin">Home</a> <span class="sep"><i class="rt-icon-right-arrow12"></i></span> <span class="trail-end">Our  Executive Committee</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="main-content" class="site-main clearfix">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">






                        <!-- Our  Executive Committee -->
                        <div class="row-team">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wprt-spacer clearfix" data-desktop="83" data-mobi="60" data-smobi="60" style="height:83px"></div>
                                       @foreach($objects3 as $objects3)
                                        {!! $objects3->short !!}
@endforeach
                                        <div class="wprt-headings style-1 clearfix text-center">
                                            <h2 class="heading clearfix">Members</h2>
                                            <div class="sep clearfix"></div>
                                        </div><!-- /.wprt-headings -->



                                        <div class="wprt-spacer clearfix" data-desktop="45" data-mobi="40" data-smobi="40" style="height:45px"></div>

                                        <div class="wprt-news has-shadow has-shadow bullet-circle has-bullets" data-auto="false" data-column="4" data-column2="2" data-column3="1" data-gap="30">

                                            @foreach($company as $i => $company)

                                                @if($i == 0)
                                                    <div class="row">
                                                        <div class="col-md-4 col-lg-4 col-sm-6 col-md-offset-4 col-lg-offset-4">
                                                            <div class="news-item clearfix">
                                                                <div class="inner">
                                                                    <a href="#">
                                                                        <div class="thumb">
                                                                            <img style="height:300px;width: 100%;" src="{{ asset('uploads/company/'.$company->image) }}" alt="{{$company->title}}">
                                                                        </div>
                                                                    </a>
                                                                    <div class="text-wrap">
                                                                        <h3 class="title">{{$company->title}}</h3>
                                                                        <div class="position">{{$company->designation}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                       @endif
                                        @endforeach

                                                    <!--  -->

                                                    <div class="row">

                                                                <div class="row">
                                                                    @foreach($companydata as $i => $companydata)

                                                                        @if($i > 0)
                                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                                        <div class="news-item clearfix">
                                                                            <div class="inner">
                                                                                <a href="#">
                                                                                    <div class="thumb">
                                                                                        <img style="height:300px;width: 100%;" src="{{ asset('uploads/company/'.$companydata->image) }}" alt="{{$companydata->title}}">
                                                                                    </div>
                                                                                </a>
                                                                                <div class="text-wrap">
                                                                                    <h3 class="title">{{$companydata->title}}</h3>
                                                                                    <div class="position">{{$companydata->designation}}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="wprt-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40" style="height:70px"></div>
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                            </div>
                            <!-- END TEAM -->
                        </div><!-- /.page-content -->
                    </div><!-- /#inner-content -->
                </div><!-- /#site-content -->
            </div>
        @endsection
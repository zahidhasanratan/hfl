@extends('frontend.app')

@section('title')
    Our Team | PRISM Bangladesh Foundation
@endsection


@section('about')
    <div id="featured-title" class="clearfix featured-title-left">
        <div id="featured-title-inner" class="wprt-container clearfix">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading"> Our Team</h1>
                </div>

                <div id="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="breadcrumb-trail"><a href="{{asset('/')}}" title="Home" rel="home" class="trail-begin">Home</a> <span class="sep"><i class="rt-icon-right-arrow12"></i></span> <span class="trail-end">Our  Team</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="inner-content" class="inner-content-wrap">
        <div class="page-content">






            <!-- Our  Executive Committee -->
            <div class="row-team">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="wprt-spacer clearfix" data-desktop="45" data-mobi="40" data-smobi="40" style="height:45px"></div>

                            <div class="wprt-news has-shadow bullet-circle has-bullets" data-auto="false" data-column="4" data-column2="2" data-column3="1" data-gap="30">
                                <div class="row">
                                    @foreach($team as $i => $team)
                                    <div class="col-md-6 col-lg-6">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="news-item clearfix">
                                                    <div class="inner">
                                                        <a href="#">
                                                            <div class="thumb">
                                                                <img src="{{ asset('uploads/team/'.$team->image) }}" alt="Image">
                                                            </div>
                                                        </a>
                                                        <div class="text-wrap">
                                                            <h3 class="title">{{$team->title}}</h3>
                                                            <div class="position">{{$team->designation}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6">
                                                <div class="inner">
                                                    {!! $team->short !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>

                                <div class="wprt-headings style-1 clearfix text-center">
                                    <h2 class="heading clearfix">Microfinance</h2>
                                    <div class="sep clearfix"></div>
                                </div><!-- /.wprt-headings -->
                                <div class="wprt-spacer clearfix" data-desktop="45" data-mobi="40" data-smobi="40" style="height:45px"></div>


                                <div class="row">
                                    @foreach($micro as $i => $micro)
                                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
                                        <div class="news-item clearfix">
                                            <div class="inner">
                                                <a href="#">
                                                    <div class="thumb">
                                                        <img src="{{ asset('uploads/team/'.$micro->image) }}" alt="Image">
                                                    </div>
                                                </a>
                                                <div class="text-wrap">
                                                    <h3 class="title">{{$micro->title}}</h3>
                                                    <div class="position">{{$micro->designation}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  @endforeach
                                    <div class="wprt-headings style-1 clearfix text-center">
                                        <h2 class="heading clearfix">Medical Waste Management</h2>
                                        <div class="sep clearfix"></div>
                                    </div><!-- /.wprt-headings -->
                                    <div class="wprt-spacer clearfix" data-desktop="45" data-mobi="40" data-smobi="40" style="height:45px"></div>


                                        @foreach($medical as $i => $medical)
                                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
                                                <div class="news-item clearfix">
                                                    <div class="inner">
                                                        <a href="#">
                                                            <div class="thumb">
                                                                <img src="{{ asset('uploads/team/'.$medical->image) }}" alt="Image">
                                                            </div>
                                                        </a>
                                                        <div class="text-wrap" style="height:95px;">
                                                            <h3 class="title">{{$medical->title}}</h3>
                                                            <div class="position">{{$medical->designation}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                </div>
                            </div>
                        </div>

                        <div class="wprt-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40" style="height:70px"></div>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <!-- END TEAM -->
    </div>


@endsection
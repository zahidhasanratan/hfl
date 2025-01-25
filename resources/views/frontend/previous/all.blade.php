@extends('frontend.app')

@section('title')
    Previous Program | PRISM Bangladesh Foundation
@endsection


@section('about')
    <div id="featured-title" class="clearfix featured-title-left">
        <div id="featured-title-inner" class="wprt-container clearfix">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading"> Previous Program </h1>
                </div>

                <div id="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="breadcrumb-trail"><a href="{{asset('/')}}" title="Home" rel="home" class="trail-begin">Home</a> <span class="sep"><i class="rt-icon-right-arrow12"></i></span> <span class="trail-end">Previous Program </span></div>
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
                                        <div class="wprt-accordions style-2">
                                        @foreach($previous as  $i => $previous)
                                            <div class="accordion-item <?php if($i ==0) echo 'active'?> no-icon">
                                                <h3 class="accordion-heading"><span class="inner">{{$previous->title}}</span></h3>

                                                <div class="accordion-content" <?php if($i ==0) echo 'style="display: block;"'?>>
                                                    <div class="wprt-list clearfix icon-left icon-top style-2">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="inner">
                                                                <h3>{{$previous->title}}</h3>
                                                                {!! $previous->description !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="inner">
                                                                <div class="col-md-12 col-lg-12">
                                                                    <div class="col-md-12 col-lg-12">
                                                                        <div class="news-large">
                                                                            <div class="news-large-image">
                                                                                <a href=""> <img src="{{ asset('uploads/previous/'.$previous->image) }}" alt="Image"></a>
                                                                            </div>
                                                                            {!! $previous->short !!}
                                                                        </div>
                                                                    </div>


                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.accordion-item -->
                                        @endforeach


                                        </div><!-- /.wprt-accordions -->

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
    </div>


@endsection
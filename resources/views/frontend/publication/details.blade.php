@extends('frontend.app')

@section('title')
    {{$publication->title}} | PRISM Bangladesh Foundation
@endsection

@section('about')
    <div class="row-why-us " style="margin: 15px 0">
        <div class="container">
            <div class="row equalize sm-equalize-auto">


                <div class="col-md-12">
                    <div class="wprt-content-box clearfix">
                        <div class="col-md-12">
                            <div class="wprt-headings style-1 clearfix">
                                <h2 class="heading clearfix">

                                    {{$publication->title}}

                                </h2>
                                <div class="sep clearfix"></div>
                                <p class="sub-heading clearfix">{!! $publication->description !!} </p>
                            </div><!-- /.wprt-headings -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.wprt-content-box -->
                </div><!-- /.col-md-6 -->



            </div>
        </div>
    </div>
@endsection

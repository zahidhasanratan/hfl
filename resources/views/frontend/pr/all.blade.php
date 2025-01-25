@extends('frontend.app')
@section('title')
    All PR News
@endsection

@section('content')
    <article>
        <div class="page-content">
            <div class="content-left">
                <div class="latest-head">
                    <div class="page-head">
                        <div class="page-name">
                            <div class="for-news active"><a>ALL PR NEWS</a>
                            </div>
                            {{--<div class="for-rating "><a href="registerc201.html">BROWSE RATINGS</a>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="all-content">
                    <div class="news-show">
                        <div class="all">

                            @foreach($allprnews as $newshome)
                                <div class="detail-link-block month12_2019" data-update="2019-12-13 00:00:00">
                                    <div>
                                        <div class="date">
                                            <div>{{$newshome->sub_title}}</div>
                                        </div>
                                        <div class="content">
                                            <h3 class="head"><a href="{{ route('pr.news.all') }}">{{$newshome->short}}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach




                        </div>

                    </div>
                </div>
            </div>
            @include('frontend.common.right')

        </div>
    </article>
@endsection


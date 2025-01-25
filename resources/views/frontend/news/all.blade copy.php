@extends('frontend.app')

@section('title')

        News | Healthcare Pharmaceuticals

@endsection


@section('main')
    <!-- Start: Newsroom -->
    <div class="static-bg">
        <img class="lazy lazyLoaded" data-load-priority="0" src="{{asset('front') }}/assets/images/background/rotate.jpg" alt="">
    </div>
    <section class="newsroom sec-ptb pt-200">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="news-animation-pic news-title-pb-0">
                        <div class="sec-content text-left">
                            <h2 class="sec-title text-left news-title-pb-0">NEWSROOM</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-30 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="col-md-9">

                    @foreach(\App\News::orderBy('id','DESC')
                               ->get() as $news)
                    <div class="Newsroom-inner">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-xs-12 col-sm-6">
                                <div class="newroom-pic">
                                    <a href="{{ route('news.details',$news->slug) }}"> <img src="{{asset('/') }}uploads/news/{{ $news->image }}"></a>
                                </div>
                            </div>

                            <div class="col-md-7 col-xs-12 col-sm-6">
                                <div class="newroom-title">
                                    <h3><a href="{{ route('news.details',$news->slug) }}">{{ \Illuminate\Support\Str::limit($news->title, 70, '...') }} </a></h3>
                                    <h4>{{ $news->short }}</h4>
                                </div>
                            </div>

                            <div class="col-md-2 col-xs-12 col-sm-12">
                                <div class="newroom-date">
                                    <p>{{ $news->sub_title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- End: Newsroom -->



@endsection

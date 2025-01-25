@extends('frontend.app')
@section('title')
    Article | Healthcare Pharmaceuticals
@endsection

@section('main')
<div class="static-bg">
        <img class="lazy lazyLoaded" data-load-priority="0" src="{{asset('front') }}/assets/images/background/rotate.jpg" alt="">
    </div>
    <!-- Start: Newsroom -->
    <section class="newsroom sec-ptb pt-200">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="news-animation-pic news-title-pb-0">
                        <div class="sec-content text-left">
                            <h2 class="sec-title text-left news-title-pb-0">ARTICLE</h2>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row mt-30 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                @foreach(\App\Article::orderBy('id','DESC')
                                               ->get() as $news)
                  <div class="col-md-6 col-lg-6">
                    <div class="blog-item blog-box-shadow wow fadeInUp mb-15" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <!-- blog item 1 -->
                        <div class="img-box">
                            <img src="{{asset('/') }}uploads/article/{{ $news->image }}" alt="{{ $news->title }}">
                        </div>
                        <div class="content-box">
                            <div class="title-box">
                                <h3><a href="{{ route('article.details',$news->slug) }}">{{ \Illuminate\Support\Str::limit($news->title, 70, '...') }} </a></h3>
                            </div>
                            <div class="author-news">
                                <h3>By <span>{{ $news->short }}</span></h3>
                                <h4>{{ $news->sub_title }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End: Newsroom -->


@endsection


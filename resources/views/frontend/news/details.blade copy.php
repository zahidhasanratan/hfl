@extends('frontend.app')

@section('title')

    {{$news->title}} | Healthcare Pharmaceuticals

@endsection


@section('main')

    <!-- News -->
    <section class="newsroom sec-ptb pt-200">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="blog-item-wrapper">
                        <div class="blog-left-box blog-item wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <!-- blog item 1 -->
                            <div class="img-box news-box-custom" style="width: 100%;">
                                <img  src="{{asset('/') }}uploads/news/{{ $news->image }}" alt="{{$news->title}}">
                            </div>
                            <div class="content-box content-box-custom">
                                <div class="meta-box">
                                    <ul class="meta-info d-flex">
                                        <li>
                                            <span><a href="#">{{ $news->sub_title }}</a></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="title-box blog-title">
                                    <h3><a href="">{{$news->title}}</a></h3>
                                </div>
                                <div class="blog-body">
                                    <p class="mt-3 news-article">
                                        {!! $news->description !!}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-lg-4 news-right-sidebar">

                    @foreach(\App\News::orderBy('id', 'DESC')->take(10)->get() as $news)
                    <div class="blog-item blog-box-shadow wow fadeInUp mb-15" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <!-- blog item 1 -->
                        <div class="img-box">
                            <img src="{{asset('/') }}uploads/news/{{ $news->image }}" alt=" {{ $news->title }}">
                        </div>
                        <div class="content-box">
                            <div class="title-box">
                                <h3>
                                    <a href="{{ route('news.details',$news->slug) }}">{{ \Illuminate\Support\Str::limit($news->title, 70, '...') }} </a>
                                </h3>
                                <p>{{ $news->short }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>

        <style type="text/css">
            .news-box-custom{
                width: 100%;
                overflow: hidden;
            }
            .blog-item .content-box-custom{
                width: 100%;
            }
            .news-article{
                font-size: 15px;
                line-height: 22px;
            }


            /* Smartphones (portrait and landscape) ----------- */
            @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
                .news-right-sidebar{
                    margin-top: 20px;
                }

            }

        </style>
    </section>
    <!-- End: Newsroom -->


@endsection

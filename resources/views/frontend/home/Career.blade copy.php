@extends('frontend.app')

@section('title','Career | Healthcare Pharmaceuticals')


@section('main')

 <div class="static-bg">
        <img class="lazy lazyLoaded" data-load-priority="0" src="{{asset('front') }}/assets/images/background/rotate.jpg" alt="">
    </div>
    <!-- Start: Career -->
    <section class="career-wrap sec-ptb pt-200">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <ul class="job-list">
                        @foreach(\App\Post::orderBy('sequence', 'asc')->get() as $post)
                        <li class="job-preview">
                            <div class="content float-left">
                                <h4 class="job-title">
                                    {{ $post->title }}
                                </h4>
                                <h5 class="company">
                                    {{ $post->location }}
                                </h5>

                                    {!!  $post->description  !!}

                                <style>
                                    p{
                                        color: #e3dbdb; font-size: 14px; padding-top: 15px; line-height: 23px;
                                    }
                                </style>
                            </div>
                            @if($post->link !='')
                            <a target="_blank" href="{{ $post->link }}" class="btn btn-apply float-sm-right float-xs-left">
                                View Details
                            </a>
                            @else
                                <a href="{{ route('career.details',$post->slug) }}" class="btn btn-apply float-sm-right float-xs-left">
                                    View Details
                                </a>
                             @endif

                            </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Career -->




@endsection

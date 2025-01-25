@extends('frontend.app')

@section('title', $news->title . ' | Healthcare Pharmaceuticals')


@section('main')

<div class="hero-section">
    <div class="hero-slider owl-carousel owl-theme">
      <div class="hero-single" style="background: url(assets/img/slider/4.jpg); max-height: 180px;">
      </div>
    </div>
  </div>


<!-- Career Area -->
<section class="career-wrap pt-50 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="career-details justify-content-center">
                    <div class="career-image">
                        <img src="{{ asset('/') }}uploads/post/{{ $news->image }}">
                    </div>

                    <div class="career-button justify-content-center">
{{--                        <a href="{{ route('post.show.view',$news->slug) }}" class="btn btn-apply float-sm-center float-xs-center">--}}
{{--                            Apply Now--}}
{{--                        </a>--}}
                        <a href="{{ $news->link }}" class="btn btn-apply float-sm-center float-xs-center">
                            Apply Now
                        </a>


                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Career Area -->

@endsection

@extends('frontend.app')

@section('title','About | Healthcare Pharmaceuticals')


@section('main')

<div class="hero-section">
    <div class="hero-slider owl-carousel owl-theme">
      <div class="hero-single" style="background: url({{ asset('front/assets/img/slider/4.jpg') }}); max-height: 180px;">
      </div>
    </div>
  </div>


<!-- Career Area -->
<section class="career-wrap pt-100">
<div class="container">
<div class="row">
  <div class="col-md-10 offset-md-1">
    <ul class="job-list">
        @foreach($career as $intiatives)
      <li class="job-preview">
        <div class="content float-left">
          <h4 class="job-title"> {{$intiatives->title}} </h4>
          <h5 class="company"> {{$intiatives->location}} </h5>
          <p style="margin-left:0in; margin-right:0in">
            <span style="font-size:11pt">
              <span style="font-family:Calibri,sans-serif"> {!! $intiatives->description !!}</span>
            </span>

          </p>

        </div>
        @if($intiatives->link !='')
                            <a target="_blank" href="{{ $intiatives->link }}" class="btn btn-apply float-sm-right float-xs-left">
                                View Details
                            </a>
                            @else
                                <a href="{{ route('post.show.view',$intiatives->slug) }}" class="btn btn-apply float-sm-right float-xs-left">
                                    View Details
                                </a>
                             @endif
        {{-- <a href="{{ route('post.show.view',$intiatives->slug) }}" class="btn btn-apply float-sm-right float-xs-left"> View Details </a> --}}
      </li>
      @endforeach
    </ul>
  </div>
</div>
</div>
</section>
<!-- Career Area -->
@endsection

@extends('frontend.app')

@section('title','About | Healthcare Pharmaceuticals')


@section('main')

   <!-- Start: SIngle Product -->
   <main class="main">
       <div class="hero-section">
           @php
               $lastSlug = basename(url()->current());
               $menu = \App\Menu::where('slug', $lastSlug)->first();
               $banner = $menu ? $menu->image : null;
           @endphp

           @if($banner)
               <div class="hero-single" style="background: url({{ asset('uploads/menu/' . $banner) }}); max-height: 180px;">
               </div>
           @else
               <div class="hero-single" style="background: url({{ asset('front/assets/img/slider/4.jpg') }}); max-height: 180px;">
               </div>
           @endif
       </div>




       <section class="facilities-details-wrap py-80">
        <div class="container">
          {{-- @foreach ($facilities as $facility) --}}
          @foreach(\App\Facility::all() as $key => $facility)
            <div class="row justify-content-start align-items-center wow fadeInUp pb-30 mb-50"
                 data-wow-delay="500ms" data-wow-duration="1500ms"
                 style="visibility: visible; animation-duration: 1500ms; animation-delay: 500ms; animation-name: fadeInUp;">

              {{-- Check for alternating content alignment --}}
              @if ($loop->index % 2 == 0)
                <div class="col-md-7 order-2 order-md-1">
                  <div class="facilities-details">
                    <h2>{{ $facility['title'] }}</h2>
                    <div class="facilities-inner-details">
                      <div class="about-info">
                        <p>{!! $facility->short !!}</p>
                        <div class="btn-box text-center mt-30">
                          <a href="{{ route('facility.details', $facility->slug) }}" class="read-more-btn-wo-border">Know more</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 order-1 order-md-2">
                  <div class="facilities-video">
                    @php
                        $videoId = '';
                        if (preg_match("/v=([a-zA-Z0-9_-]+)/", $facility->video, $matches)) {
                            $videoId = $matches[1];
                        }
                    @endphp
                    @if($videoId)
                        <iframe class="mapp" width="100%" height="280" src="https://www.youtube.com/embed/{{ $videoId }}" title="{{ $facility->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @elseif(!empty($facility->image))
                        <img src="{{ asset('/') }}uploads/facility/{{ $facility->image }}"
                             alt="{{ $facility->title }}"
                             width="100%"
                             height="280">
                    @else
                        <p>No video or image available.</p>

                    @endif
                  </div>
                </div>
              @else
                <div class="col-md-5">
                  <div class="facilities-video">
                    @php
                        $videoId = '';
                        if (preg_match("/v=([a-zA-Z0-9_-]+)/", $facility->video, $matches)) {
                            $videoId = $matches[1];
                        }
                    @endphp
                    @if($videoId)
                        <iframe class="mapp" width="100%" height="280" src="https://www.youtube.com/embed/{{ $videoId }}" title="{{ $facility->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @elseif(!empty($facility->image))
                        <img src="{{ asset('/') }}uploads/facility/{{ $facility->image }}"
                             alt="{{ $facility->title }}"
                             width="100%"
                             height="280">
                    @else
                        <p>No video or image available.</p>
                    @endif

                    {{-- <iframe class="mapp" width="100%" height="280" src="{{ $facility['video_url'] }}"
                            title="{{ $facility['title'] }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write;
                            encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe> --}}
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="facilities-details">
                    <h2>{{ $facility['title'] }}</h2>
                    <div class="facilities-inner-details">
                      <p>{!! $facility->short !!}</p>
                      <div class="btn-box text-center mt-30">
                        <a href="{{ route('facility.details', $facility->slug) }}" class="read-more-btn-wo-border">Know more</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endif

            </div>
          @endforeach
        </div>
      </section>



 </main>


 <style type="text/css">

 </style>


@endsection

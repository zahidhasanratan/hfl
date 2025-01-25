@extends('frontend.app')

@section('title','Global-Colaboration | Healthcare Pharmaceuticals')


@section('main')

    <!-- Start: SIngle Product -->
    <main class="main">

        <div class="hero-slider owl-carousel owl-theme">
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


     <section class="global-wrapper pt-50">
       <div class="container">
         <div class="row justify-content-center">

          {{-- @foreach(\App\Flag::where('Type', 'Australia')->orderBy('Sequence', 'asc')->get() as $asia) --}}
          @foreach(\App\Flag::orderBy('id', 'desc')->get() as $item)
          <div class="col-lg-3 col-6">
            <div class="global-logo wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".70s">
              <a href=""><img src="{{ asset('uploads/flag/' . $item->image) }}"> </a>
              <h2 class="global-country-name">{{ $item->title }}</h2>
            </div>
          </div>

          @endforeach




         </div>
     </div>

     </section>
   </main>


   <style type="text/css">

   </style>

     <!-- End: SIngle Product -->

@endsection

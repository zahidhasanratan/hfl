@extends('frontend.app')


@section('title')
    @if(isset($page->title))
    {{$page->title}} | Healthcare Pharmaceuticals
    @endif
@endsection

@section('main')


     <!-- Start: SIngle Product -->
   <main class="main">
    <div class="hero-section">
       <div class="hero-slider owl-carousel owl-theme">

           @php
               $banner = \App\Menu::where('slug', $page->title_uri)->first()->image ;
           @endphp
           @if($banner =='')
        <div class="hero-single" style="background: url({{ asset('front/assets/img/slider/4.jpg') }}); max-height: 180px;">
        </div>
               @else
               <div class="hero-single" style="background: url({{ asset('uploads/menu') }}/{{ $banner }}); max-height: 180px;">
               </div>
           @endif


       </div>
     </div>




   <!-- News Area -->
     <div class="blog-single-area pt-50 pb-50">
       <div class="container">
         <div class="row">
           <div class="col-lg-12">
             <div class="blog-single-wrap">
               <div class="blog-single-content">

                 <div class="blog-info">

                   <div class="blog-details">
                     <h3 class="blog-details-title mb-20">{{ $page->title }}</h3>
                     <p class="mb-10"> {!! $page->description !!} </p>
                     {{-- <p class="mb-10"> But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. </p>
                     <blockquote class="blockqoute"> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution. <h6 class="blockqoute-author">Mark Crawford</h6>
                     </blockquote>
                     <p class="mb-20"> In a free hour when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection. </p>

                     <p class="mb-20"> Power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection. </p>
                     <hr> --}}

                   </div>

                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   <!-- News Area -->



 </main>

   <!-- End: SIngle Product -->

@endsection

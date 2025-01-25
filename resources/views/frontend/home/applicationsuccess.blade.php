@extends('frontend.app')

@section('title','Research & Development | Healthcare Pharmaceuticals')


@section('main')


<main class="main">
    <!-- Hero Section -->
    <div class="hero-section">
       <div class="hero-slider owl-carousel owl-theme">
         <div class="hero-single" style="background: url({{ asset('front/assets/img/slider/4.jpg') }}); max-height: 180px;">
         </div>
       </div>
     </div>

    <section class="facilities-details-wrap">
        <div class="container">
            <div class="row justify-content-start align-items-center">
                <div class="col-md-12">


                        <div class="facilities-details wow fadeInUp pb-30" data-wow-delay="500ms" data-wow-duration="1500ms">
                            <div class="facilities-pic">

                                <h1 class="research-title">Application Form Habe Been Submitted Successfully</h1>
                            </div>

                        </div>


                </div>
            </div>


        </div>
    </section>
</main>

@endsection

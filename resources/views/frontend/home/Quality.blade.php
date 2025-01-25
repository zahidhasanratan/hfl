@extends('frontend.app')

@section('title','Quality Management System | Healthcare Pharmaceuticals')


@section('main')
    <div class="static-bg">
        <img class="lazy lazyLoaded" data-load-priority="0" src="{{asset('front') }}/assets/images/background/rotate.jpg" alt="">
    </div>




    <!-- Start: Facilities Section -->
    <!-- Start: Facilities Section -->
    <section class="facilities-details-wrap pt-200">
        <div class="container">
            <div class="row justify-content-start align-items-center">
                <div class="col-md-12">

                    @foreach(\App\Quality::all() as $key=>$research)

                        <div class="facilities-details wow fadeInUp pb-30" data-wow-delay="500ms" data-wow-duration="1500ms">
                            <div class="facilities-pic">
                                <img src="{{ asset('') }}uploads/quality/{{ $research->image }}">
                                <h1 class="research-title">{{ $research->title  }}</h1>
                            </div>
                            <div class="facilities-inner-details">
                                @php
                                    // Split the content into words
                                    $words = explode(' ', $research->short);
                                    // First 50 words
                                   // $firstPart = implode(' ', array_slice($words, 0, 60));
                                    $firstPart = $research->short;
                                    // Remaining words
                                    // $remainingPart = implode(' ', array_slice($words, 60));
                                    $remainingPart = $research->description;

                                @endphp

                                <p>{!! $firstPart !!} </p>

                                @if(!empty($remainingPart))
                                    <div class="{{ $key == 0 ? 'additional-content_one about-info content pt-50' : ($key == 1 ? 'additional-content_two about-info content pt-50' : ($key == 2 ? 'additional-content_three about-info content pt-50' : ($key == 3 ? 'additional-content_four about-info content pt-50' : 'additional-content_' . $key . ' about-info content pt-50'))) }}" style="display:none;">
                                        <p>{!! $remainingPart !!}</p>
                                    </div>

                                    <div class="btn-box text-center mt-30">
                                        <a id="{{ $key == 0 ? 'readMoreBtn_One' : ($key == 1 ? 'readMoreBtn_Two' : ($key == 2 ? 'readMoreBtn_Three' : ($key == 3 ? 'readMoreBtn_Four' : 'readMoreBtn_' . $key))) }}" class="read-more-btn-wo-border">
                                            Know more
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                    <!--{!! $research->description !!}-->
                    @endforeach


                </div>
            </div>


        </div>
    </section>
    <!-- End: Facilities Section -->



    <!-- End:Technology provider -->

    <script>
        document.getElementById("readMoreBtn_One").addEventListener("click", function() {
            var additionalContent = document.querySelector(".additional-content_one");
            if (additionalContent.style.display === "none") {
                additionalContent.style.display = "block";
                this.textContent = "Read Less";
            } else {
                additionalContent.style.display = "none";
                this.textContent = "Read More";
            }
        });

        document.getElementById("readMoreBtn_Two").addEventListener("click", function() {
            var additionalContent = document.querySelector(".additional-content_two");
            if (additionalContent.style.display === "none") {
                additionalContent.style.display = "block";
                this.textContent = "Read Less";
            } else {
                additionalContent.style.display = "none";
                this.textContent = "Read More";
            }
        });



        document.getElementById("readMoreBtn_Three").addEventListener("click", function() {
            var additionalContent = document.querySelector(".additional-content_three");
            if (additionalContent.style.display === "none") {
                additionalContent.style.display = "block";
                this.textContent = "Read Less";
            } else {
                additionalContent.style.display = "none";
                this.textContent = "Read More";
            }
        });

        document.getElementById("readMoreBtn_Four").addEventListener("click", function() {
            var additionalContent = document.querySelector(".additional-content_four");
            if (additionalContent.style.display === "none") {
                additionalContent.style.display = "block";
                this.textContent = "Read Less";
            } else {
                additionalContent.style.display = "none";
                this.textContent = "Read More";
            }
        });


    </script>
@endsection

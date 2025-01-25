@extends('frontend.app')

@section('title','Research & Development | Healthcare Pharmaceuticals')


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

                  @foreach(\App\Research::all() as $key=>$research)

                    <div class="facilities-details wow fadeInUp pb-30" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <div class="facilities-pic">
                            <img src="{{ asset('') }}uploads/research/{{ $research->image }}">
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

{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-md-9">--}}
{{--                    <div class="global-table">--}}
{{--                        <div class="table-responsive py-5">--}}
{{--                            <table class="table table-bordered table-custom-global-2">--}}
{{--                                <tbody>--}}
{{--                                <tr class="align-items-center">--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Machines</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Origin</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}

{{--                                <tr class="align-items-center">--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Fluidized Bed Dryer</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Aromatic, Switzerland</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}


{{--                                <tr class="align-items-center">--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Mixer-Granulator</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Collette, Belgium</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}



{{--                                <tr class="align-items-center">--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Tumble Mixe</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Servolift, Germany</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}


{{--                                <tr class="align-items-center">--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Auto-Coating machine</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Driam, Germany</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}


{{--                                <tr class="align-items-center">--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Auto- Blister pack</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Horn Noak, Germany</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}


{{--                                <tr class="align-items-center">--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Water Treatment plant </p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Christ, Switzerland</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}


{{--                                <tr class="align-items-center">--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>HVAC</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="country-name">--}}
{{--                                            <p>Trane, USA</p>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>
    <!-- End: Facilities Section -->

    <!-- End: Facilities Section -->


    <!--Start: Technology provider -->
    
    <!--<div class="container sec-ptb-30">-->
    <!--    <div class="row wow fadeInUp pb-30" data-wow-delay="500ms" data-wow-duration="1500ms">-->
    <!--        <div class="col-md-12">-->
    <!--            <div class="tech-provider-box text-center">-->
    <!--                <div class="tech-pic">-->
                        <!-- <img src="assets/images/technology/2.png"> -->
    <!--                </div>-->
    <!--                <h3>PROJECTS PIPELINE</h3>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="row wow fadeInUp pb-30 justify-content-center mt-30" data-wow-delay="500ms" data-wow-duration="1500ms">-->
    <!--        <div class="research-logo">-->

    <!--        @foreach(\App\Project::all() as $project)-->
    <!--            <div class="research-logo-all wow fadeInUp" data-wow-delay="200ms" data-wow-duration="2500ms">-->
    <!--                <img src="{{ asset('') }}uploads/project/{{ $project->image }}">-->
    <!--                <h3 class="research-logo-name">{{ $project->title }}</h3>-->
    <!--            </div>-->
    <!--            @endforeach-->



    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
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

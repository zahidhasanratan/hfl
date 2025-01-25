@extends('frontend.app')

@section('title','Facility | Healthcare Pharmaceuticals')


@section('main')


    <!-- Start: Facilities Section -->
    <section class="facilities-details-wrap pt-200">
        <div class="container">
            @foreach(\App\Project::all() as $key => $facility)
                @if($key % 2 == 0)
            <div class="row justify-content-start align-items-center wow fadeInUp pb-30 mb-50" data-wow-delay="500ms" data-wow-duration="1500ms">
                <div class="col-md-7 order-2 order-md-1">
                    <div class="facilities-details">
                        <h2>{{ $facility->title }}</h2>
                        <div class="facilities-inner-details">
                            <div class="about-info">
                                {!!  $facility->description  !!}

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-5 order-1 order-md-2">
                    <div class="pipe-line">
                        <img src="{{ asset('/') }}uploads/project/{{ $facility->image }}">
                    </div>
                    <style type="text/css">

                        .pipe-line {
                            padding: 4px;
                            /*                    border: 3px solid #2d1e3c;*/
                            border-radius: 10px;
                            overflow: hidden;
                        }
                        .pipe-line img{
                            max-width: 250px;
                            margin: 0 auto;
                            display: block;
                            /*                  width: 100%;*/
                        }
                    </style>
                </div>
            </div>
                @else
            <div class="row justify-content-start align-items-center wow fadeInUp pb-30 mb-50" data-wow-delay="500ms" data-wow-duration="1500ms">
                <div class="col-md-5">
                    <div class="pipe-line">
                        <img src="{{ asset('/') }}uploads/project/{{ $facility->image }}">
                    </div>
                </div>


                <div class="col-md-7">
                    <div class="facilities-details">
                        <h2>{{ $facility->title }}</h2>
                        <div class="facilities-inner-details">
                            {!!  $facility->description  !!}
                        </div>
                    </div>
                </div>
            </div>
                @endif
            @endforeach

        </div>


    </section>



@endsection

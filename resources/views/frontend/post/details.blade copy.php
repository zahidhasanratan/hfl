@extends('frontend.app')

@section('title', $news->title . ' | Healthcare Pharmaceuticals')


@section('main')



    <!-- Start: Career -->
    <section class="career-wrap sec-ptb pt-200">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">

                    <div class="career-details justify-content-center">
                        <div class="career-image">
                            <img src="{{ asset('/') }}uploads/post/{{ $news->image }}">
                        </div>

                        <div class="career-button justify-content-center">
                            <a href="{{ route('post.show.view',$news->slug) }}" class="btn btn-apply float-sm-center float-xs-center">
                                Apply Now
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <style type="text/css">
        .career-image img {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #575a5b;
            display: block;
            border-radius: 10px;
            padding: 5px;
        }
        .career-button.justify-content-center {
            display: block;
            text-align: center;
            margin-top: 25px;
        }

        /* Smartphones (portrait and landscape) ----------- */
        @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {

            .career-image img {
                width: 100%;
            }
        }
    </style>
    <!-- End: Career -->


@endsection

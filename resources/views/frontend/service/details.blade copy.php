@extends('frontend.app')

@section('title')

    {{ $news->Name }} | Healthcare Pharmaceuticals

@endsection


@section('main')
    <!-- Start: page source links -->
    <section class="page-direction sec-ptb pt-200">
        <div class="container">
            <div class="row justify-content-start wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                <div class="col-md-7">
                    <div class="menu-links-top">
                        <ul>
                            <li><a class="active menu-page-link" href="#">Details of </a></li>
                            <li><a href="#">{{ $news->Name }} </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: page source links -->



    <!-- Start: Facilities Section -->
    <section class="facilities-details-wrap">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-4">
                    <div class="director-large-pic">
                        <img src="{{asset('/') }}uploads/life/{{ $news->image }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="director-message">
                        <h3>{{ $news->Batch }}</h3>
                        <p>{{ $news->Address3 }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-100">
                <div class="col-lg-12">
                    <div class="sec-content text-center">
                        <h2 class="sec-title">Message From Managing Director</h2>

                        <div class="director-details">
                            <p>A successful company is driven by a team of quality professionals having honesty,
                                {!! $news->Address1  !!}
                            </p>

                        </div>

                        <div class="director-footer">
                            <div class="chairman-details mr-20">
                                <h4>{{ $news->Name }}</h4>
                                <h5>{{ $news->Batch }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <!-- End: Facilities Section -->

    <style type="text/css">
       
        .director-large-pic img {
            width: 100%;
            padding: 5px;
        }
        .director-message{

        }
        .director-message h3{
            font-size: 22px;
            color: #fff;
            line-height: 30px;
            padding-bottom: 20px;
        }


        .director-message p {
            font-size: 16px;
            color: var(--thm-secondary);
            letter-spacing: 0.03rem;
            line-height: 23px;
            text-align: justify;
        }
        .director-details{}
        .director-details p{
            font-size: 16px;
            color: var(--thm-secondary);
            letter-spacing: 0.03rem;
            line-height: 23px;
            text-align: justify;
        }
        .director-footer{
            display: flex;
            justify-content: flex-end;
        }
    </style>

@endsection

@extends('frontend.app')

@section('title')
    Membership List | Jatiyo Party
@endsection
@section('about')
    <!-- start wpo-page-title -->
    <section class="wpo-page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>{{ $teamdetails->Name }}</h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li>
                                <a href="{{ asset('/') }}">Home</a>
                            </li>
                            <li>{{ $teamdetails->Name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end page-title -->



    <!-- History -->
    <section class="wpo-about-section-s2 section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="inner-info">
                        <p>
                            <img style="max-width:250px;" src="{{ asset('') }}uploads/team/{{ $teamdetails->image }}">
                        </p>
                        <p>
                            <b>নাম:</b> {{ $teamdetails->Name }}<br>

                            <b>পেশা:</b> {{ $teamdetails->Occupation }} <br>
                            <b>শিক্ষাগত যোগ্যতা:</b> {{ $teamdetails->EducationQuali }} <br>

                            <b>জাতীয় আইডি নাম্বার:</b> {{ $teamdetails->NID }} <br>
                            <b>পিতার নাম:</b> {{ $teamdetails->FatherMotherHusband }} <br>
                            <b> বয়স:</b> {{ $teamdetails->Age }} <br>
                            <b>গ্রাম:</b> {{ $teamdetails->VillageHome }} <br>
                            <b>থানা :</b> {{ $teamdetails->ThanaUpazila }} <br>
                            <b> জেলা :</b> {{ $teamdetails->districtId }} <br>
                            <b> মোবাইল :</b> {{ $teamdetails->MobileNo }} <br>

                        </p>
                        {{--<p>রওশন এরশাদ জন্ম 19 জুলাই </p>--}}
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- History -->

@endsection
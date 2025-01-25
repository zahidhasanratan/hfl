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
                        <h2>নির্বাহী সদস্য</h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="index.html">হোম</a></li>
                            <li>নির্বাহী সদস্য</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->



    <!-- Form -->
    <section class="wpo-about-section-s2 section-padding">
        <div class="container">
            <form class="mb-4" action="{{route('report.search')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <input type="text" class="form-control mb-2" placeholder="নাম" name="name" value="">
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <input type="text" class="form-control mb-2" placeholder="মোবাইল নাম্বার" name="mobile_no" value="">
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary">অনুসন্ধান</button>
                        <button type="reset" class="btn btn-danger">ক্লিয়ার</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Occupation</th>
                        <th width="100">Photo</th>
                        <th>Name</th>
                        <th>District</th>
                        <th>Mobile</th>
                        <th width="10">Details</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($ratings as $team)
                        <tr>
                            <td>{{ $team->Occupation }}</td>
                            <td><img src="{{ asset('/') }}uploads/team/{{ $team->image }}"> </td>
                            <td>{{ $team->Name }}</td>
                            <td>{{ $team->districtId }}</td>
                            <td>{{ $team->MobileNo }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('member.details',$team->slug) }}">বিস্তারিত</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Form -->
@endsection
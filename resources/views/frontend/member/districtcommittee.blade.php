@extends('frontend.app')

@section('title')
    District Committee | Jatiyo Party
@endsection
@section('about')
    <!-- start wpo-page-title -->
    <section class="wpo-page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>জাতীয় পার্টি জেলা কমিটি</h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="{{ asset('') }}">হোম</a></li>
                            <li>জাতীয় পার্টি জেলা কমিটি</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>

    <!-- Form -->
    <section class="wpo-about-section-s2 section-padding">
        <div class="container">
         @foreach(\App\Link::all() as $division)
            <h4>{{ $division->title }}</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="10">নং</th>
                        <th>জেলা</th>
                        <th width="10">বিস্তারিত</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach(\App\Service::where('sub_title',$division->title)->get() as $key=> $district)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $district->title }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('committee.details', $district->title) }}">বিস্তারিত</a>
                        </td>
                    </tr>
                @endforeach


                    </tbody>
                </table>
            </div>
          @endforeach


        </div>
    </section>
    <!-- Form -->
@endsection
    <!-- end page-title -->

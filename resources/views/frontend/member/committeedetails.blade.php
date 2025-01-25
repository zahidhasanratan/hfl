@extends('frontend.app')

@section('title')
    {{ $slug }} | Jatiyo Party
@endsection
@section('about')
<!-- start wpo-page-title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>{{ $slug }} জেলা জাতীয় পার্টি</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="{{ asset('') }}">হোম</a></li>
                        <li>{{ $slug }} জেলা জাতীয় পার্টি</li>
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
        <!--<h4></h4>-->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>কমিটি</th>
                    <th>অনুমোদনের তারিখ</th>
                    <th>কমিটির মেয়াদ</th>
                    <th width="10">বিস্তারিত</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\PreviousProgram::where('sub_title',$slug)->get() as $committee)
                <tr>

                    <td>{{ $committee->title }}</td>
                    <td>{{ $committee->short }}</td>
                    <td>{{ $committee->description }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" target="_blank" href="{{ asset('') }}uploads/previous/{{ $committee->image }}">দেখুন</a>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <a href="javascript: history.go(-1)" class="btn btn-primary">&lt; পেছনে</a>

    </div>
</section>
<!-- Form -->

@endsection

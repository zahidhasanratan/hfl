@extends('frontend.app')

@section('title', $news->title . ' | Healthcare Pharmaceuticals')


@section('main')



    <!-- global-operation start -->
    <section class="global-operation sec-ptb pt-200">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                <div class="col-md-9">
                    <div class="global-header mb-50">
                        <p>Application Form</p>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="test-form" method="post" action="{{ route('application.form') }}" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                    <div class="col-md-3">
                        <div class="contact-form">
                            <input class="form-control form-custom" type="hidden" placeholder="Name" name="post_id" value="{{ $news->id }}">
                            <input class="form-control form-custom" type="hidden" placeholder="Name" name="postname" value="{{ $news->title }}">
                            <input class="form-control form-custom" type="text" placeholder="Name" name="name" required>
                            <input class="form-control form-custom" type="text" placeholder="E-mail" name="email" required>
                            <input class="form-control form-custom" type="text" placeholder="Subject" name="subject" required>
                            <input class="form-control form-custom" style="border-bottom:2px solid #fff;" type="text" placeholder="Phone Number" name="phone" required>
                            <div class="form-group mt-3">
                                <input type="file" name="image" required>
                                <label class="mr-4">Upload your CV (PDF Only):</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                    <div class="col-md-6">
                        <div class="btn-box text-center mt-30">

                            <div>
                                <!-- <a class="click-btn btn-style500 w-250" href="#">Career</a> -->
                                <button class="read-more-btn w-250" type="submit">
                                    <span class="txt">Submit</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- global-operation end -->


@endsection

@extends('frontend.app')

@section('title')
    Contact Us | DMC Alumni
@endsection


@section('main')
    <!-- Inner Page Header Serction Start Here -->
    <div class="inner-page-header">
        <div class="banner">
            <img src="{{asset('front') }}/images/banner/3.jpg" alt="Banner">
        </div>
    </div>
    <!-- Home About Start Here -->
    <!-- Contact Us Page Start Here -->
    <div class="single-blog-page-area contact-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">

                    <div class="location-area">
                        <div class="row">

                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                @foreach($contact1 as $contact1)
                                <ul>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $contact1->slug }}</span></li>
                                    <li><i class="fa fa-mobile" aria-hidden="true"></i> Phone: <a href="tel:{{ $contact1->phone }} "> {{ $contact1->phone }} </a></li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{!! $contact1->description  !!}">{!! $contact1->description  !!}</a></li>
                                </ul>
                                @endforeach
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <h3>Location</h3>
                                <div class="google-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.5987772800063!2d90.39539201429639!3d23.72601789562574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8e6474187cf%3A0xb3d3783755659522!2sDhaka%20Medical%20College%20Hospital!5e0!3m2!1sen!2sbd!4v1680321982680!5m2!1sen!2sbd" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="leave-comments-area">
                        <h3>Contact Us</h3>
                        <div id="form-messages"></div>
                        <form id="contact-form" method="post" action="{{ route('contact.us') }}" >
                            @csrf

                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="fname" class="form-control" required placeholder="First Name*">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="lname" id="lname" class="form-control" required placeholder="Last Name*">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required placeholder="Email*">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone" class="form-control" required placeholder="Phone*">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea cols="40" id="message" name="message" rows="10" class="textarea form-control" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn-send" type="submit">Send Message </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- Home About End Here -->



    <!-- Home About End Here -->
@endsection

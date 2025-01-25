@extends('frontend.app')

@section('title')
    Need Help? | Jatiyo Party
@endsection
@section('about')
    <section class="wpo-page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>Need Help?</h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="{{ asset('/') }}">Home</a></li>
                            <li>Need Help?</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- wpo-event-area start -->
    <div class="wpo-donation-page-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="wpo-donate-header">
                        <h2>Need Help?</h2>
                    </div>
                    <div id="Donations" class="tab-pane">
                        @include('layouts.partial.msg')
                        <form method="post" action="{{ route('help.form') }}">
                            @csrf
                            <div class="wpo-donations-details">
                                <h2>Details</h2>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                        <input type="text" class="form-control" name="fname" id="fname"
                                               placeholder="First Name" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                        <input type="text" class="form-control" name="lname" id="lname"
                                               placeholder="Last Name" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group clearfix">
                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="Email" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                        <input type="text" class="form-control" name="address" id="Adress"
                                               placeholder="Adress" required>
                                    </div>
                                    <div class="col-lg-12 col-12 form-group">
                                            <textarea class="form-control" name="note" id="note"
                                                      placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="submit-area">
                                <button type="submit" class="theme-btn submit-btn">Submit Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wpo-event-area end -->
@endsection

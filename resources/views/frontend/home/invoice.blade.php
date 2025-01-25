{{--{{ $invoice->random }}--}}
{{--<br>--}}
{{--{{ $invoice->batch }}--}}
{{--<br>--}}
{{--accompany : {{ $invoice->acoompany }}--}}

@extends('frontend.app')

@section('title','DMC Alumni')


@section('main')
    <div class="inner-page-header">
        <div class="banner">
            <img src="{{asset('front') }}/images/banner/3.jpg" alt="Banner">
        </div>
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-page-locator">
                            <ul>
                                <li>
                                    <a href="{{ asset('/') }}">Home <i class="fa fa-compress" aria-hidden="true"></i>
                                    </a> About
                                </li>
                            </ul>
                        </div>
                        <div class="header-page-title">
                            <h1>DMC Day Registration 2023 Invoice</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="LoginForm">
        <div class="container">
            <!-- <h1 class="form-heading">login Form</h1> -->
            <div class="login-form">
                <div class="main-div2">
                    <div class="panel panel-custom">
                        <div class="fadeIn first">
                            <img src="{{ asset('/') }}front/images/logo.png" id="icon" alt="User Icon">
                            <!-- <h1>Aditya News</h1> -->
                        </div>
                        <h2 style="color: #002f6c; font-size: 21px;     font-weight: 600 !important;">78 <sup>th</sup> DMC Day Registration Invoice</h2>
                        <!-- <p>Please enter your email and password</p> -->
                    </div>


                    <div class="row pad-top-botm client-info justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-20">
                            
                            <p class="form-label">Name : <span>{{ $invoice->name }}</span> </p>
                            <p class="form-label">Mobile Number : <span>{{ $invoice->mobile }}</span> </p>
                            <p class="form-label">Email : <span>{{ $invoice->email }}</span> </p>
                            <p class="form-label">Mobile : <span>{{ $invoice->mobile }}</span> </p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Particular</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>Registration Fee</td>
                                        <td>Person</td>
                                        <td>{{ $btprice = $invoice->btprice }} /=</td>
                                    </tr>

                                    @if($invoice->acoompany == 'Yes')
                                            @if($invoice->spouse =='Spouse1' or $invoice->spouse =='Spouse2')
                                                <tr>
                                                    <td>Spouse</td>
                                                    <td>1 Person</td>
                                                    <td>{{ $spouse ='1500' }} /=</td>
                                                </tr>
                                            @else
                                                @php $spouse='0'; @endphp

                                            @endif

                                            @if($invoice->free !='')
                                                <tr>
                                                    <td>Kids < 10 Year</td>
                                                    <td>{{ $invoice->free }} Kids</td>
                                                    <td>{{ $kids ='0' }} /=</td>
                                                </tr>
                                            @else
                                                @php $kids='0'; @endphp
                                            @endif

                                            @if($invoice->plus10 !='')
                                                <tr>
                                                    <td>Kids > 10 Year</td>
                                                    <td>{{ $invoice->plus10 }} Kids</td>
                                                    <td>{{ $plus10 = ($invoice->plus10 * 1500) }} /=</td>
                                                </tr>

                                            @else
                                                @php $plus10='0'; @endphp
                                            @endif
                                    @endif


                                    </tbody>
                                </table>
                            </div>

                            <div class="ttl-amts">
                                @if($invoice->acoompany == 'Yes')
                                <h4>Bill Amount : {{ $total = $btprice + $spouse + $kids + $plus10 }} BDT </h4>
                                @else
                                    <h4>Bill Amount : {{ $total = $btprice }} BDT </h4>
                                @endif


                            </div>

                            <hr>
                        </div>
                    </div>

                    <form method="POST" action="{{route('dmc.shurjopay.submission')}}">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h3 style="color: #215eae;;font-size: 15px;line-height:22px;">[ Note: Please Click on Pay now Button. After Successful online payment You will get Ticket/ Entry Pass on Your Email. ]</h3>
                                <input type="checkbox" name="check" value="1" required />
                                <span style="color:red;"> I agree... <a class="target-txt" target="_blank" href="#">(Terms And Condition.)</a>
                  </span>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>

                                @csrf
                                <input type="hidden" name="batch" value="{{ $invoice->id }}">
                                <input type="hidden" name="orderid" value="{{ $invoice->id }}">
                                <input type="hidden" name="random" value="{{ $invoice->random }}">
                                <input type="hidden" name="name" value="{{ $invoice->name }}">
                                <input type="hidden" name="email" value="{{ $invoice->name }}">
                                <input type="hidden" name="amount" value="{{ $total }}">
                                <input type="hidden" name="mobile" value="{{ $invoice->mobile }}">

                                @if($total !='0')
                                    <button name="submit" value="submit" type="submit" id="submit" class="lgx-btn" style="float: right">Pay Now</button>
                                @else
                                    <a href="{{ route('dmc.success',$invoice->random ) }}" id="submit" class="lgx-btn" style="float: right">Submit</a>
                                @endif
                            </div>
                        </div>
                    </form>

                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="cart-image">
                                <a href="#">
                                    <img src="https://wes.bif.org.bd/Reg/assets/view/wp-content/ssl.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <style type="text/css">
        .main-div2 {
            background: #ffffff none repeat scroll 0 0;
            border-radius: 2px;
            margin: 10px auto 30px;
            max-width: 60%;
            padding: 50px 70px 70px 71px;
            box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.08);
            /* padding: 20px; */
        }

        .panel-custom {
            text-align: center;
            margin-bottom: 40px;
        }
        .panel h2 {
            color: #242323;
            font-size: 22px;
            margin: 0 0 8px 0;
            line-height: 29px;
            padding-top: 20px;
            font-weight: normal;
        }
        .justify-content-center {
            justify-content: center!important;
        }
        .mb-20 {
            margin-bottom: 20px;
        }
        strong {
            font-weight: bolder;
        }

        .form-label {
            font-size: 15px;
            font-weight: 400;
            color: #222;
        }
        p {
            margin: 0 0 6px;
        }

        .table>thead {
            vertical-align: bottom;
            background: #002f6c;
            color: #fff;
            /* text-align: center; */
        }

        .mb-20 {
            margin-bottom: 20px;
        }
        .cart-image img {
            width: 100%;
            border-radius: 5px;
        }

        .lgx-btn {
            background: #002f6c;
            padding: .2rem .7rem;
            color: #fff;
            line-height: 30px;
            overflow: hidden;
            display: inline-block;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            text-transform: uppercase;
            border: none;
            font-size: 14px;
            -webkit-transition: all .3s ease-in-out 0s;
            -moz-transition: all .3s ease-in-out 0s;
            -o-transition: all .3s ease-in-out 0s;
            transition: all .3s ease-in-out 0s;
            margin-bottom: 20px;
        }

        .lgx-btn:hover {
            background: #215eae;
        }
        
        /* Smartphones (portrait and landscape) ----------- */
        @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
            
            .main-div2 {
                margin: 10px auto 30px !important;
                max-width: 100% !important;
                padding: 10px !important;
            }
            .panel-custom {
                text-align: center;
                margin-bottom: 15px;
            }
            
        }
        
        
    </style>

@endsection
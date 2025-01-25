@extends('frontend.app')

@section('title')
    Gallery | Texpeion
@endsection



@section('about')
    <section class="banner_area">
        <div class="container">
            <div class="banner_content">
                <h3 title="About us"><img class="left_img" src="{{asset('front/img/banner/t-left-img.png') }}" alt="">Gallery<img class="right_img" src="{{asset('front/img/banner/t-right-img.png') }}" alt=""></h3>

            </div>
        </div>
    </section>
    <section class="shop_area">
        <div class="container">
            <div class="row">



                @foreach($photo as $photos)
                <div class="col-md-3 col-sm-6">
                    <div class="product_item">
                        <div class="product_img">
                            <img src="{{ asset('uploads/photo/'.$photos->image) }}" alt="">
                            <div class="hover_icon">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h5>Product Name</h5>
                        <h6>$30.00</h6>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection
@extends('frontend.app')

@section('title','Products | Healthcare Pharmaceuticals')


@section('main')



    <!-- Newly Launched start -->
    <section class="about-sec sec-ptb pt-200">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-shape-pro">
                        <div class="title-bg" style="background-image: url({{asset('front') }}/assets/images/background/title.svg);">
                            <!-- <img src="assets/images/background/title.svg"> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    <div class="sec-content mt-150 text-center">
                        <h2 class="sec-title">EXPLORE <br>HEATHCARE PHARMACEUTICALS<br>PRODUCTS</h2>
                        <div class="blog-sidebar-search text-center">
                            <form action="{{ route('search.product') }}" method="GET">
                                <input type="text" name="query" placeholder="Search by Trade name / Generic name / Therapeutic class">
                                <button type="submit">
                                    <img width="30px" src="{{asset('front') }}/assets/images/blog/icon/tabler_search.png" alt="icon">
                                </button>
                            </form>



{{--                            <p class="trade-name">Search by Trade name / Generic name/ Thereapeutic class</p>--}}
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-trade-search">
                        <ul>
                            @foreach(\App\Pcategory::all() as $category)
                                <li><a href="{{ route('category.product.all',$category->id) }}">{{ $category->title }}</a></li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
            <div class="row align-items-center tab-col-gap wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">

                @php
                    $products = \App\Product::where('Pcat_id',$id)->paginate(12); // Pagination directly in Blade template
                @endphp

                @foreach($products as $product2)
                    <div class="col-md-3 col-6">
                        <!--<div class="search-product">-->
                        <!--    <div class="product-item product-details wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">-->
                        <!--        <div class="img-box pro-img">-->
                        <!--            <a href="{{ route('product.details', $product2->slug) }}">-->
                        <!--                <img src="{{ asset('uploads/product/' . $product2->image) }}" alt="">-->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--        <div class="content-box">-->
                        <!--            <div class="title-box">-->
                        <!--                <h3><a href="{{ route('product.details', $product2->slug) }}">{{ $product2->title }}</a></h3>-->
                        <!--                <p>{{ $product2->gereric }}</p>-->
                        <!--                <h4>{{ $product2->size }}</h4>-->
                        <!--            </div>-->
                        <!--            <div class="btn-box">-->
                        <!--                <a class="read-more-btn" href="{{ route('product.details', $product2->slug) }}">-->
                        <!--                    <span class="txt">Know more</span>-->
                        <!--                    <i class="flaticon-right-cart"></i>-->
                        <!--                </a>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        <div class="product-item  product-details wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">

                                <div class="circular-image-container">
                                    <a href="{{ route('product.details', $product2->slug) }}">
                                        <img src="{{ asset('uploads/product/' . $product2->image) }}" alt="">
                                    </a>
                                </div>

                                <div class="content-box">
                                    <div class="title-box">
                                         <h3><a href="{{ route('product.details', $product2->slug) }}">{{ $product2->title }}</a></h3>
                                        <p>{{ $product2->gereric }}</p>
                                        <!--<h4>{{ $product2->size }}</h4>-->

                                    </div>
                                    <div class="btn-box">
                                        <a class="read-more-btn" href="{{ route('product.details', $product2->slug) }}">
                                            <span class="txt">Know more</span>
                                            <i class="flaticon-right-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    </div>
                @endforeach

            </div>

            <div class="row justify-content-center">
                <div class="col-md-3 justify-content-center">
                    <div class="blog-pagination justify-content-center">
                    {{ $products->links('pagination::bootstrap-4') }} <!-- Laravel Pagination Links -->
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- Newly section end -->
    
    <style>
        .title-bg {
            height: 15%;
        }
        
        @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
            .title-bg {
                height: 13%;
                display:none;
            }
            .product-trade-search {
                margin-top: 10px;
            }
        }
        
        
    </style>

@endsection

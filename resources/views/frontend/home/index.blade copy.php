@extends('frontend.app')

@section('title','Healthcare Pharmaceuticals')


@section('main')


    <!--Slider New Video  -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slider-hpl">
                    @php
                        $slider = \App\Slider::find(37);
                    @endphp
                    <div class="paragraph paragraph--type--hww-hero-title-img component-background-video">
                        <div class="parallax variation-extra-padding"></div>
                        <div class="video-text">
                            <iframe class="svg-vid" title="video" aria-label="The science of Posibility" src="{{ $slider->url }}?controls=0&amp;autoplay=1&amp;loop=1&amp;autopause=0&amp;muted=1" tabindex="-1"></iframe>
                            <div class="grid-img">
                                <picture>
                                    <source srcset="{{ asset('/') }}uploads/slider/{{ $slider->image }}">
                                    <img src="{{ asset('/') }}uploads/slider/{{ $slider->image }}" alt="The Science of Possibility" width="1920" height="887">
                                </picture>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="paragraph paragraph--type--notification-component variation-change">
                            <div class="clearfix text-formatted field field--name-field-hww-body field--type-text-long field--label-hidden field__item  wow slideInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <p class="short">{{ $slider->sub_title }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Slider New Video  -->

    <!--Slider Text  -->
    <div class="field--item notification_component">
        <div class="container">
            <div class="cta my-3 col-md-9 py-1">
                <div class="field field--name-field-hww-link field--type-link field--label-hidden field__item">
                    <div class="hero-btn-area d-flex align-items-center">
                        <a class="thm-btn read-more-btn-slider" href="{{ url('/About') }}">
                            <span class="txt">KNOW MORE</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Slider Text   -->


    <!-- Newly Launched start 1 -->
    <section class="about-sec sec-ptb" style="padding-top: 30px;">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sec-content text-center">
                        <h2 class="sec-title">
                            <a href=""> EXPLORE HPL PRODUCTS</a>
                        </h2>
                        <div class="blog-sidebar-search text-center">
                            <form action="{{ route('search.product') }}" method="GET">
                                <input type="text" id="product-search-input" name="query" placeholder="Search by Trade name / Generic name / Therapeutic class" autocomplete="off">
                                <button type="submit">
                                    <img width="30px" src="{{asset('front')}}/assets/images/blog/icon/tabler_search.png" alt="icon">
                                </button>
                            </form>

                            <div id="product-suggestions" style="display: none;" class="suggestions-dropdown">
                                <!-- AJAX suggestions will be injected here -->
                            </div>

{{--                            <p class="trade-name">Search by Trade name / Generic name / Therapeutic class</p>--}}
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#product-search-input').on('keyup', function() {
                                    let query = $(this).val();

                                    if (query.length > 2) { // Only search if the query is longer than 2 characters
                                        $.ajax({
                                            url: "{{ route('search.product.ajax') }}",
                                            method: 'GET',
                                            data: { query: query },
                                            success: function(response) {
                                                let dropdown = $('#product-suggestions');
                                                dropdown.empty(); // Clear the dropdown

                                                if (response.status === 'success' && response.products.length > 0) {
                                                    response.products.forEach(product => {
                                                        // Dynamically generate the image URL and product details URL
                                                        let imageUrl = "{{ asset('uploads/product/') }}/" + product.image;
                                                        let productUrl = "{{ url('products_details') }}/" + product.slug;

                                                        dropdown.append(`
                                <a href="${productUrl}" class="suggestion-item" style="text-decoration: none; color: inherit;">
                                    <img src="${imageUrl}" alt="${product.title}" width="50px">
                                    <div class="suggestion-info">
                                        <h3 class="suggestion-title">${product.title}</h3>
                                        <p class="suggestion-subtitle">${product.gereric}</p>
                                        <h4 class="suggestion-therepeutic">${product.thereapeutic}</h4>
                                    </div>
                                </a>
                            `);
                                                    });
                                                    dropdown.show(); // Show the dropdown
                                                } else {
                                                    dropdown.append(`<p>No matching products found</p>`);
                                                    dropdown.show(); // Show the dropdown even if no results
                                                }
                                            },
                                            error: function(xhr) {
                                                console.error(xhr.responseText); // Log error to the console
                                            }
                                        });
                                    } else {
                                        $('#product-suggestions').hide(); // Hide the dropdown if query is less than 3 characters
                                    }
                                });

                                // Hide the suggestions dropdown when clicking outside
                                $(document).click(function(e) {
                                    if (!$(e.target).closest('.blog-sidebar-search').length) {
                                        $('#product-suggestions').hide();
                                    }
                                });
                            });

                        </script>
                    </div>
                </div>
            </div>


            <div class="row desktop-only-filter">
                <div class="col-md-12">
                    <div class="product-trade-search product-trade-search-home">
                        <ul>
                            @foreach(\App\Pcategory::all() as $category)
                            <li><a href="{{ route('category.product.all',$category->id) }}">{{ $category->title }}</a></li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>


            <div class="row mt-50">
                
                <div class="col-lg-3  text-center ">
                    
                    <div class="testimonial-slider2 owl-carousel owl-theme">
                       @foreach(\App\Product::where('news', 1)->orderBy('updated_at', 'desc')->get() as $product2)
                        <div class="boc">
                            <div class="cardcc">
                                <div class="front">
                                    
                                    <img src="{{asset('') }}uploads/product/{{ $product2->image }}" alt="">
                                    
                                </div>
                                <div class="back">
                                    <h2>{{ $product2->title }}</h2>
                                    <p>{{ $product2->gereric }}</p>
                                    <a href="{{ route('product.details',$product2->slug) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                          @endforeach
                        
                    </div>
                    <h2 style="text-align: center;"><span class="text1" > NEWLY LAUNCHED</span></h2>
                </div>
              


                <div class="col-lg-9 tab-col-gap wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                    <div class="row">
                        <div class="team-slider owl-carousel owl-theme ">

                            @foreach(\App\Product::where('featured', 1)->get() as $product)
                                <div class="item single-team">
                                <div class="search-product">
                                    <div class="product-item  product-details wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="circular-image-container">
                                            <a href='{{ route('product.details',$product->slug) }}'>
                                            <img class="medicine-img" src="{{asset('') }}uploads/product/{{ $product->image }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="content-box">
                                            <div class="title-box">
                                                <h3>
                                                    <a href='{{ route('product.details',$product->slug) }}'> {{ $product->title }}</a>
                                                </h3>
                                                <p>{{ $product->gereric }}</p>
                                                <!--<h4>{{ $product->size }}</h4>-->
                                            </div>
                                            <div class="btn-box">
                                                <a class='read-more-btn' href='{{ route('product.details',$product->slug) }}'>
                                                    <span class="txt">Know more</span>
                                                    <i class="flaticon-right-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>

                </div>
            </div>
            <div class="row mb-only-filter">
                <div class="col-md-12">
                    <div class="product-trade-search product-trade-search-home">
                        <ul>
                            @foreach(\App\Pcategory::all() as $category)
                                <li><a href="{{ route('category.product.all',$category->id) }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center mt-10">
                <div class="col-md-3">
                    <div><a class="click-btn btn-style500" href="{{ route('product.all') }}">See all products</a></div>
                </div>
            </div>


        </div>
    </section>
    <!-- Newly section end 1 -->


    <!-- Start:  Usp Final -->
    <section class="usp-shape-3  wow fadeInUp" data-wow-delay="0.3s">
        @php
            $growth = \App\Objects::where('id', 3)->first();
        @endphp
        <div class="container">

            <div class="row justify-content-center m-l-100">
                <div class="col-md-4 col-sm-6 col-6">
                    <div class="usp-shape-left-001 align-items-center">
                        <div class="outer-circle">
                            <div class="inner-circle">
                                <div class="usp-shape_1">
                                    <div class="stat">
                                        <img src="{{asset('front') }}/assets/images/icon/usp/6.png" alt="Employees">
                                        <h2>
                                            <span class="countfect countfect-number" data-num="{{ $growth->short }}"></span>+
                                        </h2>
                                        <p style="font-weight:20px">Registered <br>  Medicine</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-6">
                    <div class="usp-shape-left-002 align-items-center">
                        <div class="outer-circle-02">
                            <div class="inner-circle-02">
                                <div class="usp-shape_2">
                                    <div class="stat">
                                        <img src="{{asset('front') }}/assets/images/icon/usp/4.png" alt="Employees">
                                        <h2>
                                            <span class="countfect countfect-number" data-num="{{ $growth->description }}"></span>+
                                        </h2>
                                        <p style="font-size:18px"> Employees</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center m-l-100">
                <div class="col-md-3 col-sm-4 col-4">
                    <div class="usp-shape-left-03 align-items-center" style="margin-top:30px">
                        <div class="outer-circle-03">
                            <div class="inner-circle-03">
                                <div class="usp-shape_3">
                                    <div class="stat">
                                        <img src="{{asset('front') }}/assets/images/icon/usp/growth.png" alt="Employees">
                                        <h2>
                                            <span class="countfect countfect-number" data-num="{{ $growth->whatsapp }}"></span>+
                                        </h2>
                                        <p>Growth</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-4">
                    <div class="usp-shape-left-04 align-items-center ">
                        <div class="outer-circle-04">
                            <div class="inner-circle-04">
                                <div class="usp-shape_4">
                                    <div class="stat">
                                        <img src="{{asset('front') }}/assets/images/icon/usp/8.png" alt="Employees">
                                        <h2>
                                            <span class="countfect countfect-number" data-num="{{ $growth->instagram }}"></span>+
                                        </h2>
                                        <p> Countries Export</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-4">
                    <div class="usp-shape-left-05 align-items-center ">
                        <div class="outer-circle-03">
                            <div class="inner-circle-03">
                                <div class="usp-shape_3">
                                    <div class="stat">
                                        <img src="{{asset('front') }}/assets/images/icon/usp/14.png" alt="Employees">
                                        <h2>
                                            <span class="countfect countfect-number" data-num="{{ $growth->slug }}"></span>+
                                        </h2>
                                        <p>Generic</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="row justify-content-center m-l-100">--}}
{{--                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">--}}
{{--                    <div class="usp-shape-left-001 align-items-center">--}}
{{--                        <div class="outer-circle">--}}
{{--                            <div class="inner-circle">--}}
{{--                                <div class="usp-shape_1">--}}
{{--                                    <div class="stat">--}}
{{--                                        <img src="{{asset('front') }}/assets/images/icon/usp/6.png" alt="Employees">--}}
{{--                                        <h2>--}}
{{--                                            <span class="countfect countfect-number" data-num="{{ $growth->short }}"></span>+--}}
{{--                                        </h2>--}}
{{--                                        <p>Registered <br> Medicine</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4  wow fadeInUp" data-wow-delay="0.6s">--}}
{{--                    <div class="usp-shape-left-002 align-items-center">--}}
{{--                        <div class="outer-circle-02">--}}
{{--                            <div class="inner-circle-02">--}}
{{--                                <div class="usp-shape_2">--}}
{{--                                    <div class="stat" style="padding-top:8%">--}}
{{--                                        <img src="{{asset('front') }}/assets/images/icon/usp/4.png" alt="Employees">--}}
{{--                                        <h2>--}}
{{--                                            <span class="countfect countfect-number" data-num="{{ $growth->description }}"></span>+--}}
{{--                                        </h2>--}}
{{--                                        <p> Employess</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="row justify-content-center m-l-100">--}}
{{--                <div class="col-md-3  wow fadeInUp" data-wow-delay="0.9s">--}}
{{--                    <div class="usp-shape-left-03 align-items-center" style="margin-top:30px">--}}
{{--                        <div class="outer-circle-03">--}}
{{--                            <div class="inner-circle-03">--}}
{{--                                <div class="usp-shape_3">--}}
{{--                                    <div class="stat">--}}
{{--                                        <img src="{{asset('front') }}/assets/images/icon/usp/14.png" alt="Employees">--}}
{{--                                        <h2>--}}
{{--                                            <span class="countfect countfect-number" data-num="{{ $growth->slug }}"></span>+--}}
{{--                                        </h2>--}}
{{--                                        <p style="font-size:20px; line-height:22px">Generic</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3  wow fadeInUp" data-wow-delay="1s">--}}
{{--                    <div class="usp-shape-left-04 align-items-center ">--}}
{{--                        <div class="outer-circle-04">--}}
{{--                            <div class="inner-circle-04">--}}
{{--                                <div class="usp-shape_4">--}}
{{--                                    <div class="stat" style="padding-top:10%">--}}
{{--                                        <img src="{{asset('front') }}/assets/images/icon/usp/8.png" alt="Employees">--}}
{{--                                        <h2>--}}
{{--                                            <span class="countfect countfect-number" data-num="{{ $growth->instagram }}"></span>+--}}
{{--                                        </h2>--}}
{{--                                        <p style="font-size: 20px; line-height: 24px;"> Countries<br>Export</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-3 wow fadeInUp" data-wow-delay="0.6s">--}}
{{--                    <div class="usp-shape-left-05 align-items-center ">--}}
{{--                        <div class="outer-circle-03">--}}
{{--                            <div class="inner-circle-03">--}}
{{--                                <div class="usp-shape_3">--}}
{{--                                    <div class="stat">--}}
{{--                                        <img width="90" src="{{asset('front') }}/assets/images/icon/usp/growth.png" alt="Employees">--}}
{{--                                        <h2>--}}
{{--                                            <span class="countfect countfect-number" data-num="{{ $growth->whatsapp }}"></span>+--}}
{{--                                        </h2>--}}
{{--                                        <p style="font-size:20px; line-height:22px">Growth</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

        </div>
    </section>
    <!-- End:  Usp 3 -->






    <!-- Start: global -->
    <section class="global-map">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sec-content text-center">
                        <h2 class="sec-title">GLOBAL OPERATION</h2>
                        <P style="margin-bottom: 10px;">HPL is continuously exploring its expertise to the international arena to avail every opportunity of global partnership</P>
                    </div>
                </div>
            </div>

            <div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 justify-content-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="global-map-sec">
                        <div class="map-inner">
                            <div class="working-map">
                                <ul id="continents3">
                                    <img class="map-world" src="{{asset('front') }}/assets/images/map-2.png">
                                    <div class="blink"></div>
                                    
                            <li class="Tanzania">
                                <a>
                                    <span class="con-info">
                                      <strong>Tanzania</strong> 
                                      
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                            <li class="Afganistan">
                                <a>
                                    <span class="con-info">
                                      <strong>Afganistan</strong> 
                                      
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                            <li class="Uzbekistan">
                                <a>
                                    <span class="con-info">
                                      <strong>Uzbekistan</strong> 
                                      
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                             
                            

        

                            <!-- New -->

                            <li class="Usa">
                                <a>
                                  <span class="con-info">
                                      <strong>USA</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                            <li class="Honduras">
                                <a>
                                  <span class="con-info">
                                      <strong>Honduras</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="Guatemala">
                                <a>
                                  <span class="con-info">
                                      <strong>Guatemala</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="CostaRica">
                                <a>
                                  <span class="con-info">
                                      <strong>Costa Rica</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="Ecuador">
                                <a>
                                  <span class="con-info">
                                      <strong>Ecuador</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="Bolivia">
                                <a>
                                  <span class="con-info">
                                      <strong>Bolivia</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="Paraguay">
                                <a>
                                  <span class="con-info">
                                      <strong>Paraguay</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                            <!--  -->

                            <li class="Ghana">
                                <a>
                                  <span class="con-info">
                                      <strong>Ghana</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>



                            <li class="Bosnia">
                                <a>
                                  <span class="con-info">
                                      <strong>Bosnia</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="Moldova">
                                <a>
                                  <span class="con-info">
                                      <strong>Moldova</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="Nigeria">
                                <a>
                                  <span class="con-info">
                                      <strong>Nigeria</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            
                            <li class="Zimbabwe">
                                <a>
                                    <span class="con-info">
                                      <strong>Zimbabwe</strong> 
                                      
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="uganda">
                                <a>
                                    <span class="con-info">
                                      <strong>Uganda</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                             <li class="Kenya">
                                <a>
                                    <span class="con-info">
                                      <strong>Kenya</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                            <li class="Iraq">
                                <a>
                                    <span class="con-info">
                                      <strong>Iraq</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="Jordan">
                                <a>
                                    <span class="con-info">
                                      <strong>Jordan</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                            <li class="Syria">
                                <a>
                                    <span class="con-info">
                                      <strong>Syria</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                            <li class="Yemen">
                                <a>
                                    <span class="con-info">
                                      <strong>Yemen</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                            <!-- Asia -->


                            <li class="Hongkong">
                                <a>
                                    <span class="con-info">
                                      <strong>Hong Kong</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="Philippines">
                                <a>
                                    <span class="con-info">
                                      <strong>Philippines</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                            <li class="Cambodia">
                                <a>
                                    <span class="con-info">
                                      <strong>Cambodia</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                             <li class="Malaysia">
                                <a>
                                    <span class="con-info">
                                      <strong>Malaysia</strong> 
                                      
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                             <li class="Singapore">
                                <a>
                                  <span class="con-info">
                                      <strong>Singapore</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>


                            <li class="Bangladesh">
                                <a>
                                    <span class="con-info">
                                      <strong>Bangladesh</strong> 
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                            <li class="Bhutan">
                                <a>
                                    <span class="con-info">
                                      <strong>Bhutan</strong> 
                                      
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                             <li class="Myanmar">
                                <a>
                                    <span class="con-info">
                                      <strong>Myanmar</strong> 
                                      
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>



                             <li class="Vietnam">
                                <a>
                                    <span class="con-info">
                                      <strong>Vietnam</strong> 
                                      
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                             <li class="Srilanka">
                                <a>
                                    <span class="con-info">
                                      <strong>Srilanka</strong> 
                                      
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>

                             <li class="Maldives">
                                <a>
                                    <span class="con-info">
                                      <strong>Maldives</strong> 
                                      
                                    </span>
                                </a>
                                <div class="hotline-phone-ring">
                                  <div class="hotline-phone-ring-circle"></div>
                                  <div class="hotline-phone-ring-circle-fill"></div>
                                  <div class="hotline-phone-ring-img-circle">
                                  </div>
                                </div>
                            </li>




                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: global -->



    <style type="text/css">
        /*.brand-slider .owl-stage {
              display: flex;
              animation: scroll-left 20s linear infinite;
          }

          @keyframes scroll-left {
              0% {
                  transform: translateX(0);
              }
              100% {
                  transform: translateX(-50%);
              }
          }*/


    </style>
    <!-- GMP Accreditation end -->


    <!-- Start: Director Message -->
    <section class="DirectorMessage sec-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sec-content text-center">
                        <h2 class="sec-title">HPL Team</h2>
                    </div>
                </div>
            </div>
            @foreach(\App\LifeMember::where('phone', 'Board of Directors')->orderBy('id')->limit(1)->get() as $team)
            <div class="row justify-content-center mt-30 mb-50">
                <div class="col-md-12 col-lg-9 justify-content-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="director-section d-flex align-items-center  wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="circular-image-container-chairman">
                            <a href="{{ route('life.details', $team->slug) }}"> <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" /></a>
                        </div>
                        <div class="director-details">
                            <p>{{ $team->Address }} <a class="seemore" href="{{ route('life.details', $team->slug) }}">...see more </a>
                                <a class="moreless-button" href="#">...see more</a>
                            </p>
                            <section class="facilities-details-wrap moretext chairman-mobile">
                                <div class="row justify-content-start">

                                    <div class="col-md-12">
                                        <div class="director-message">
                                            {!! $team->Address1  !!}
                                        </div>
                                    </div>
                                </div>


                            </section>
                            <h3>
                                <a href="{{ route('life.details', $team->slug) }}"> {{ $team->Name }} </a>
                            </h3>
                            <h4>{{ $team->Batch }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


            <div class="row justify-content-center mt-30">
                @foreach(\App\LifeMember::where('phone', 'Board of Directors')->orderBy('id')->skip(1)->limit(1)->get() as $team)
                <div class="col-md-6 pull-left wow slideInLeft animated animated" data-wow-delay="10ms" data-wow-duration="1500ms">
                    <div class="chairman-section align-items-center">
                        <div class="col-md-5">
                            <div class="director-card-left">
                                <div class="circular-image-container-director">
                                    <a href="{{ route('life.details', $team->slug) }}"><img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" /></a>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-7">
                            <div class="chairman-details ml-20">
                                <p>{{ $team->Address }}<a class="seemore" href="{{ route('life.details', $team->slug) }}">...see more </a>
                                    <a class="moreless-button-director" href="#">...see more</a>
                                </p>
                                <section class="facilities-details-wrap moretext-director">
                                    <div class="row justify-content-start">
                                        <div class="col-md-12">
                                            <div class="director-message">
                                                <p>{!!  $team->Address1  !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </section>
                                <h4><a href="{{ route('life.details', $team->slug) }}">{{ $team->Name }}</a></h4>
                                <h5>{{ $team->Batch }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    @foreach(\App\LifeMember::where('phone', 'Board of Directors')->orderBy('id')->skip(2)->limit(1)->get() as $team)

                    <div class="col-md-6  pull-right wow slideInRight animated animated" data-wow-delay="10ms" data-wow-duration="1500ms">
                    <div class="chairman-section align-items-center d-flex">
                        <div class="col-md-7">
                            <div class="chairman-details mr-20">
                                <p>{{ $team->Address }}<a class="seemore" href="{{ route('life.details', $team->slug) }}">...see more </a>
                                    <a class="moreless-button-dmd" href="#">...see more</a>
                                </p>
                                <section class="facilities-details-wrap moretext-dmd">
                                    <div class="row justify-content-start">
                                        <div class="col-md-12">
                                            <div class="director-message">
                                                <p>{!!  $team->Address1  !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </section>
                                <h4><a href="{{ route('life.details', $team->slug) }}">{{ $team->Name }} </a></h4>
                                <h5>{{ $team->Batch }}</h5>
                            </div>
                        </div>

                        <div class="col-md-5 order-first order-md-1">
                            <div class="circular-image-container-director">
                               <a  href="{{ route('life.details', $team->slug) }}"> <img class="director-pic" src="{{asset('/') }}uploads/life/{{ $team->image }}" alt="" /></a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- END: Director Message -->





    <!-- SISTER CONCERN section start 1 -->
    <section class="brand-secpull-left  sistern-card-wrapper"style="margin:15px 0px 10px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sec-content text-center">
                        <h2 class="sec-title">SISTER CONCERN</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-30 sister-consern-padding">
                <div class="all-sisier-logo">
                    <div class="circle" style="background-image: url({{asset('front') }}/assets/images/background/sister-shape.png);">


                        <div class="logo-sister-2 logo10" >
                            <a href=""><img src="{{asset('front') }}/assets/images/sister-consern/hpl.png" alt="Logo 4"></a>
                        </div>
                        @foreach(\App\photo_gallery_table::get() as $key=>$sister1)

                            @if($key==0)
                            <div class="logo-sister logo1">
                                <a href="{{ $sister1->designation }}"><img src="{{asset('/') }}uploads/photo/{{ $sister1->image }}" alt="{{ $sister1->title }}"></a>
                                <h2 class="sponsors-name">{{ $sister1->title }}</h2>
                            </div>
                            @endif

                                @if($key==1)
                            <div class="logo-sister logo2">
                                <a href="{{ $sister1->designation }}"><img src="{{asset('/') }}uploads/photo/{{ $sister1->image }}" alt="{{ $sister1->title }}"></a>
                                <h2 class="sponsors-name">{{ $sister1->title }}</h2>
                            </div>
                                @endif
                                @if($key==2)
                            <div class="logo-sister logo3">
                                <a href="{{ $sister1->designation }}"><img src="{{asset('/') }}uploads/photo/{{ $sister1->image }}" alt="{{ $sister1->title }}"></a>
                                <h2 class="sponsors-name">{{ $sister1->title }}</h2>
                            </div>
                                @endif
                                    @if($key==3)
                            <div class="logo-sister logo4">
                                <a href="{{ $sister1->designation }}"><img src="{{asset('/') }}uploads/photo/{{ $sister1->image }}" alt="{{ $sister1->title }}"></a>
                                <h2 class="sponsors-name">{{ $sister1->title }}</h2>
                            </div>
                                @endif
                                        @if($key==4)
                            <div class="logo-sister logo5">
                                <a href="{{ $sister1->designation }}"><img src="{{asset('/') }}uploads/photo/{{ $sister1->image }}" alt="{{ $sister1->title }}"></a>
                                <h2 class="sponsors-name">{{ $sister1->title }}</h2>
                            </div>
                                @endif
                        @endforeach
                    </div>
                </div>

                <div class="all-sisier-logo-2">
                    <div class="circle-2" style="background-image: url({{asset('front') }}/assets/images/background/sister-shape.png);">
                        @foreach(\App\photo_gallery_table::get() as $key2 => $sister2)
                            @if($key2 == 5)
                                <div class="logo-sister-2 logo55">
                                    <a href="{{ $sister2->designation }}"><img src="{{ asset('/') }}uploads/photo/{{ $sister2->image }}" alt="{{ $sister2->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister2->title }}</h2>
                                </div>
                            @endif

                            @if($key2 == 6)
                                <div class="logo-sister-2 logo6">
                                    <a href="{{ $sister2->designation }}"><img src="{{ asset('/') }}uploads/photo/{{ $sister2->image }}" alt="{{ $sister2->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister2->title }}</h2>
                                </div>
                            @endif

                            @if($key2 == 7)
                                <div class="logo-sister-2 logo7">
                                    <a href="{{ $sister2->designation }}"><img src="{{ asset('/') }}uploads/photo/{{ $sister2->image }}" alt="{{ $sister2->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister2->title }}</h2>
                                </div>
                            @endif

                            @if($key2 == 8)
                                <div class="logo-sister-2 logo8">
                                    <a href="{{ $sister2->designation }}"><img src="{{ asset('/') }}uploads/photo/{{ $sister2->image }}" alt="{{ $sister2->title }}"></a>
                                    <h2 class="sponsors-name">{{ $sister2->title }}</h2>
                                </div>
                            @endif
                        @endforeach




                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SISTER CONCERN section 1 end -->




    <!-- Start: Newsroom -->
    <section class="newsroom pb-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sec-content text-center">
                        <h2 class="sec-title">
                            <a href="#"> Explore Newsroom</a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around mt-30">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="news-animation-pic">
                        <img src="{{asset('front') }}/assets/images/background/cap.png">
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">

                    @foreach(\App\News::orderBy('id', 'desc')->limit(2)->get() as $news)
                    <div class="blog-item blog-box-shadow wow fadeInUp mb-15" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <!-- blog item 1 -->
                        <div class="img-box">
                            <img src="{{asset('/') }}uploads/news/{{ $news->image }}">
                        </div>
                        <div class="content-box">
                            <div class="title-box">
                                <h3>
                                    <a href="{{ route('news.details',$news->slug) }}">{{ \Illuminate\Support\Str::limit($news->title, 70, '...') }} </a>
                                </h3>

                                <p>{{ $news->sub_title }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>

            <div class="row mt-30 small-news-wrap wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">




                @foreach(\App\Article::orderBy('id', 'desc')->limit(3)->get() as $news)
                    <div class="col-md-4">
                        <div class="small-news">
                            <div class="small-news-gal">
                                <a href="{{ route('article.details',$news->slug) }}">
                                    <img src="{{asset('/') }}uploads/article/{{ $news->image }}">
                                </a>
                            </div>
                            <div class="small-news-content">
                                <h3>
                                    <a href="{{ route('article.details',$news->slug) }}">{{ \Illuminate\Support\Str::limit($news->title, 45, '...') }} </a>
                                </h3>
                                <p>{{ $news->sub_title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- End: Newsroom -->

    <!-- Video section start -->
    <section class="video-home mt-50 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sec-content text-center">
                        <h2 class="sec-title">Let's Explore HPL</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-box mt-30">
            @php
                $explore_hpl= \App\Objects::where('id', 1)->first();
                preg_match("/v=([a-zA-Z0-9_-]+)/", $explore_hpl->instagram, $matches);
                 $videoId = $matches[1];
            @endphp
            <iframe class="mapp" width="100%" height="440" src="https://www.youtube.com/embed/{{ $videoId }}" title="Healthcare Pharmaceuticals Limited Industrial park virtual tour" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        </div>
    </section>
    <!-- Video section start -->


    <!-- Marketing Partner start -->
    <section class="marketing-partner mt-30">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp mt-30" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="col-lg-7">
                    <div class="sec-content text-center">
                        <h2 class="sec-title">Marketing & Distribution Partner</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-30">
                @foreach(\App\CompanyManagement::where('type', 'marketing')->get() as $marketing)
                <div class="col-md-3 col-6 justify-content-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="marketing-logo">
                        <img src="{{asset('/') }}uploads/company/{{ $marketing->image }}">
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Marketing Partner start -->
    
    
    
   
    @php
       $modal= \App\Objects::where('id', 9)->first();
    @endphp
    @if($modal->instagram ==1)
    <div id="popupModal" class="popup-modal">
        <div class="popup-content">
            <span class="close-btn-popup" id="closePopup">&times;</span>
            <div class="pop-up-image">
               
              <img src="{{asset('/') }}uploads/object/{{ $modal->image }}">
              
            </div>
        </div>
    </div>
    @endif
    

<style type="text/css">
.popup-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgb(82 101 187 / 50%);
    justify-content: center;
    align-items: center;
    /* opacity: 0.9; */
    z-index: 10000;
}
.popup-content {
    border-radius: 10px;
    text-align: center;
    width: 90%;
    max-width: 600px;
    position: relative;
    animation: slideIn 0.5s ease-out;
}

.pop-up-image{}
.pop-up-image img{
  width: 100%;
}
.popup-content h2 {
    font-size: 24px;
    color: #333;
}

.popup-content p {
    font-size: 16px;
    color: #666;
}

.cta-btn {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 15px;
    background-color: #007BFF;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.cta-btn:hover {
    background-color: #0056b3;
}

/* Close button */
.close-btn-popup {
    position: absolute;
    top: -35px;
    z-index: 99999;
    right: -67px;
    font-size: 32px;
    background-color: #43e2f1;
    padding: 5px;
    cursor: pointer;
    color: #222;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    line-height: 29px;
}
.close-btn-popup:hover {
    color: #fff;
}

/* Slide-in animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
    
    
<!-- Search palceholder hide -->
      <script>
    const searchBox = document.getElementById('product-search-input');

    // Hide placeholder on focus
    searchBox.addEventListener('focus', function() {
        this.setAttribute('placeholder', ''); // Hide placeholder
    });

    // Show placeholder on blur if input is empty
    searchBox.addEventListener('blur', function() {
        if (!this.value) {
            this.setAttribute('placeholder', 'Search by trade name, Generic name, Therapeutic class ...');
        }
    });
</script>


<!-- Pop up -->
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function () {
    // Show the popup after page load
    const popup = document.getElementById("popupModal");
    popup.style.display = "flex";

    // Close the popup when the close button is clicked
    const closeBtn = document.getElementById("closePopup");
    closeBtn.addEventListener("click", function () {
        popup.style.display = "none";
    });

    // Close popup when clicking outside the content
    window.addEventListener("click", function (event) {
        if (event.target === popup) {
            popup.style.display = "none";
        }
    });
});

</script>


@endsection

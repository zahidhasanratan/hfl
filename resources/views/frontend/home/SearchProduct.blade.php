@extends('frontend.app')

@section('title','Product Search | Healthcare Pharmaceuticals')


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
                                <input type="text" id="product-search-input" name="query" placeholder="Search by Trade name / Generic name / Therapeutic class" autocomplete="off">
                                <button type="submit">
                                    <img width="30px" src="{{asset('front')}}/assets/images/blog/icon/tabler_search.png" alt="icon">
                                </button>
                            </form>

                            <div id="product-suggestions" style="display: none;" class="suggestions-dropdown">
                                <!-- AJAX suggestions will be injected here -->
                            </div>

                            <!--<p class="trade-name">Search by Trade name / Generic name / Therapeutic class</p>-->
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
                        
                        <!---->
                        <div class="search-product">
                            <div class="product-item  product-details wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">

                                <div class="circular-image-container">
                                    <a href="{{ route('product.details', $product2->slug) }}">
                                        <img src="{{ asset('uploads/product/' . $product2->image) }}" alt="">
                                    </a>
                                </div>

                                <div class="content-box">
                                    <div class="title-box">
                                        <h3><a href='{{ route('product.details', $product2->slug) }}'> {{ $product2->title }}</a></h3>
                                        <p>{{ $product2->gereric }}</p>
                                        <!--<h4>{{ $product2->size }}</h4>-->

                                    </div>
                                    <div class="btn-box">
                                        <a class='read-more-btn' href='{{ route('product.details', $product2->slug) }}'>
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
    </section>
    <!-- Newly section end -->
    
    <style>
        .title-bg {
            height: 16%;
           
        }
    </style>

@endsection

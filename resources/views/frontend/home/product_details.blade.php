@extends('frontend.app')

@section('title', $product->title . ' | Healthcare Pharmaceuticals')


@section('main')

    <section class="page-direction">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-breadcumb-wrapper pt-200">
                        <div class="breadcumb-content">
                            <ul class="page-navigator">
                                <li class="home"><a href="{{ asset('/') }}">Home</a></li>
                                <li class="home"><a href="{{ route('product.all') }}">Product</a></li>
                                <li class="current-page"><a href="#">@if($product)
   {{ $product->title }}
@else
    Title not found
@endif </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="product-details-wrapper">
        <div class="container">
            <div class="row">
                
                <div class="col-md-5">
                        <div class="details-product">
                         <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/') }}uploads/product/{{ $product->image }}">
                </div>
                 @if($product->video !='')
                <div class="carousel-item">
                    <video autoplay muted loop>
                                  <source src="{{ asset('/') }}uploads/video/{{ $product->video }}" type="video/mp4">
                                  Your browser does not support the video tag.
                              </video>
                </div>
                @endif
            @if($product->images2 !='')
                 @foreach(explode(',', $product->images2) as $key => $image)
                <div class="carousel-item">
                    <img src="{{ asset('images/' . $image) }}" >
                </div>
               @endforeach
            @endif   
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Thumbnail slider -->
        <div class="thumbnail-slider">
            <!-- <button class="arrow-btn" id="thumbnailPrev">&#10094;</button> -->
            <div class="thumbnails">
    <img src="{{ asset('uploads/product/' . $product->image) }}" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active">
    
    @php
        $slideIndex = 1;
    @endphp

    @if($product->video != '')
        <img src="{{ asset('front/assets/images/logo/youtube.jpeg') }}" data-bs-target="#productCarousel" data-bs-slide-to="{{ $slideIndex }}">
        @php
            $slideIndex++;
        @endphp
    @endif
@if($product->images2 !='')
    @foreach(explode(',', $product->images2) as $key => $image)
        <img src="{{ asset('images/' . $image) }}" data-bs-target="#productCarousel" data-bs-slide-to="{{ $slideIndex + $key }}">
    @endforeach
@endif    
</div>

         
</div>     
                        </div>
                </div>
                
                <div class="col-md-7">
                    <div class="product-description">
                        <div class="product-description-top">
                            <h2>@if($product)
   {{ $product->title }}
@else
    Title not found
@endif</h2>
                            <h3>{{ $product->gereric }}</h3>
                            <div class="product-classification">
                                  <ul>
                                   @foreach(explode(',', $product->size) as $size)
        <li>{{ trim($size) }}</li>
    @endforeach
                                  </ul>
                      </div>
                      
                             <p class="form-type"> {{ $product->type }}</p>
                            
                            <p class="category-title">
    @if($product && $product->Pcat_id)
        {{ \App\Pcategory::find($product->Pcat_id)->title ?? 'Category not found' }}
    @else
        Category not available
    @endif
</p>
                             
                            <!-- <h4>Non-sedating antihistamines</h4> -->

                            <div class="pro-details-content">
                                <p>{{ $product->short }}<br><br>

                                    {!! $product->description !!}
                                </p>

                                <div class="tabing-list">
                                    <nav>
                                        <div class="nav nav-tabs nav-tabs-custom mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link nav-tab-custom-btn active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Prescribing Information <span><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span> </button>
                                            <button class="nav-link nav-tab-custom-btn" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Patients Information<span><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span></button>
                                            <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">tab 3</button> -->
                                        </div>
                                    </nav>


                                    <!-- <div class="pro-button">
                                        <a class="press-btn" href="#">Prescribing Description <span><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span></a>
                                    </div>

                                    <div class="pro-button">
                                        <a class="press-btn" href="#">Patients Description <span><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span></a>
                                    </div> -->
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Product Indications  -->
    <div class="product-specification pb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbing-sppec">

                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                                @foreach(\App\Professional::where('P_id', $product->id)->orderBy('sequece', 'asc')->get() as $key=>$professional)
                                <input id="tab-{{ $key+1 }}" type="radio" name="tabs" @if($key==0) checked @endif>
                                <label for="tab-{{ $key+1 }}">{{ $professional->title }}</label>
                                @endforeach




                                <div class="content">
                                    @foreach(\App\Professional::where('P_id', $product->id)->orderBy('sequece', 'asc')->get() as $key=>$professional)

                                    <div id="content-{{ $key+1 }}">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="con-tab">
                                                    {!! $professional->description !!}

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="con-tab justify-content-end">
                                                    <img src="{{ asset('/') }}uploads/professional/{{ $professional->image }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>


                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <h3 class="overview">Overview</h3>
                                <div class="faq-sec">

                                    <div id="accordion" class="accordion-container wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        @foreach(\App\Overview::where('P_id', $product->id)->orderBy('sequece')->get() as $key=>$overview)
                                            <h4 class="accordion-title @if($key==0) open @endif">Q:{{ $overview->question }}</h4>
                                        <div class="accordion-content" @if($key!=0) style="display: none" @endif>
                                            <p>A: {{ $overview->answare }} </p>
                                        </div>
                                        @endforeach



                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Indications  -->


    <div class="container">
        <div class="row align-items-center justify-content-center mt-10">
           @if($product->presOn !='')
            <div class="col-md-4 col-lg-3">
                <div><a class="click-btn btn-style500" href="{{ asset('') }}uploads/prescription/{{ $product->prescription }}">Download Prescription</a></div>
            </div>
            @endif
             @if($product->presOn !='')
            <div class="col-md-4 col-lg-3">
                <div><a class="click-btn btn-style500" href="{{ asset('') }}uploads/patient/{{ $product->patient }}">All Product List</a></div>
            </div>
             @endif
        </div>
    </div>






    <!-- Related Products -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pro-titles ptb-50">
                    <h3>Related Products</h3>
                </div>
            </div>
        </div>
        <div class="row align-items-center tab-col-gap wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
            <div class="brand-slider owl-carousel owl-theme pt-5">
                @foreach(\App\Product::where('Pcat_id', $product->Pcat_id)
    ->where('slug', '!=', $product->slug)
    ->get() as $product2)

                    <div class="item single-team">

                        <div class="search-product">
                            <div class="product-item  product-details wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">

                                <div class="circular-image-container">
                                    <a href="{{ route('product.details', $product2->slug) }}">
                                        <img src="{{ asset('uploads/product/' . $product2->image) }}" alt="">
                                    </a>
                                </div>

                                <div class="content-box">
                                    <div class="title-box">
                                        <h3><a href='{{ route('product.details', $product2->slug) }}'> @if($product2)
{{ $product2->title }}
@else
    Title not found
@endif</a></h3>
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
    </div>
    <!-- Related Products -->
    <script>
        // Thumbnail carousel synchronization
        const thumbnails = document.querySelectorAll('.thumbnail-slider img');
        const carousel = document.querySelector('#productCarousel');

        carousel.addEventListener('slide.bs.carousel', (event) => {
            thumbnails.forEach(img => img.classList.remove('active'));
            thumbnails[event.to].classList.add('active');
        });

        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', () => {
                thumbnails.forEach(img => img.classList.remove('active'));
                thumbnail.classList.add('active');
                new bootstrap.Carousel(carousel).to(index);
            });
        });

        // Thumbnail slider scroll functionality
        const thumbnailContainer = document.querySelector('.thumbnails');
        const thumbnailPrev = document.getElementById('thumbnailPrev');
        const thumbnailNext = document.getElementById('thumbnailNext');

        let scrollAmount = 0;
        const scrollStep = 100; // Adjust as needed
        const maxScroll = thumbnailContainer.scrollWidth - thumbnailContainer.clientWidth;

        thumbnailNext.addEventListener('click', () => {
            if (scrollAmount < maxScroll) {
                scrollAmount += scrollStep;
                thumbnailContainer.style.transform = translateX(-${scrollAmount}px);
            }
        });

        thumbnailPrev.addEventListener('click', () => {
            if (scrollAmount > 0) {
                scrollAmount -= scrollStep;
                thumbnailContainer.style.transform = translateX(-${scrollAmount}px);
            }
        });
    </script>
    <style>
    
    
    /* Smartphones (portrait and landscape) ----------- */
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
    
    
    .thumbnail-slider img {
        width: 35px;
        height: auto;
       
    }
}
    
    i.fa.fa-chevron-circle-down {
        padding-left: 5px;
    }
       .carousel-item img {
            object-fit: contain;
            height: 400px;
            /* width: 100%; */
            border: 1px solid #a56cff;
            padding: 4px;
            border-radius: 5px;
        }

        /* Thumbnail slider styling */
        .thumbnail-slider {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            overflow: hidden;
            margin-top: 10px;
        }

        .thumbnail-slider .thumbnails-wrapper {
            overflow: hidden;
            width: 100%;
        }

        .thumbnail-slider .thumbnails {
            display: flex;
            transition: transform 0.3s ease;
            gap: 3px;
        }

        .thumbnail-slider img {
                width: 45px;
                height: auto;
                cursor: pointer;
                border: 2px solid transparent;
                transition: border-color 0.3s;
            }

        .thumbnail-slider img.active {
            border-color: #0d6efd;
        }

        /* Thumbnail arrow buttons */
        .thumbnail-slider .arrow-btn {
            background-color: #ffffff;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #333;
            padding: 5px;
      }
</style>
@endsection

@extends('frontend.app')
@section('title') ALL Category Wise Product @endsection
@section('main')
    @php
        $lastSlug = request()->segment(count(request()->segments()));
    @endphp

    <!-- Start: SIngle Product -->
    <main class="main">
        <div class="hero-section">
            {{--            <div class="hero-slider owl-carousel owl-theme">--}}
            {{--                @php--}}
            {{--                    $lastSlug = basename(url()->current());--}}
            {{--                @endphp--}}
            {{--                @php--}}
            {{--                    $banner = \App\Menu::where('slug', $lastSlug)->first()->image ;--}}
            {{--                @endphp--}}
            {{--                @if($banner =='')--}}
            {{--                    <div class="hero-single" style="background: url({{ asset('front/assets/img/slider/4.jpg') }}); max-height: 180px;">--}}
            {{--                    </div>--}}
            {{--                @else--}}
            {{--                    <div class="hero-single" style="background: url({{ asset('uploads/menu') }}/{{ $banner }}); max-height: 180px;">--}}
            {{--                    </div>--}}
            {{--                @endif--}}


            {{--            </div>--}}

            <section class="product-wrapper pt-50">
                <div class="container">
                    <div class="row g-3">

                        <div class="col-xl-3 col-lg-3">
                            <div class="service-sidebar">
                                <div class="widget category">
                                    <h4 class="widget-title">All Products</h4>

                                    <form class="search-form" style="margin-bottom:10px" method="POST" action="{{ route('ProductSearch') }}">
                                        @csrf
                                        <input type="text" name="keyword" class="form-control" placeholder="Search product name...">
                                        <button type="submit">
                                            <i class="far fa-search"></i>
                                        </button>
                                    </form>

                                    <div class="category-list">

                                        {{--                                    @foreach($Category as $key => $cat)--}}
                                        {{--                                        <li><a href="{{route('CategoryProduct',$cat->id)}}">{{@$cat->category_name}}</a></li>--}}
                                        <li><a href="{{ route('TradeName') }}">Search by Trade Name</a></li>
                                        <li><a href="{{ route('Therapeutic') }}">Search by Therapeutic</a></li>
                                        <li><a href="{{ route('Generic') }}">Search by Generic</a></li>

                                        {{--                                    @endforeach--}}

                                        {{-- <a href="product-trade-name.html"><i class="far fa-angle-double-right"></i>Search by Trade Name</a>
                                        <a href="product-generic-name.html"><i class="far fa-angle-double-right"></i>Search by Generic Name</a>
                                        <a href="productTherapeuticClass.html"><i class="far fa-angle-double-right"></i>Search by Therapeutic Class</a> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 tab-content">
                            <div class="product-details-wrapper">
                                <h2>To view Therapeutic Class</h2>
                                <select onchange="window.location.href=this.value" class="form-select select-width" aria-label="Default select example">
                                    <option value="">Select None</option>
                                    @foreach(\App\TCategory::all() as $t_cat)
                                        <option value="{{ route('TherapeuticId', $t_cat->id) }}">{{ $t_cat->t_category_name }}</option>
                                    @endforeach
                                </select>

                                <div class="product-tabing-all-product">
                                    <div class="pagetitle-wrap">
                                        <h1 class="pagetitle">Search by Trade Name</h1><span></span>
                                    </div>

                                    <!-- Alphabet Tabs -->
                                    <ul class="nav nav-tabs" id="productTabs" role="tablist" style="border:none">
                                        @foreach(range('A', 'Z') as $letter)
                                            <li class="nav-item" role="presentation">
                                                <button
                                                    class="nav-link nav-link-filter-btn {{ $loop->first ? 'active' : '' }}"
                                                    data-letter="{{ $letter }}"
                                                    type="button">
                                                    {{ $letter }}
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <!-- Product List -->
                                    <div class="row mt-3" id="productList">


                                        @foreach(\App\ProductManage::where('product_name', 'LIKE', '%' . $keyword . '%')->get() as $productCategory)
                                            <div class="col-lg-4 col-6 product-card-wrapper"
                                                 data-letter="{{ strtoupper(substr($productCategory->product_name, 0, 1)) }}">
                                                <div class="product-card">
                                                    <div class="product-card__image">
                                                        <a href="#">
                                                            <img
                                                                src="{{ $productCategory->image ? url('uploads/product_manage/' . $productCategory->image) : '' }}"
                                                                alt="{{ $productCategory->product_name }}">
                                                        </a>
                                                    </div>
                                                    <div class="product-card__info text-center">
                                                        <h2 class="product-card__title">
                                                            <a href="#"> {{ $productCategory->product_name }}</a>
                                                        </h2>
                                                        {!! Illuminate\Support\Str::limit($productCategory->short_summary, 200) !!}
                                                    </div>
                                                    <style>
                                                        .product-card__info p {
                                                            color: white;
                                                        }
                                                    </style>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const tabs = document.querySelectorAll('.nav-link-filter-btn');
                                    const products = document.querySelectorAll('.product-card-wrapper');

                                    tabs.forEach(tab => {
                                        tab.addEventListener('click', function () {
                                            // Remove active class from all tabs
                                            tabs.forEach(t => t.classList.remove('active'));
                                            // Add active class to clicked tab
                                            tab.classList.add('active');

                                            const selectedLetter = tab.getAttribute('data-letter');

                                            // Show or hide products based on the selected letter
                                            products.forEach(product => {
                                                const productLetter = product.getAttribute('data-letter');
                                                if (productLetter === selectedLetter) {
                                                    product.style.display = 'block';
                                                    product.style.opacity = '0'; // Start with opacity 0
                                                    setTimeout(() => {
                                                        product.style.opacity = '1'; // Fade in
                                                    }, 50); // Add delay to trigger the transition
                                                } else {
                                                    product.style.display = 'none';
                                                }
                                            });

                                            // Trigger reflow to ensure proper rendering
                                            const container = document.getElementById('productList');
                                            container.offsetHeight; // Access offsetHeight to force reflow
                                        });
                                    });

                                    // Trigger click on the first tab to show its products by default
                                    tabs[0].click();
                                });
                            </script>


                        </div>
                    </div>
                </div>

            </section>


    </main>

@endsection

























@extends('frontend.app')
@section('title') ALL Category Wise Product @endsection
@section('main')

<!-- Start: Single Product -->
<main class="main">
    <div class="hero-section">
        <div class="hero-slider owl-carousel owl-theme">
            <div class="hero-single" style="background: url(assets/img/slider/sli-000.png); max-height: 430px;">
            </div>
        </div>
    </div>

    <section class="product-wrapper pt-50">
        <div class="container">
            <div class="row g-3">
                <!-- Sidebar -->
                <div class="col-xl-3 col-lg-3">
                    <div class="service-sidebar">
                        <div class="widget category">
                            <h4 class="widget-title">All Products</h4>
                            <form class="search-form mb-3">
                                <input type="text" class="form-control" placeholder="Search product name...">
                                <button type="submit">
                                    <i class="far fa-search"></i>
                                </button>
                            </form>
                            <ul class="category-list">
                                @foreach($Category as $cat)
                                    <li>
                                        <a href="{{ route('CategoryProduct', $cat->id) }}">
                                            {{ $cat->category_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Product Listing -->
                <div class="col-md-9">
                    <div class="product-details-wrapper">
                        <div class="product-tabing-all-product">
                            <div class="pagetitle-wrap">
                                <h1 class="pagetitle">Search by Trade Name</h1>
                                <span></span>
                            </div>

                            <!-- Tabs -->
                            <ul class="nav nav-tabs" id="productTabs" role="tablist" style="border:none">
                                @foreach (range('A', 'Z') as $char)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ request('char') == $char ? 'active' : '' }}" 
                                           href="{{ route('ProductCharacterSearchGeneric', [$cat_id, $char]) }}">
                                            {{ $char }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content mt-3">
                                @foreach (range('A', 'Z') as $char)
                                    <div class="tab-pane fade {{ request('char') == $char ? 'show active' : '' }}" 
                                         id="content-{{ strtolower($char) }}" 
                                         role="tabpanel">
                                        <div class="row">
                                            @php
                                                $products = App\ProductManage::where('status', 'Active')
                                                    ->where('product_name', 'LIKE', $char . '%')
                                                    ->get();
                                            @endphp

                                            @forelse ($products as $product)
                                                <div class="col-lg-4 col-6">
                                                    <div class="product-card wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".35s">
                                                        <div class="product-card__image">
                                                            {{-- <a href="{{ route('SingleProduct', $product->slug) }}"> --}}
                                                            <a href="#">
                                                                <img src="{{ $product->image ? url('uploads/product_manage/' . $product->image) : '' }}" 
                                                                     alt="{{ $product->product_name }}">
                                                            </a>
                                                        </div>
                                                        <div class="product-card__info text-center">
                                                            <h2 class="product-card__title">
                                                                <a href="#">
                                                                {{-- <a href="{{ route('SingleProduct', $product->slug) }}"> --}}
                                                                    {{ $product->product_name }}
                                                                </a>
                                                            </h2>
                                                            <p class="product-card__description">
                                                                {!! Illuminate\Support\Str::limit($product->short_summary, 200) !!}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p class="text-center">No products found for "{{ $char }}".</p>
                                            @endforelse
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

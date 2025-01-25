


@extends('frontend.app')
@section('title') ALL Category Wise Product @endsection
@section('main')


    <!-- Start: SIngle Product -->
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
             <div class="col-xl-3 col-lg-3">
               <div class="service-sidebar">
                   <div class="widget category">
                       <h4 class="widget-title">All Products</h4>

                       <form class="search-form" style="margin-bottom:10px">
                         <input type="text" class="form-control" placeholder="Search product name...">
                         <button type="submit">
                           <i class="far fa-search"></i>
                         </button>
                       </form>
                       <div class="category-list">

                    @foreach($Category as $key => $cat)
                        <li><a href="{{route('CategoryProduct',$cat->id)}}">{{@$cat->category_name}}</a></li>
                   @endforeach
                          
                           {{-- <a href="product-trade-name.html"><i class="far fa-angle-double-right"></i>Search by Trade Name</a>
                           <a href="product-generic-name.html"><i class="far fa-angle-double-right"></i>Search by Generic Name</a>
                           <a href="productTherapeuticClass.html"><i class="far fa-angle-double-right"></i>Search by Therapeutic Class</a> --}}
                       </div>
                   </div>
               </div>
           </div>


             <div class="col-md-9 tab-content">
                 <div class="product-details-wrapper">
                   <div class="product-tabing-all-product">
                     <div class="pagetitle-wrap">
                         <h1 class="pagetitle">
                          Search by Trade Name
                         </h1><span></span>
                      </div>

                      <!--  -->

                       <!-- Nav tabs -->
                       <ul class="nav nav-tabs" id="productTabs" role="tablist" style="border:none">
                           {{-- <li class="nav-item" role="presentation">
                               <button class="nav-link nav-link-filter-btn active" id="tab-a" data-bs-toggle="tab" data-bs-target="#content-a" type="button" role="tab" aria-controls="content-a" aria-selected="true">A</button>
                           </li> --}}
                           @foreach (range('A', 'Z') as $char)
    @php
        // Determine the route and target based on category
        if ($cat->category_name == 'Search by Therapeutic Name') {
            $route = route('ProductCharacterSearchTherape', [$cat->id, $char]);
            $isActive = request()->is('ProductCharacterSearchTherape/'.$cat->id.'/'.$char);
        } elseif ($cat->category_name == 'Search by Generic Name') {
            $route = route('ProductCharacterSearchGeneric', [$cat->id, $char]);
            $isActive = request()->is('ProductCharacterSearchGeneric/'.$cat->id.'/'.$char);
        } else {
            $route = route('AllProductCharacterSearch', [$cat->id, $char]);
            $isActive = request()->is('AllProductCharacterSearch/'.$cat->id.'/'.$char);
        }
    @endphp

    <li class="nav-item" role="presentation">
        <button 
            class="nav-link nav-link-filter-btn {{ $isActive ? 'active' : '' }}" 
            id="tab-{{ strtolower($char) }}" 
            data-bs-toggle="tab" 
            data-bs-target="#content-{{ strtolower($char) }}" 
            type="button" 
            role="tab" 
            aria-controls="content-{{ strtolower($char) }}" 
            aria-selected="{{ $isActive ? 'true' : 'false' }}"
            onclick="window.location.href='{{ $route }}'">
            {{ $char }}
        </button>
    </li>
@endforeach

                       </ul>

                       <!-- Tab content -->

                       <div class="tab-content mt-3">
                        {{-- @foreach (App\PrroCategorys::with(['product', 'category'])
                            ->whereHas('product', fn($query) => $query->where('status', 'Active'))
                            ->get()
                            ->groupBy('cat_id') as $catId => $products) --}}
                    
                            @foreach ($pro as $productCategory)
                                {{-- @php
                                    $product = $productCategory->product; // Access the related ProductManage model
                                @endphp --}}
                    
                                <div class="tab-pane fade show active" 
                                     id="content-{{ $productCategory->id }}" 
                                     role="tabpanel" 
                                     aria-labelledby="tab-{{ $productCategory->id }}">
                                    <div class="row">
                                        <div class="col-lg-4 col-6">
                                            <div class="product-card wow fadeInLeft" 
                                                 data-wow-duration="1s" 
                                                 data-wow-delay=".35s">
                                                 
                                                <div class="product-card__image">
                                                    <a href="#">
                                                        <img src="{{ $productCategory->image ? url('uploads/product_manage/' . $productCategory->image) : '' }}" 
                                                             alt="{{ $productCategory->product_name }}">
                                                    </a>
                                                </div>
                                                
                                                <div class="product-card__info text-center">
                                                    <h2 class="product-card__title">
                                                        <a href="#">
                                                            {{ $productCategory->product_name }}
                                                        </a>
                                                    </h2>

                                                    <p class="product-card__description">
                                                        {!! Illuminate\Support\Str::limit($productCategory->short_summary, 200) !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- @endforeach --}}
                        @endforeach
                    </div>
                    

                      <!--  -->
                   </div>
                 </div>

             </div>
           </div>
       </div>

       </section>


     </main>

     @endsection

























 <!-- Start: SIngle Product -->
 @extends('frontend.app')

@section('title','About | Healthcare Pharmaceuticals')


@section('main')

 <main class="main">
     <div class="hero-section">
         @php
             $lastSlug = basename(url()->current());
             $menu = \App\Menu::where('slug', $lastSlug)->first();
             $banner = $menu ? $menu->image : null;
         @endphp

         @if($banner)
             <div class="hero-single" style="background: url({{ asset('uploads/menu/' . $banner) }}); max-height: 180px;">
             </div>
         @else
             <div class="hero-single" style="background: url({{ asset('front/assets/img/slider/4.jpg') }}); max-height: 180px;">
             </div>
         @endif
     </div>


         <style type="text/css">
           :root {
           --primary-color: #009c95;
           --bg-grey: #f5f7f6;
           --bg-black: #201f1d;
           --bg-white: #ffffff;
           --text-color: #212529;
           --text-color-white: #ffffff;
           --font-color: #676767;
           --heading-color: #343a40;
           --border-color: #dee2e6;
             }

           .services .cardss {
             position: relative;
             z-index: 1;
             border-top: 3px solid var(--theme-color2);
           }

           .services i {
             color: var(--theme-color2);
           }

           .cardss > .anim-layer {
             position: absolute;
             top: 0;
             left: 0;
             width: 100%;
             height: 0;
             background-color: var(--theme-color2);
             transition: height 0.3s ease;
           }

           .cardss:hover .anim-layer {
             height: 100%;
           }

           .cardss:hover h2, .cardss:hover i, .cardss:hover p {
             position: relative;
             z-index: 1;
             color: var(--text-color-white);
           }

           .cardss i {
               background-color: #efe9e9;
               width: 75px;
               height: 75px;
               display: flex;
               padding: 10px;
               align-items: center;
               font-size: 35px;
               justify-content: center;
               border-radius: 50%;
           }

           .cardss:hover i {
             color: var(--primary-color);
           }
           </style>

   <section class="product-wrapper pt-50">
     <div class="container">
       <div class="row g-3">
         <div class="col-md-3">

           <div class="widget category">
             <h4 class="widget-title">About Us</h4>
             <nav class="nav nav-pills flex-column">
                @foreach($links as $link)
                  <a href="{{ $link['url'] }}" class="nav-link nav-link-custom-tab {{ request()->is($link['active']) ? 'active' : '' }}">
                    <i class="far fa-angle-double-right"></i> {{ $link['title'] }}
                  </a>
                @endforeach
              </nav>
           </div>

         </div>
         <div class="col-md-9 tab-content">
           <article class="tab-pane fade show active" id="category_tab1">
             <div class="product-details-wrapper">
               <div class="accordion-body">
                   <div class="row justify-content-center">
                     <div class="col-md-12 col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                       <div class="feature-item">
                         <div class="feature-icon">
                           <img src="assets/img/icon/mission.png" alt="">
                         </div>
                         <div class="feature-content">
                           <h4>Mission</h4>
                           <p>{{$about->short}}</p>
                         </div>

                       </div>
                     </div>

                     <div class="col-md-12 col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                       <div class="feature-item">
                         <div class="feature-icon">
                           <img src="assets/img/icon/vision.png" alt="">
                         </div>
                         <div class="feature-content">
                           <h4>Vision</h4>
                           <p>{{$about->description}} </p>
                         </div>
                       </div>
                     </div>

                     <div class="col-md-12 col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                       <div class="feature-item">
                         <div class="feature-icon">
                           <img src="assets/img/icon/values.png" alt="">
                         </div>
                         <div class="feature-content">
                           <h4>Values</h4>
                           <p>{{$about->slug}}</p>
                         </div>
                       </div>
                     </div>



                       <!-- <div class="col-lg-6 col-6">
                         <div class="services">
                           <div class="cardss shadow p-5 d-flex flex-column justify-content-center align-items-center">
                             <div class="anim-layer"></div>
                             <i class="fa-solid fa-users display-5 mb-3"></i>
                             <h2>Mission</h2>
                             <p class="text-center mb-0">To preserve and improve patients' health by consistently delivering high-quality, safe, and effective pharmaceutical products and services that meet customer expectations across the globe through current good manufacturing practices, state-of-the-art technology, a competent workforce, and efficient management.</p>
                           </div>
                         </div>
                       </div> -->

                       <!-- <div class="col-lg-6 col-6">
                         <div class="services">
                           <div class="cardss shadow p-5 d-flex flex-column justify-content-center align-items-center">
                             <div class="anim-layer"></div>
                             <i class="fa-solid fa-eye display-5 mb-3"></i>
                             <h2>Vision</h2>
                             <p class="text-center mb-0">To be the leading pharmaceutical company in Bangladesh in terms of expertise, innovation, and responsible entrepreneurship. We aim to establish a visible presence in international markets with our high-quality products and services.</p>
                           </div>
                         </div>
                       </div>  -->
                   </div>
               </div>
             </div>
           </article>

           <article class="tab-pane fade" id="category_tab2">
             <div class="product-details-wrapper">
               <div class="accordion-body">
                   <div class="row">
                     <div class="timeline">
                       <ul>

                         <li>
                           <div class="content">

                               <div class="timeline-content-info">

                                   <span class="timeline-content-info-date">

                                       1999
                                   </span>
                               </div>
                               <p>License agreement with F.Hoffmann-La Roche Ltd. </p>

                           </div>
                         </li>
                         <li>
                           <div class="content">
                               <div class="timeline-content-info">
                                   <span class="timeline-content-info-date">
                                        1999 - 2000
                                   </span>
                               </div>
                               <p>Installation, Qualification & Validation </p>
                           </div>
                         </li>

                         <li>
                           <div class="content">

                               <div class="timeline-content-info">

                                   <span class="timeline-content-info-date">

                                       1999
                                   </span>
                               </div>
                               <p>License agreement with F.Hoffmann-La Roche Ltd. </p>

                           </div>
                         </li>
                         <li>
                           <div class="content">
                               <div class="timeline-content-info">
                                   <span class="timeline-content-info-date">
                                        1999 - 2000
                                   </span>
                               </div>
                               <p>Installation, Qualification & Validation </p>
                           </div>
                         </li>


                         <li>
                           <div class="content">

                               <div class="timeline-content-info">

                                   <span class="timeline-content-info-date">

                                       1999
                                   </span>
                               </div>
                               <p>License agreement with F.Hoffmann-La Roche Ltd. </p>

                           </div>
                         </li>
                         <li>
                           <div class="content">
                               <div class="timeline-content-info">
                                   <span class="timeline-content-info-date">
                                        1999 - 2000
                                   </span>
                               </div>
                               <p>Installation, Qualification & Validation </p>
                           </div>
                         </li>

                       </ul>

                 </div>



                   </div>
               </div>
             </div>
           </article>

           <article class="tab-pane fade" id="category_tab3">
             <div class="product-details-wrapper">
               <div class="top-inner-product-slider">
                 <img src="assets/img/background/bg-2.jpg">
               </div>

               <div class="accordion-body">
                   <div class="row">
                     <div class="col-lg-4 col-6">
                        <div class="product-card wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".25s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-name: fadeInLeft;">
                           <div class="product-card__image">
                               <a href="product-details.html"><img src="assets/img/products/1.png" alt="Product Name"></a>
                           </div>
                            <div class="product-card__info text-center">
                               <h2 class="product-card__title"><a href="product-details.html"> Calvenus </a></h2>
                               <p class="product-card__description">Calcium</p>
                               <p class="product-card__description">100 mL, 500 mL &amp; 1 Liter</p>
                           </div>
                       </div>
                     </div>

                     <div class="col-lg-4 col-6">
                        <div class="product-card wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".35s">
                           <div class="product-card__image">
                               <a href="product-details.html"><img src="assets/img/products/2.png" alt="Product Name"></a>
                           </div>
                            <div class="product-card__info text-center">
                               <h2 class="product-card__title"><a href="product-details.html">Gasotox</a></h2>
                               <p class="product-card__description">Powder of Oral Suspension</p>
                               <p class="product-card__description">125 g</p>
                           </div>
                       </div>
                     </div>


                     <div class="col-lg-4 col-6">
                        <div class="product-card wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".45s">
                           <div class="product-card__image">
                               <a href="#"><img src="assets/img/products/3.png" alt="Product Name"></a>
                           </div>
                            <div class="product-card__info text-center">
                               <h2 class="product-card__title"><a href="#">Goldvit-DB</a></h2>
                               <p class="product-card__description">Title Name Here</p>
                               <p class="product-card__description">1 Kg</p>
                           </div>
                       </div>
                     </div>

                     <div class="col-lg-4 col-6">
                       <div class="product-card wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".55s">
                           <div class="product-card__image">
                               <a href="#"><img src="assets/img/products/4.png" alt="Product Name"></a>
                           </div>
                            <div class="product-card__info text-center">
                               <h2 class="product-card__title"><a href="#">Toxo Liquid</a></h2>
                               <p class="product-card__description">Title Name Here</p>
                               <p class="product-card__description">1 Liter</p>
                           </div>
                       </div>
                     </div>


                     <div class="col-lg-4 col-6">
                       <div class="product-card wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".65s">
                           <div class="product-card__image">
                               <a href="#"><img src="assets/img/products/5.png" alt="Product Name"></a>
                           </div>
                            <div class="product-card__info text-center">
                               <h2 class="product-card__title"><a href="#">Oricef vet</a></h2>
                               <p class="product-card__description">Ceftriaxone Sodium</p>
                               <p class="product-card__description">1 gm/vial</p>
                           </div>
                       </div>
                     </div>

                     <div class="col-lg-4 col-6">
                        <div class="product-card wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".45s">
                           <div class="product-card__image">
                               <a href="#"><img src="assets/img/products/6.png" alt="Product Name"></a>
                           </div>
                            <div class="product-card__info text-center">
                               <h2 class="product-card__title"><a href="#">Mint Plus</a></h2>
                               <p class="product-card__description">Title Name Here</p>
                               <p class="product-card__description">500 mL</p>
                           </div>
                       </div>
                     </div>
                   </div>
               </div>
             </div>
           </article>
         </div>
       </div>
   </div>

   </section>
 </main>

 @endsection

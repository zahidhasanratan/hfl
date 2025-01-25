 <!-- Start: SIngle Product -->
 @extends('frontend.app')

@section('title','About | Healthcare Pharmaceuticals')


@section('main')

  <!-- Start: SIngle Product -->
  <main class="main">
    <div class="hero-section">
       <div class="hero-slider owl-carousel owl-theme">
         <div class="hero-single" style="background: url(assets/img/slider/4.jpg); max-height: 180px;">
         </div>
       </div>
     </div>




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
         <div class="col-md-9">


           <div class="row justify-content-center">


             <div class="col-lg-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".50s">
               <div class="card_director card_director-column">
                 <div class="img-profile">
                   <img src="{{asset('/') }}uploads/object/{{ $about->image }}">
                 </div>
                 <div class="infos">
                   <div class="name">
                     <h2>{{ $about->short }}</h2>
                     <h4>{{ $about->slug }}</h4>
                   </div>
                   <p class="text">
                    {!! $about->description !!}
                   </p>

                   {{-- <div class="sec-content ">
                       <h2 class="sec-title">Message From Managing Director</h2>

                       <div class="director-details">
                           <p>A successful company is driven by a team of quality professionals having honesty,
                               </p><p style="margin-left:0in; margin-right:0in; text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">A successful organization is driven by a team of quality professionals having honesty, sincerity and dedication to the organization. In Healthcare, we maintain an environment where best people of the industry are working as a team.</span></span><br>
<br>
<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Since inception, Healthcare Pharmaceuticals Limited strictly maintains its quality policy established by a panel of Professional and technical experts from home and abroad. We are thankful to Roche experts for their kind advice and assistance to establish such a wonderful manufacturing facility in Bangladesh.</span></span><br>
<br>
<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">HPL is dedicated and passionate to apply innovative ideas in Marketing and manufacturing by availing most modern technology to provide most anticipated products conforming to the global standard of branded generics.</span></span><br>
<br>
<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Safety is a major consideration; so HPL follows Environment Health and Safety (EHS) policy to maintain a harmonious relation with neighbors, authorities, customers and suppliers. HPL is committed to enhance EHS awareness and continuously motivates employees on EHS culture through training towards all levels.</span></span><br>
<br>
<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">HPL has set principles for product development which provide the best Pharmacokinetic and Pharmacodynamic effects ensuring the utmost efficacy of medicines. HPL is continuously updating and installing advanced technology, in consultation with world renowned experts.</span></span><br>
<br>
<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Wishing all the best to Healthcare family!</span></span></p>
                           <p></p>

                       </div>

                       <div class="director-footer">
                           <div class="chairman-details mr-20">
                               <h4>Alauddin Ahmed</h4>
                               <h5>Chairman</h5>
                           </div>
                       </div>
                   </div> --}}

                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
   </div>
     
   </section>
 </main>

 @endsection
@extends('frontend.app')

@section('title','About | Healthcare Pharmaceuticals')


@section('main')



     <main class="main">
         <!-- Hero Section -->
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

         <!-- About Us Section -->
         <section class="product-wrapper pt-50">
           <div class="container">
             <div class="row g-3">
               <!-- Sidebar -->
               <div class="col-md-3">
                 <div class="widget category">
                   <h4 class="widget-title">About Us</h4>
                   <nav class="nav nav-pills flex-column">
                     @foreach($links as $link)
                       <a
                          href="{{ $link['url'] }}"
                          class="nav-link nav-link-custom-tab {{ request()->is($link['active']) ? 'active' : '' }}">
                         <i class="far fa-angle-double-right"></i> {{ $link['title'] }}
                       </a>
                     @endforeach
                   </nav>
                 </div>
               </div>

               <!-- Main Content -->
               <div class="col-md-9">
                 <div class="row justify-content-center">
                   <!-- Profile Cards -->
                   @foreach(\App\LifeMember::all() as $profile)
                   <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".{{ $loop->iteration }}5s">
                     <div class="card_director card_director-column">
                       <div class="img-profile">
                         <img src="{{asset('/') }}uploads/life/{{ $profile->image }}" alt="{{ $profile['name'] }}">
                       </div>
                       <div class="infos">
                         <div class="name">
                           <h2>{{ $profile['Name'] }}</h2>
                           <h4>{{ $profile['Batch'] }}</h4>
                         </div>
                         <p class="text">
                           {{ $profile['Address'] }}
                         </p>
                         <div class="links">
                           <a href="{{ route('life.details', $profile->slug) }}"><button class="view">View profile</button></a>
                         </div>
                       </div>
                     </div>
                   </div>
                   @endforeach
                 </div>
               </div>
             </div>
           </div>
         </section>
     </main>





 <style type="text/css">

 </style>

  <!-- tabbing -->
  <script type="text/javascript">
    document.querySelectorAll('#myTab a').forEach(function(everyitem) {
      var tabTrigger = new bootstrap.Tab(everyitem);

      everyitem.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default behavior for links
        tabTrigger.show();  // Show the tab content
      });
    });
  </script>

  <script type="text/javascript">
    // Get the elements
      var elements = document.querySelectorAll('.content');
      console.log("elements --- ", elements);
      // Function to check for fade effect on scroll and resize
      function checkForFade() {
      var windowHeight = window.innerHeight;
      elements.forEach(function (element) {
          var elementHeight = element.offsetHeight;
          var elementOffset = element.getBoundingClientRect().top;
          var space = windowHeight - (elementHeight + elementOffset - window.pageYOffset);

          if (space < 150) {
          element.classList.add('non-focus');
          } else {
          element.classList.remove('non-focus');
          }
      });
      }

      // Add event listeners for scroll and resize and call the checkForFade function
      window.addEventListener('scroll', checkForFade);
      window.addEventListener('resize', checkForFade);

      // Trigger the scroll event on initial load
      window.dispatchEvent(new Event('scroll'));
  </script>
  @endsection

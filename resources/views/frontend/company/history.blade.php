@extends('frontend.app')

@section('title','About | Healthcare Pharmaceuticals')

@section('main')

<main class="main">
    <div class="hero-section">
       <div class="hero-slider owl-carousel owl-theme">
         <div class="hero-single" style="background: url({{ asset('assets/img/slider/4.jpg') }}); max-height: 180px;">
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
         <div class="col-md-9 tab-content">
             <div class="timeline">
               <section class="timeline">
                   <ul>
                     @foreach($activity as $entry)
                     <li>
                       <div class="content">
                           <div class="timeline-content-info">
                               <span class="timeline-content-info-date">
                                   {{ $entry['title'] }}
                               </span>
                           </div>
                           <p>{{ $entry['short'] }}</p>
                       </div>
                     </li>
                     @endforeach
                   </ul>
                 </section>
             </div>
         </div>
       </div>
   </div>
   </section>
 </main>




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
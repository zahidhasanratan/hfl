    <!doctype html>
    <html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="description" content=" ">
        <meta name="keywords" content=" ">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('front') }}/assets/images/logo/favicon.png" />
        <!-- CSS here -->
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/all.min.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/animate.min.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/custom-animate.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/font-awesome-pro.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/flaticon_itco.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/jquery.magnific-popup.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/nice-select.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/preloader.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/nouislider.min.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/nouislider.pips.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/odometer.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/swiper.min.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/owl-carousel.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/progressBar.min.css" />
        <!-- Animation -->
        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css" />
        <!-- Gallery -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css"/>
        <link rel="stylesheet" href="{{asset('front') }}/styles.css" />
        <link rel="stylesheet" href="{{asset('front') }}/assets/css/responsive.css" />
    </head>
    <body class="body-dark-bg">

    <section>
        <div id="" class=" all-body">
            <!--Start Main Header One -->
            <header class="main-header main-header-one">
                <div class="menu-area">
                    <div class="main-header-one__outer">
                        <div class="main-header-one__right">
                            <div class="container">
                                <div class="menu-area__inner">
                                    <div class="mobile-nav-toggler align-items-center">
                                        <div class="site-ligo">
                                            <a href='{{ asset('') }}'>
                                                <img src="{{asset('front') }}/assets/images/logo/logo.png" alt="site-logo" />
                                            </a>
                                        </div>
                                        <i class="fas fa-bars"></i>
                                    </div>
                                    <div class="menu-wrap">
                                        <nav class="menu-nav">
                                            <div class="main-header-one__inner">
                                                <div class="main-header-one__bottom">
                                                    <div class="main-header-one__bottom-left d-flex">
                                                        <div class="site-ligo d-flex align-items-center">
                                                            <a href='{{ asset('/') }}'>
                                                                <img src="{{asset('front') }}/assets/images/logo/logo.png" alt="site-logo" />
                                                            </a>
                                                        </div>
                                                        <div class="navbar-wrap main-menu">
                                                            <div class="nav-top">
                                                                
                                                                <ul class="nav-top-section">
                                                                   
                                                                   <div id="google_translate_element"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en', // Set your website's default language here
            includedLanguages: 'en,es,fr,de,it,ja,zh-CN', // List of languages you want to support
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


                                                                    <li>
    <a href="javascript:void(0);" onclick="document.getElementById('google_translate_element').style.display = 'block';">
        Language 
        <span class="glob-pad">
            <img src="{{ asset('front/assets/images/global-operation/global.png') }}">
        </span>
    </a>
</li>

                                         
                                                                    
                                                                </ul>
                                                                <style>
                                                                    #google_translate_element {
    display: none; /* Initially hide the Google Translate widget */
}

                                                                </style>
                                                            </div>
                                                            <ul class="navigation">
                                                                <li>
                                                                    <a href='{{ asset('/') }}'>Home</a>
                                                                </li>

                                                                @foreach($main as $main_menu)
                                                                    <?php
                                                                    $submenus = App\Menu::where('root_id',$main_menu->id)->orderBy('sequence','ASC')
                                                                        ->where('sroot_id',NULL);
                                                                    if($submenus->count() > 0){
                                                                        $class='class="menu-item-has-children"';
                                                                        $class1='class="has dropdown-toggle"';
                                                                    }
                                                                    else{
                                                                        $class='';
                                                                        $class1='';

                                                                    }

                                                                    ?>
                                                                <li <?php echo $class;?>>
                                                                    <a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif">{{$main_menu->menu_name}}</a>
                                                                    @if($submenus->count() > 0)
                                                                    <ul class="sub-menu">
                                                                        @foreach($submenus->get() as $smenus)
                                                                            <?php $thirdmenus = App\Menu::where('sroot_id',$smenus->id)
                                                                                ->where('troot_id',NULL);?>
                                                                        <li>
                                                                            <a href="@if($smenus->page_type =='url') {{$smenus->external_link}} @else {{route('page.details',$smenus->slug)}} @endif">{{ $smenus->menu_name }}</a>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                        @endif

                                                                </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <!-- Mobile Menu  -->
                                <div class="mobile-menu">
                                    <nav class="menu-box">
                                        <div class="close-btn">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="nav-logo">
                                            <a href='{{ asset('') }}'>
                                                <img src="{{asset('front') }}/assets/images/logo/logo.png" alt="Logo" />
                                            </a>
                                        </div>
                                        <div class="menu-outer">
                                            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                        </div>

                                    </nav>
                                </div>
                                <div class="menu-backdrop"></div>
                                <!-- End Mobile Menu -->
                            </div>
                        </div>
                    </div>
            </header>

            @yield('main')

            <!-- footer start -->
            <footer class="footer-sec wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="section-overlay">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <div class="menu-footer menu-footer-top">
                                    <style>
                                        .menu-footer-top{
                                            font-size:18px;
                                        }
                                    </style>
                                    <ul>
                                        <li>
                                            <a href="{{ asset('/') }}">Home</a>
                                        </li>

                                        @foreach($footer as $main_menu)
                                            <?php
                                            $submenus = App\Menu::where('root_id',$main_menu->id)->orderBy('sequence','ASC')
                                                ->where('sroot_id',NULL);
                                            if($submenus->count() > 0){
                                                $class='<i class="fa fa-chevron-down" aria-hidden="true"></i>';
                                                $class1='class="has dropdown-toggle"';
                                            }
                                            else{
                                                $class='';
                                                $class1='';

                                            }

                                            ?>
                                        <li>
                                            <a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif"> | {{$main_menu->menu_name}}</a>
                                        </li>
                                        @endforeach


                                    </ul>
                                </div>
                                 <div class="menu-footer">
                                    <ul>
                                      @foreach(\App\Menu::where('footer2', 1)->get() as $main_menu)
                                        <li>
                                            <a href="@if($main_menu->page_type == 'url') {{ $main_menu->external_link }} @else {{ route('page.details', $main_menu->slug) }} @endif">
                                                @if(!$loop->first) | @endif {{ $main_menu->menu_name }}
                                            </a>
                                        </li>
                                    @endforeach

                                    </ul>
                                  </div>
                                <div class="footer-social-icon d-flex">
                                    @php
                                        $social = \App\Objects::where('id', 2)->first();
                                    @endphp
                                    <a href="{{ $social->short }}" target="_blank">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a href="{{ $social->description }}" target="_blank">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                    <a href="{{ $social->slug }}" target="_blank">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                    <a href="{{ $social->instagram }}" target="_blank">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <a href="{{ $social->whatsapp }}" target="_blank">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center sec-padding-footer">
                            <div class="col-md-8">
                                <div class="footer-bg">
                                    <img src="{{asset('front') }}/assets/images/background/footer-bg.png">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @php
                                $contact = \App\Others::find(2);
                            @endphp
                            <div class="col-sm-6 col-md-3 col-xl-3">
                                <div class="footer-widget">
                                    <div class="footer-widget-content">
                                        <div class="hpl-addresss">
                                            <ul>
                                                <li>
                                                    <span> Head office</span>
                                                </li>
                                                {!!  $contact->slug  !!}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-xl-3">
                                <div class="footer-widget">
                                    <div class="hpl-addresss">
                                        <ul>
                                            <li>
                                                <span> Plant</span>
                                            </li>
                                            {!!  $contact->description  !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-xl-3">
                                <div class="footer-widget pages-links">
                                    <div class="hpl-addresss">
                                        <ul>
                                            <li>
                                                <span> International Business Department</span>
                                            </li>
                                            {!!  $contact->phone  !!}
                                            <li class="live-chat-w">
                                                <a target="_blank" href="https://wa.me/{!!  $contact->whtasapp  !!}">
                            <i class="fas fa-comments"></i> &nbsp; LIVE CHAT </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-xl-3">
                                <div class="footer-widget">
                                    <div class="hpl-addresss">
                                        <ul>
                                            <li>
                          <span> U.S. Contact <span>
                                            </li>
                                            {!!  $contact->Us  !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        ul p{
                            font-size: 14px;
                        }
                    </style>
                    <div class="container">
                        <div class="row footer-copyright">
                            <div class="col-md-6">
                                <div class="footer-copyright-text text-center">
                                    <p class="mb-0">©2024. Healthcare Pharmaceuticals Limited. All rights reserved.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-copyright-text text-center">
                                    <p class="mb-0">
                                        <a href="https://www.esoft.com.bd/" target="_blank"> Web Design Company :</a>
                                        <span style="font-family:cursive">e- <span style="color:red">S</span>oft </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <!-- Whatsapp -->
    <!--<div class="whats-app">-->
    <!--    <a target="_blank" href="https://wa.me/{!!  $contact->whtasapp  !!}">-->
    <!--        <img width="55px" src="{{asset('front') }}/assets/images/background/whatsapp.png">-->
    <!--    </a>-->
    <!--</div>-->
    
    <!--<div class="search-box">-->
    <!--  <button class="btn-search"><i class="fas fa-search"></i></button>-->
    <!--  <input type="text" class="input-search" placeholder="Search Pro">-->
    <!--</div>-->

    <!-- JS here -->
    <script src="{{asset('front') }}/assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('front') }}/assets/js/ajax-form.js"></script>
    <script src="{{asset('front') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('front') }}/assets/js/jquery.appear.js"></script>
    <script src="{{asset('front') }}/assets/js/jquery.circleType.js"></script>
    <script src="{{asset('front') }}/assets/js/jquery.lettering.min.js"></script>
    <script src="{{asset('front') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('front') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('front') }}/assets/js/jquery.odometer.min.js"></script>
    <script src="{{asset('front') }}/assets/js/jquery-sidebar-content.js"></script>
    <script src="{{asset('front') }}/assets/js/nouislider.min.js"></script>
    <script src="{{asset('front') }}/assets/js/owl-carousel.js"></script>
    <script src="{{asset('front') }}/assets/js/countfect.min.js"></script>
    <script src="{{asset('front') }}/assets/js/wow.min.js"></script>
    <script src="{{asset('front') }}/assets/js/noframework.waypoints.min.js"></script>
    <script src="{{asset('front') }}/assets/js/progressBar.min.js"></script>
    <!-- Animation -->
    <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
    <script src="{{asset('front') }}/assets/js/scroll.js"></script>
    <script src="{{asset('front') }}/assets/js/main.js"></script>


    <!-- Gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script type="text/javascript">
        baguetteBox.run('.grid-gallery', {
            animation: 'slideIn'
        });
    </script>

    <script type="text/javascript">
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

    </script>

    <script type="text/javascript">
        /* Demo purposes only */
        $(".hover").mouseleave(
            function () {
                $(this).removeClass("hover");
            }
        );
    </script>



    <!-- Scroll smooth up to bottom -->

    <!-- ref : https://stackoverflow.com/questions/47011055/smooth-vertical-scrolling-on-mouse-wheel-in-vanilla-javascript -->

    <!-- <script type="text/javascript">
      function init() {
        new SmoothScroll(document, 120, 12);
      }

      function SmoothScroll(target, speed, smooth) {
        if (target === document)
          target = (document.scrollingElement
                    || document.documentElement
                    || document.body.parentNode
                    || document.body); // cross browser support for document scrolling

        var moving = false;
        var pos = target.scrollTop;
        var frame = target === document.body
                    && document.documentElement
                    ? document.documentElement
                    : target; // safari is the new IE

        target.addEventListener('mousewheel', scrolled, { passive: false });
        target.addEventListener('DOMMouseScroll', scrolled, { passive: false });

        function scrolled(e) {
          e.preventDefault(); // disable default scrolling

          var delta = normalizeWheelDelta(e);

          pos += -delta * speed;
          pos = Math.max(0, Math.min(pos, target.scrollHeight - frame.clientHeight)); // limit scrolling

          if (!moving) update();
        }

        function normalizeWheelDelta(e) {
          if (e.detail) {
            if (e.wheelDelta)
              return e.wheelDelta / e.detail / 40 * (e.detail > 0 ? 1 : -1); // Opera
            else
              return -e.detail / 3; // Firefox
          } else {
            return e.wheelDelta / 120; // IE, Safari, Chrome
          }
        }

        function update() {
          moving = true;

          var delta = (pos - target.scrollTop) / smooth;

          target.scrollTop += delta;

          if (Math.abs(delta) > 0.5) {
            requestFrame(update);
          } else {
            moving = false;
            target.scrollTop = pos; // Ensure final position is set correctly
          }
        }

        var requestFrame = (function() { // requestAnimationFrame cross browser
          return (
            window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimationFrame ||
            function(func) {
              window.setTimeout(func, 1000 / 50);
            }
          );
        })();
      }

      window.onload = init;
    </script> -->


    <script type="text/javascript">
        AOS.init({
            duration: 400, // duration of the animation in ms
            once: true // whether animation should happen only once - while scrolling down
        });
    </script>



<style>
    .suggestions-dropdown {
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        width: 578px;
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
    }

    .suggestion-item {
        background-color: #f7f6fd;
        display: flex;
        align-items: center;
        padding: 10px;
        cursor: pointer;
    }

    .suggestion-item img {
        margin-right: 10px;
    }

    .suggestion-info {
        display: flex;
        flex-direction: column;
    }

    .suggestion-title {
        font-weight: bold;
    }

    .suggestion-subtitle {
        color: gray;
        font-size: 12px;
    }
    .suggestion-title {
        /* font-weight: bold; */
        font-size: 13px;
        color: #222;
        line-height: 20px;
        margin: 0px;
        text-align: left;
    }

    p.suggestion-subtitle {
        font-size: 12px;
        line-height: 18px;
        color: #877777;
        margin: 0px;
        text-align: left;
    }
    h4.suggestion-therepeutic {
        font-size: 11px;
        line-height: 18px;
        color: #877777;
        margin: 0px;
        text-align: left;
    }

</style>


    <!-- see more -->
    <script type="text/javascript">
        $('.moreless-button').click(function() {
            $('.moretext').slideToggle();
            if ($('.moreless-button').text() == "see more") {
                $(this).text("see less")
            } else {
                $(this).text("see more")
            }
        });


        $('.moreless-button-director').click(function() {
            $('.moretext-director').slideToggle();
            if ($('.moreless-button-director').text() == "see more") {
                $(this).text("see less")
            } else {
                $(this).text("see more")
            }
        });



        $('.moreless-button-dmd').click(function() {
            $('.moretext-dmd').slideToggle();
            if ($('.moreless-button-dmd').text() == "see more") {
                $(this).text("see less")
            } else {
                $(this).text("see more")
            }
        });



    </script>
    
    <script type="text/javascript">
    const draggableSection = document.querySelector('.draggable-section');
      const draggableContent = document.querySelector('.draggable-content');

      let isDragging = false;
      let startPos = 0;
      let currentTranslate = 0;
      let prevTranslate = 0;

      draggableSection.addEventListener('mousedown', (e) => {
        isDragging = true;
        startPos = e.pageX - draggableContent.offsetLeft;
        draggableSection.style.cursor = 'grabbing';
        draggableSection.addEventListener('mousemove', mouseMove);
      });

      document.addEventListener('mouseup', () => {
        isDragging = false;
        prevTranslate = currentTranslate;
        draggableSection.style.cursor = 'grab';
        draggableSection.removeEventListener('mousemove', mouseMove);
      });

      function mouseMove(e) {
        if (!isDragging) return;
        const currentPosition = e.pageX - draggableSection.offsetLeft;
        currentTranslate = prevTranslate + (currentPosition - startPos);
        
        // Limit the scrolling area
        const maxTranslate = draggableSection.offsetWidth - draggableContent.scrollWidth;
        if (currentTranslate > 0) currentTranslate = 0;
        if (currentTranslate < maxTranslate) currentTranslate = maxTranslate;

        draggableContent.style.transform = `translateX(${currentTranslate}px)`;
      }

  </script>
  
      <script type="text/javascript">
      // Initialize WOW.js with mobile support enabled
        new WOW({
          mobile: true,         // Enable animations on mobile
          offset: 0,            // Adjust if you want the animation to trigger sooner or later
          live: true,           // Check for new elements on the page to animate if they load dynamically
        }).init();

    </script>
  
  
    </body>
    </html>

<header class="header">
    <div class="header-top">
      <div class="container">
        <div class="header-top-wrap">
          <div class="header-top-left">
            <div class="header-top-social">
              <span>Follow Us:</span>
              @php
                $social = \App\Objects::where('id', 2)->first();
              @endphp
              <a href="{{ $social->short }}">
                <i class="fab fa-facebook-f"></i>
              </a>
               <a href="{{ $social->whatsapp }}">
               <i class="fab fa-whatsapp"></i>
              </a>
              <a href="{{ $social->short }}">
              <i class="fab fa-youtube"></i>
              </a>
              <a href="{{ $social->short }}">
                <i class="fab fa-x-twitter"></i>
              </a>
              <a href="{{ $social->instagram }}">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="{{ $social->description }}">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
          
          
          <div class="header-top-right">
            <div class="header-top-contact">
                <ul>
                   
                    @foreach($top_header as $footer_menu)
                            <li class="header-top-contact-info"><a href="@if($footer_menu->page_type =='url') {{$footer_menu->external_link}} @else {{route('page.details',$footer_menu->slug)}} @endif">{{$footer_menu->menu_name}}</a></li>
                        @endforeach
                        
                      <li class="header-top-contact-info">
                <div class="header-top-contact-info">
                    <a href="#">Language</a>
                    <!-- Submenu -->
                    <ul class="submenu">
                        <li><a href="#">English</a></li>
                        <li><a href="#">French</a></li>
                        <li><a href="#">Spanish</a></li>
                    </ul>
                </div>
            </li>
                    
                </ul>
                
             
            </div>
          </div>
          
          
          
        </div>
      </div>
    </div>
    
    
    <style>
        .header-top-contact ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.header-top-contact-info {
    position: relative;
}

.header-top-contact-info .submenu {
    display: none; /* Hide submenu by default */
    position: absolute;
    left: 0;
    top: 100%;
    background: #fff;
    border: 1px solid #ccc;
    padding: 0;
    z-index: 10;
}

.header-top-contact-info:hover .submenu {
    display: block; /* Show submenu on hover */
}

.header-top-contact-info .submenu li {
    padding: 5px 10px;
}

.header-top-contact-info .submenu li a {
    color: #333;
    text-decoration: none;
}

.header-top-contact-info .submenu li a:hover {
    color: #007bff;
}

    </style>

    <div class="main-navigation">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <div class="container position-relative">
            <a class="navbar-brand" href="{{ asset('/') }}">
              <img src="{{asset('front') }}/assets/img/logo/logo.png" alt="logo">
            </a>
            <div class="mobile-menu-right">
              <div class="mobile-menu-btn">
                <a href="#" class="nav-right-link search-box-outer">
                  <i class="far fa-search"></i>
                </a>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <a href="index.html" class="offcanvas-brand" id="offcanvasNavbarLabel">
                  <img src="{{asset('front') }}/assets/img/logo/logo.png" alt>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">

                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ asset('/') }}">Home</a>
                    </li>
                    @foreach ($main as $main_menu)
                        <?php
                        $submenus = App\Menu::where('root_id', $main_menu->id)
                            ->whereNull('sroot_id')
                            ->orderBy('sequence', 'ASC')
                            ->get();
                        ?>
                        <li class="nav-item @if ($submenus->isNotEmpty()) dropdown @endif">
                            <a class="nav-link @if ($submenus->isNotEmpty()) dropdown-toggle @endif" 
                               href="@if ($main_menu->page_type == 'url') {{ $main_menu->external_link }} @else {{ route('page.details', $main_menu->slug) }} @endif" 
                               @if ($submenus->isNotEmpty()) data-bs-toggle="dropdown" @endif>
                                {{ $main_menu->menu_name }}
                            </a>
                            @if ($submenus->isNotEmpty())
                                <ul class="dropdown-menu fade-down">
                                    @foreach ($submenus as $submenu)
                                        <?php
                                        $thirdmenus = App\Menu::where('sroot_id', $submenu->id)
                                            ->whereNull('troot_id')
                                            ->get();
                                        ?>
                                        <li class="{{ $thirdmenus->isNotEmpty() ? 'dropdown-submenu' : '' }}">
                                            <a class="dropdown-item {{ $thirdmenus->isNotEmpty() ? 'dropdown-toggle' : '' }}" 
                                               href="@if ($submenu->page_type == 'url') {{ $submenu->external_link }} @else {{ route('page.details', $submenu->slug) }} @endif">
                                                {{ $submenu->menu_name }}
                                            </a>
                                            @if ($thirdmenus->isNotEmpty())
                                                <ul class="dropdown-menu">
                                                    @foreach ($thirdmenus as $thirdmenu)
                                                        <?php
                                                        $fourthmenus = App\Menu::where('troot_id', $thirdmenu->id)->get();
                                                        ?>
                                                        <li class="{{ $fourthmenus->isNotEmpty() ? 'dropdown-submenu' : '' }}">
                                                            <a class="dropdown-item {{ $fourthmenus->isNotEmpty() ? 'dropdown-toggle' : '' }}" 
                                                               href="@if ($thirdmenu->page_type == 'url') {{ $thirdmenu->external_link }} @else {{ route('page.details', $thirdmenu->slug) }} @endif">
                                                                {{ $thirdmenu->menu_name }}
                                                            </a>
                                                            @if ($fourthmenus->isNotEmpty())
                                                                <ul class="dropdown-menu">
                                                                    @foreach ($fourthmenus as $fourthmenu)
                                                                        <li>
                                                                            <a class="dropdown-item" 
                                                                               href="@if ($fourthmenu->page_type == 'url') {{ $fourthmenu->external_link }} @else {{ route('page.details', $fourthmenu->slug) }} @endif">
                                                                                {{ $fourthmenu->menu_name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
                
                

                {{-- <ul class="navbar-nav justify-content-end flex-grow-1">
                  <li class="nav-item dropdown">
                    <a class="nav-link active" href="index.html">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">About Us</a>
                    <ul class="dropdown-menu fade-down">


                      <li>
                        <a class="dropdown-item" href="mission-Vision.html">Mission, Vision & Values</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="history.html">History</a>
                      </li>

                      
                    </ul>
                  </li>
                   

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Products</a>
                    <ul class="dropdown-menu fade-down">

                      <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Animal Health</a>
                        <ul class="dropdown-menu">
                          

                          <li>
                            <a class="dropdown-item" href="product-trade-name.html">Cattle</a>
                          </li>


                          <li>
                            <a class="dropdown-item" href="product-trade-name.html">Poultry</a>
                          </li>

                         
                        </ul>
                      </li>

                      
                    </ul>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link" href="facilities.html">Facilities</a>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">News & Events</a>
                    <ul class="dropdown-menu fade-down">

                      <li>
                        <a class="dropdown-item" href="news.html">News</a>
                      </li>
                     
                       
                    </ul>
                  </li>
                </ul> --}}


                <div class="nav-right">
                  <div class="nav-btn">
                     <div class="logo-container">
                      <a target="_blank" href="https://www.hplbd.com/#" class="offcanvas-brand" id="offcanvasNavbarLabel">
                        <img width="50" src="{{asset('front') }}/assets/img/logo/hpl.png" alt="Logo" class="logo">
                      </a>
                      <span class="hover-text">Click Here</span>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
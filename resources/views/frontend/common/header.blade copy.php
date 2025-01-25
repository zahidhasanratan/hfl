<header id="site-header">
    <div id="site-header-inner" class="wprt-container">
        <div class="wrap-inner">
            <div id="site-logo" class="clearfix">
                <div id="site-logo-inner">
                    <a href="{{asset('/')}}" title="CarBest" rel="home" class="main-logo">
                        <img class="logo-header" src="{{asset('front/assets/img/logo.png') }}"></a>
                    <h3 class="logo-title">PRISM  Bangladesh Foundation</h3>
                </div>
            </div><!-- #site-logo -->

            <div class="mobile-button"><span></span></div><!-- //mobile menu button -->

            <div id="header-search">
                <a class="header-search-icon" href="#"><span class="search-icon rt-icon-search2"></span></a>
                <form role="search" method="get" class="header-search-form" action="#">
                    <label class="screen-reader-text">Search for:</label>
                    <input type="text" value="" name="s" class="header-search-field" placeholder="Type and hit enter...">
                    <button type="submit" class="header-search-submit" title="Search">Search</button>
                </form>
            </div><!-- /#header-search -->
        </div>
    </div><!-- /#site-header-inner -->

    <div class="site-navigation-wrap">
        <div class="wprt-container inner">
            <nav id="main-nav" class="main-nav">
                <ul id="menu-primary-menu" class="menu">



                    <li class="menu-item current-menu-item active"><a href="{{asset('/')}}">Home</a></li>
                    @foreach(\App\Menu::orderBy('sequence', 'asc')->get() as $main_menu)

                    <?php
                        $submenus = App\Menu::where('root_id',$main_menu->id)
                            ->where('sroot_id',NULL);
                        if($submenus->count() > 0){
                            $class='menu-item-has-children';
                        }
                        else{
                            $class='';

                        }

                        ?>
                    <li class="menu-item <?php echo $class;?>"><a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif">{{$main_menu->menu_name}}</a>
                        @if($submenus->count() > 0)
                        <ul class="sub-menu">
                            @foreach($submenus->get() as $smenus)
                                <?php $thirdmenus = App\Menu::where('sroot_id',$smenus->id)
                                    ->where('troot_id',NULL);?>
                            <li class="menu-item"><a  href="@if($smenus->page_type =='url') {{$smenus->external_link}} @else {{route('page.details',$smenus->slug)}} @endif"> {{ $smenus->menu_name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </nav><!-- /#main-nav -->

            <ul class="nav-extend active">
                <li class="ext c">
                    <a class="cart-info" href="#" title="View your shopping cart">6 items <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">$</span>260.00</span></a>
                </li>
            </ul><!-- /.nav-extend -->

        </div>
    </div><!-- /.site-navigation-wrap -->
</header>

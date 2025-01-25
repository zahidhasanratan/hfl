<!-- Footer -->
<footer id="footer">
    <div id="footer-widgets" class="wprt-container title-style-1">
        <div class="wprt-row gutter-30">
            <div class="span_1_of_3 col">
                <div class="widget widget_information">
                    <h2 class="widget-title"><span>Social  LINKS</span></h2>
                </div>



                <div class="widget widget_socials">
                    <div class="socials clearfix">
                        <div class="icon"><a class="active" target="_blank" href="#" ><i class="rt-icon-facebook"></i></a></div>
                        <div class="icon"><a target="_blank" href="#" ><i class="rt-icon-twitter"></i></a></div>
                        <div class="icon"><a target="_blank" href="#" ><i class="rt-icon-instagram"></i></a></div>
                    </div>
                </div>
            </div>

            <div class="span_1_of_3 col">
                <div class="widget widget_links">
                    <h2 class="widget-title"><span>Quick  LINKS</span></h2>

                    <ul class="wprt-links clearfix col2">
                        @foreach($footer as $footer_menu)
                            <li class="style-2"><a href="@if($footer_menu->page_type =='url') {{$footer_menu->external_link}} @else {{route('page.details',$footer_menu->slug)}} @endif">{{$footer_menu->menu_name}}</a></li>
                        @endforeach

                    </ul>
                </div><!-- /.widget_links -->
            </div><!-- /.span_1_of_4 -->


            <div class="span_1_of_3 col">
                <div class="widget widget_information">
                    <h2 class="widget-title"><span>CONTACT INFO</span></h2>


                    @foreach($contact1 as $contact1)
                    <ul>
                        <li class="address clearfix">
                            <div class="inner">
                                <span class="hl">Address:</span>
                                <span class="text">{{$contact1->slug}}</span>
                            </div>
                        </li>
                        <li class="phone clearfix">
                            <div class="inner">
                                <span class="hl">Phone:</span>
                                <span class="text">{{$contact1->phone}}</span>
                            </div>
                        </li>
                        <li class="email clearfix">
                            <div class="inner">
                                <span class="hl">E-mail:</span>
                                <span class="text"> {{$contact1->description}}</span>
                            </div>
                        </li>

                    </ul>
                     @endforeach
                </div><!-- /.widget_information -->
            </div><!-- /.span_1_of_4 -->
        </div><!-- /.wprt-row -->
    </div><!-- /#footer-widgets -->
</footer><!-- /#footer -->


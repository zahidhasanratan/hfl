<footer class="footer-area">
    <div class="footer-widget">
      <div class="container">
        <div class="row footer-widget-wrapper pt-100 pb-30">
          <div class="col-md-5 col-lg-6">

            <div class="footer-widget-box about-us">
                 <h4 class="footer-widget-title">Corporate Office</h4>

                  <ul class="footer-contact">

                    <li>
                      <i class="far fa-map-marker-alt"></i>
                     {!! $contact1->slug !!}
                    </li>
                    {{-- <li>
                      <a href="tel:+21236547898">
                        <i class="far fa-phone"></i>+880 18888 19000 </a>
                    </li>
                    <li>
                      <a href="">
                        <i class="far fa-envelope"></i>info@hfl.com.bd

                      </a>
                    </li> --}}
                  </ul>

            </div>

            <div class="footer-widget-box about-us">
                 <h4 class="footer-widget-title">Plant Office</h4>

                  <ul class="footer-contact">
                    <li>
                      <i class="far fa-map-marker-alt"></i>
                      {!! $contact1->description !!}
                    </li>
                    {{-- <li>
                      <a href="tel:++8801888819001">
                        <i class="far fa-phone"></i>+88 01844 245018 </a>
                    </li> --}}
                  </ul>

            </div>
          </div>
          <div class="col-lg-2 offset-md-1 offset-lg-1">
            <div class="footer-widget-box list">
              <h4 class="footer-widget-title">Quick Links</h4>
              <ul class="footer-list">

                @foreach($footer as $footer_menu)
                <li>
                    <a href="@if($footer_menu->page_type == 'url') {{$footer_menu->external_link}} @else {{route('page.details', $footer_menu->slug)}} @endif">
                        <i class="fas fa-dot-circle"></i> {{$footer_menu->menu_name}}
                    </a>
                </li>
                @endforeach

              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-widget-box list">
              <h4 class="footer-widget-title">Our Facilities</h4>
              <ul class="footer-list">


                  @foreach(\App\Facility::all() as $key => $facility)
                <li>
                    <a href="{{ route('facility.details', $facility->slug) }}">
                        <i class="fas fa-dot-circle"></i> {{$facility->title}}
                    </a>
                </li>
                @endforeach





              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-6 align-self-center">
            <p class="copyright-text"> &copy; Copyright <span id="date"></span>
              <a href="#"> Healthcare Formulations Ltd. </a> All Rights Reserved.
            </p>
          </div>
          <div class="col-md-6 align-self-center">
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

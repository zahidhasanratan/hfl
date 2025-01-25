@extends('frontend.app')

@section('title')
    Contact Us | Healthcare Pharmaceuticals
@endsection


@section('main')

<div class="hero-section">
    <div class="hero-slider owl-carousel owl-theme">
        @php
            $lastSlug = basename(url()->current());
        @endphp
        @php
            $banner = \App\Menu::where('slug', $lastSlug)->first()->image ;
        @endphp
        @if($banner =='')
            <div class="hero-single" style="background: url({{ asset('front/assets/img/slider/4.jpg') }}); max-height: 180px;">
            </div>
        @else
            <div class="hero-single" style="background: url({{ asset('uploads/menu') }}/{{ $banner }}); max-height: 180px;">
            </div>
        @endif


    </div>



  <!-- Career Area -->
  <div class="contact-area py-80">
    <div class="container">
      <div class="contact-wrap">
        <div class="row">
          <div class="col-lg-6">
            <div class="contact-content">
               <h2 class="locaton-title">Head office:</h2>

               <div class="all-contact">


                {!!$contact1->slug!!}

                {{-- <div class="contact-info">
                    <div class="contact-info-icon">
                      <i class="fal fa-location-dot">

                      </i>

                    </div> --}}
                    {{-- <div class="contact-info-content">
                      <p>Nasir Trade Centre (Level-7, 8 & 13), Dhaka-1205, Bangladesh.</p>
                    </div> --}}

                  {{-- </div> --}}
                  {{-- <div class="contact-info">
                    <div class="contact-info-icon">
                      <i class="fal fa-phone-volume"></i>
                    </div>
                    <div class="contact-info-content">
                      <p>+880 18888 19000</p>
                    </div>
                  </div>
                  <div class="contact-info">
                    <div class="contact-info-icon">
                      <i class="fal fa-envelope"></i>
                    </div>
                    <div class="contact-info-content">
                      <p>
                        <a>info@hfl.com.bd</a>
                      </p>
                    </div>
                  </div> --}}
               </div>

               <div class="contact-form-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.0287268095535!2d90.38980677439146!3d23.74635498893339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8bdbf570f8b%3A0x19f5656d1d95e168!2sHealthcare%20Pharmaceuticals%20Limited!5e0!3m2!1sen!2sbd!4v1732786413462!5m2!1sen!2sbd" width="100%" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>



            </div>
          </div>

          <div class="col-lg-6">
            <div class="contact-content">
               <h2 class="locaton-title">Plant Office:</h2>
               <div class="all-contact">
                {!!$contact1->description!!}
                {{-- <div class="contact-info">
                    <div class="contact-info-icon">
                      <i class="fal fa-location-dot"></i>
                    </div>
                    <div class="contact-info-content">
                      <p>Beraiderchala, Sreepur, Gazipur-1740, Bangladesh.</p>
                    </div>
                  </div>
                  <div class="contact-info">
                    <div class="contact-info-icon">
                      <i class="fal fa-phone-volume"></i>
                    </div>
                    <div class="contact-info-content">
                      <p>+88 01844 245018</p>
                    </div>
                  </div>
                  <div class="contact-info">
                    <div class="contact-info-icon">
                      <i class="fal fa-envelope"></i>
                    </div>
                    <div class="contact-info-content">
                      <p>
                        <a>info@hfl.com.bd</a>
                      </p>
                    </div>
                  </div>
               </div> --}}

               <div class="contact-form-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41171.1598256031!2d90.38543513993424!3d24.205000782571823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3756776f57f6f6f1%3A0x782bae23a29c8ca8!2z4Ka54KeH4Kay4Kal4KaV4KeH4Kav4Ka84Ka-4KawIOCmq-CmsOCmruCngeCmsuCnh-CmtuCmqOCmuCDgpo_gprLgpp_gpr_gpqHgpr8uICjgprbgp43gprDgp4Dgpqrgp4HgprAg4Kaq4KeN4Kay4KeN4Kav4Ka-4Kao4KeN4KafKQ!5e0!3m2!1sbn!2sbd!4v1736836089524!5m2!1sbn!2sbd" width="100%" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>



            </div>
          </div>

        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="contact-form">
                <div class="contact-form-header">
                  <h2>Share Your Query</h2>
                  {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut. </p> --}}
                </div>
                {{-- Show success message after form submission --}}
@if (Session::has('success'))
<div class="alert alert-success" style="color: green;">
    {{ Session::get('success') }}
</div>
@endif

{{-- Show reCAPTCHA error --}}
@if ($errors->has('g-recaptcha-response'))
<div class="alert alert-danger" style="color: red;">
    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
</div>
@endif
                <form method="post" action="{{ route('contact.us') }}">
                    @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Your Name" required="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="email" class="form-control" name="phone" placeholder="Phone Number" required="">
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Your Subject" required="">
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <textarea name="message" cols="30" rows="5" class="form-control" placeholder="Write Your Message" required=""></textarea>
                  </div>
                  <button type="submit" class="theme-btn">Send Message <i class="far fa-paper-plane"></i>
                  </button>
                  <div class="col-md-12 mt-3">
                    <div class="form-messege text-success"></div>
                  </div>
                </form>
              </div>
              </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@extends('frontend.app')

@section('title')
    Contact Us | Healthcare Pharmaceuticals
@endsection


@section('main')

 <div class="static-bg">
        <img class="lazy lazyLoaded" data-load-priority="0" src="{{asset('front') }}/assets/images/background/rotate.jpg" alt="">
    </div>
    <!-- global-operation start -->
    <section class="global-operation sec-ptb pt-200">
        <div class="container">
            <!--<div class="row justify-content-center wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">-->
            <!--    <div class="col-md-9">-->
            <!--        <div class="global-header">-->
            <!--            <p>Reach Out for<span> Healthier Futures</span><br>-->
            <!--                Contact <span>Healthcare Pharmaceuticals Limited</span> Today.-->
            <!--            </p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="row justify-content-center align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="contact-icon">
                        <img src="{{asset('front') }}/assets/images/contact/query.png">
                        <h2>Share Your Query</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                <div class="col-md-6 col-lg-3">
                    <div class="contact-form">
                        <!--@if ($errors->any())-->
                        <!--    <div class="alert alert-danger">-->
                        <!--        <ul>-->
                        <!--            @foreach ($errors->all() as $error)-->
                        <!--                <li>{{ $error }}</li>-->
                        <!--            @endforeach-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--@endif-->
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
                        <form id="test-form" method="post" action="{{ route('contact.us') }}">
                            @csrf
                            <input class="form-control form-custom" type="text" name="name" placeholder="Name" required>
                            <input class="form-control form-custom" type="email" name="email" placeholder="E-mail" required>
                            <input class="form-control form-custom" type="text" name="phone" placeholder="Phone Number" required>
                            <input class="form-control form-custom" type="text" name="country" placeholder="Country" required>
                            <!--<input class="form-control form-custom" type="text" name="product_trade_name" placeholder="Product Trade Name" required>-->
                            <!--<input class="form-control form-custom" type="text" name="question" placeholder="Write Question" required>-->
                            <textarea class="form-control form-custom" name="question" placeholder="Write Question" rows="4" cols="50" required></textarea>


                            {{-- <div class="form-group">
                                <label for="captcha">{{ $captchaQuestion }}</label>
                                <input class="form-control form-custom" type="text" name="captcha" placeholder="Answer" required>
                            </div> --}}


                                        {{-- Google reCAPTCHA --}}
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        {{-- {!! NoCaptcha::displaySubmit('my-form-id', 'submit now!', ['data-theme' => 'dark']) !!} --}}

                            <div class="itco-form-btn">
                                <button class="custom-btn btn-3" type="submit"><span>Submit</span></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            
            <style>
                .rc-anchor-normal {
                    width: 262px !important;
                }
                .rc-anchor-normal .rc-anchor-pt {

                    width: 154px !important;
                }
            </style>

            <div class="row justify-content-center wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                <!--<div class="col-md-6">-->
                <!--    <div class="btn-box text-center mt-30">-->
                <!--        <div class="global-header">-->
                <!--            <p>Transform   <span>Your </span>Career,-->
                <!--                Transform   <span>Your </span>Life.-->
                <!--            </p>-->
                <!--        </div>-->
                <!--        <div>-->
                            <!-- <a class="click-btn btn-style500 w-250" href="#">Career</a> -->
                <!--            <a class="read-more-btn w-250" href="{{ asset('Career') }}">-->
                <!--                <span class="txt">Career</span>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="col-md-8">
                    <div class="Quality_Complaints mt-30">
                          <h3>Adverse Events and Product Quality Complaints </h3>
                          <div class="Quality_Complaints_text">
                            <p>Healthcare Pharmaceuticals Limited (HPL) encourages the Healthcare professionals (HCPs) and every individual to report adverse events or safety issues, if any.</p>
                            <p>If you come across any adverse event (AE) or product quality complaint (PQC) with HPL products, please report immediately at <a href="mailto:drugsafety@hpl.com.bd">drugsafety@hpl.com.bd</a> or call at <a href="tel:+8801888818678">+8801888 818678</a> or IPTSP Number: <a href="tel:09610101996">09610101996</a> Extension <strong style="color:#fff">1358</strong></p>
                          </div>
                      </div>
                  </div>


            </div>
        </div>
    </section>
    <!-- global-operation end -->




    <!-- Start: Contact Us -->
    <section class="accreditation mt-30 mb-50">
        <div class="container">
            @php
                $contact = \App\Others::find(2);
            @endphp
            <div class="row justify-content-center align-items-end mt-30">
                <div class="col-md-3 col-xl-3 order-2 order-md-1 justify-content-center text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="add-card">
                        <div class="contact-logo">
                            <img src="{{asset('front') }}/assets/images/contact/distribution.png">
                        </div>
                        <div class="contact-info">
                            <h2>Distribution</h2>
                            {!!  $contact->Distribution  !!}
                        </div>
                    </div>
                </div>


                <div class="col-md-5 col-xl-5 order-1 order-md-2">
                    <div class="add-card">
                        <div class="global-conatat con-custom">
                            <div class="contact-logo">
                                <img src="{{asset('front') }}/assets/images/contact/head-office.png">
                            </div>

                            <div class="conn-info">
                                <h2 style="color: #43e2f1;">Head office</h2>
                                <h5>Central Hub of Care</h5>
                                <div class="con-add">
                                    {!!  $contact->slug  !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-xl-3 order-3 order-md-3 justify-content-center text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="add-card">
                        <div class="contact-logo">
                            <img src="{{asset('front') }}/assets/images/contact/plant.png">
                        </div>
                        <div class="contact-info">
                            <h2>Plant</h2>
                            {!!  $contact->description  !!}
                        </div>
                    </div>
                </div>

                 <div class="col-md-5 col-xl-5 order-1 order-md-4 justify-content-center text-center wow fadeInUp mt-30" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="vision-card con-glo-height wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <div class="vision-icon">
                            <img src="{{asset('front') }}/assets/images/contact/international_business.png">
                        </div>
                        <div class="contact-info">
                            <h2>International Business Department</h2>
                            {!!  $contact->phone  !!}
                             <a target="_blank" href="https://wa.me/{!!  $contact->whtasapp  !!}">
                                 <img class="live-chat" width="130px" style="margin-top: 15px;" src="{{asset('front') }}/assets/images/contact/live.png">
                                 </a>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section>
    <!-- END: Contact Us -->


    <!-- Start: Map -->
    <section class="hpl-map pt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sec-content text-center">
                        <h2 class="sec-title">Head office Live Location</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="map-box">
                        {!!  $contact->map  !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ENd: Map -->

    <!-- Popup Cookie -->
<div id="popupModal" class="popup-modal">
    <div class="popup-content">
        <div class="pop-up-image">
            <h1>Privacy Statement</h1>
            <p class="privacy-text">
                The purpose of using personal information provided to us is, in principle, only to respond to inquiries, to provide information related to products and services of Healthcare Pharmaceuticals Ltd. (HPL) and its affiliates and to improve products and services of HPL. We will not use your personal information other than for such appropriate purposes described above without your permission and will keep your personal data for the period necessary to respond to your inquiry. This Privacy Statement applies to the operation of this website.
            </p>
            <div class="accept-button">
                <a id="acceptCookie" class="thm-btn read-more-btn-slider" style="font-size:20px">
                    <span class="txt">Accept</span>
                </a>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
.popup-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgb(82 101 187 / 50%);
    justify-content: center;
    align-items: center;
    z-index: 10000;
}

.popup-content {
    border-radius: 10px;
    text-align: center;
    width: 90%;
    background: #012855;
    padding: 20px;
    max-width: 500px;
    position: relative;
    animation: slideIn 0.5s ease-out;
}

.pop-up-image h1 {
    font-weight: 600;
    font-size: 22px;
    color: #fff;
    text-align: center;
    padding-bottom: 20px;
}

.privacy-text {
    font-size: 14px;
    color: #fff;
    margin-bottom: 20px;
    line-height: 22px;
    text-align: left;
}

.accept-button {
    margin-top: 20px;
}

/* Slide-in animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
// Check if cookie exists
function getCookie(name) {
    let cookieArr = document.cookie.split(";");
    for (let i = 0; i < cookieArr.length; i++) {
        let cookiePair = cookieArr[i].split("=");
        if (name == cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    return null;
}

// Set a cookie
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Show or hide modal based on cookie
window.onload = function () {
    if (!getCookie("acceptCookie")) {
        document.getElementById("popupModal").style.display = "flex";
    }
};

// Set cookie on accept and hide modal
document.getElementById("acceptCookie").onclick = function () {
    setCookie("acceptCookie", "accepted", 365); // Set cookie for 1 year
    document.getElementById("popupModal").style.display = "none";
};
</script>

    <!-- Cookie  pop up-->
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function () {
    // Show the popup after page load
    const popup = document.getElementById("popupModal");
    popup.style.display = "flex";

    // Close the popup when the close button is clicked
    const closeBtn = document.getElementById("closePopup");
    closeBtn.addEventListener("click", function () {
        popup.style.display = "none";
    });

    // Close popup when clicking outside the content
    window.addEventListener("click", function (event) {
        if (event.target === popup) {
            popup.style.display = "none";
        }
    });
});

</script>
    <!-- Cookie -->

    <style type="text/css">
        #baguetteBox-overlay{
            display: none;
        }
    </style>

@endsection

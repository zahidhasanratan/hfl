<!--Start: Technology provider -->
<div class="container sec-ptb-30">
    <div class="row wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
        <div class="col-md-12">
            <div class="tech-provider-box text-center">
                <div class="tech-pic mb-30">
                    <img width="130" src="{{asset('front') }}/assets/images/facilities/technology.png">
                </div>
                <h3>Technology provider</h3>
            </div>
        </div>
    </div>
    <div class="row wow fadeInUp pb-30 justify-content-center mt-30" data-wow-delay="500ms" data-wow-duration="1500ms">
        <div class="tech-logo">
           @foreach(\App\Technology::all() as $tech)
                <div class="tech-logo-all">
                    <img src="{{asset('') }}uploads/technology/{{ $tech->image }}">
                </div>
           @endforeach



            <!-- <div class="tech-logo-all">
              <img src="assets/images/technology/tec-provider/5.png">
            </div> -->




        </div>
    </div>
</div>
<!-- End:Technology provider -->


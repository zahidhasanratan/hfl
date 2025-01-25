@extends('frontend.app')

@section('title', $news->title . ' | Healthcare Pharmaceuticals')


@section('main')


<div class="hero-section">
    <div class="hero-slider owl-carousel owl-theme">
      <div class="hero-single" style="background: url(assets/img/slider/4.jpg); max-height: 180px;">
      </div>
    </div>
  </div>


<!-- Career Area -->
<div class="login-area py-120">
  <div class="container">
    <div class="col-md-5 mx-auto">
      <div class="login-form">
        <div class="login-header">
          <p>Application Form</p>
        </div>
        <form id="test-form" method="post" action="{{ route('application.form') }}" enctype="multipart/form-data">
            @csrf          
            <input class="form-control" type="hidden"  name="post_id" value="{{ $news->id }}">
            <input class="form-control" type="hidden"  name="postname" value="{{ $news->title }}">
            <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Your Name">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Your Email">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" name="subject" placeholder="Subject">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
          </div>

          <div class="form-group mt-3">
              <input type="file" name="image" required="">
              <label class="mr-4" style="font-size:12px">Upload your CV (PDF Only):</label>
          </div>

          <div class="d-flex align-items-center">
            <button type="submit" class="theme-btn">
              <i class="far fa-paper-plane"></i> Submit </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Career Area -->


@endsection
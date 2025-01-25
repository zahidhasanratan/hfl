@extends('frontend.app')


@section('title')
    @if(isset($page->title))
    {{$page->title}} | Healthcare Pharmaceuticals
    @endif
@endsection

@section('main')

   
      <!-- Start: Facilities Section -->
    <section class="facilities-details-wrap pt-200">
        <div class="container">
            <div class="row justify-content-start align-items-center wow fadeInUp pb-30 mb-50" data-wow-delay="500ms" data-wow-duration="1500ms">

                
                <div class="col-md-12">
                    <div class="facilities-details mt-30">
                        <h2>{{ $page->title }}</h2>
                        <div class="facilities-inner-details">
                            {!! $page->description !!}
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    
    <!-- End: page source links -->

@endsection

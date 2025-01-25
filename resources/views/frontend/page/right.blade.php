<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <!-- Blog Single Sidebar Start Here -->
    <div class="sidebar-area">

        <div class="recent-post-area hot-news">
            <h3 class="title-bg">Recent Events</h3>
            <ul class="news-post">

                @foreach(\App\Service::orderBy('id','DESC')
                       ->limit(4)
                       ->get() as $key=>$service)

                <li>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                            <div class="item-post">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-right-none">
                                        <a href="{{route('service.details',$service->slug)}}"><img style="width:100%" src="{{ asset('uploads/service/'.$service->image) }}" alt="" title="{{ $service->title }}"></a>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <h4><a href="{{route('service.details',$service->slug)}}"> {{ $service->title }}</a></h4>
                                        <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ $service->sub_title }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                    @endforeach
            </ul>
        </div>
    </div>
</div>
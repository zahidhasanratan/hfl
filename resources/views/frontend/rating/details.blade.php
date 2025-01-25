@extends('frontend.app')
@section('title')
{{$rating->title}}
@endsection

@section('content')

    <article style="min-height: 59px;">
        <div class="page-content" style="margin-top: -183px;">
            <div class="content-left rpage">
                <div class="com-info">
                    <div class="page-head">
                        <div class="page-name"><div>{{$rating->title}}</div></div>
                    </div>
                    <div class="page-detail">

                        <div class="latest-info">
                            <div><p><strong>Sector:</strong></p><p class="txt">{{$rating->sector}}</p></div>
                            <div><p><strong>Rating:</strong></p><p class="txt">{{$rating->rating}}</p></div>
                            <div><p><strong>Rating Type:</strong></p><p class="txt">{{$rating->type}}</p></div>
                            <div><p><strong>Industry:</strong></p><p class="txt">{{$rating->industry}}</p></div>
                            <div><p><strong>Outlook/Alert:</strong></p><p class="txt">{{$rating->outlook}}</p></div>
                            <div><p><strong>Rating Date:</strong></p><p class="txt">{{$rating->radingdate}}</p></div>
                        </div>
                    </div>
                </div>
                <div class="history">
                    <div class="page-head">
                        <div class="page-name"><div>Rating History</div></div>

                    </div>
                    <div class="page-detail">
                        {!! $rating->history !!}
                    </div>



                </div>
                <div class="announce">
                    <div class="page-head">
                        <div class="page-name"><div>Rating Action</div></div>
                    </div>
                    <div class="page-detail">
                        {!! $rating->action !!}
                    </div>
                </div>
                <div class="issue">
                    <div class="page-head">
                        <div class="page-name"><div>Issue Rating</div></div>
                    </div>
                    <div class="page-detail">
                        {!! $rating->issue !!}
                    </div>
                </div>


            </div>


            @include('frontend.common.right')

        </div>
    </article>
@endsection


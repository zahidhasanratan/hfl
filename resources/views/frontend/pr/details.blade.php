@extends('frontend.app')
@section('title')
{{$news->title}}
@endsection

@section('content')
    <article style="min-height: 59px;">
        <div class="page-content" style="margin-top: -183px;">
            <div class="content-main">
                <div class="left">
                    <h1 style="
	color: #005596;
	font-family: 'RobotoSlabBold','KanitRegular';
	margin: 0px;
	letter-spacing: 2px;
	text-transform: uppercase;
">{{$news->title}}</h1>				</div>
                <div class="right">
                    <div class="each-block">

                        {!! $news->description !!}
            </div>
        </div>
    </article>
@endsection


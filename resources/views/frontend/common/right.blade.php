<div class="content-right">

    <div class="search right">
        <div>
            <form action="{{route('company.search')}}" method="get" class="ccm-search-block-form">

                <input name="query" id="tags" type="text"  placeholder="Enter company name" class="ccm-search-block-text" autocomplete="off"/>
                <button type="submit" class="button"><i class="fa fa-search"></i></button>

            </form>
        </div>
    </div>

    <div class="article-list">
        <div class="block-link">

            @foreach($articles as $article)
                <div class="thumbnail-link ccc ">
                    <img src="{{asset('uploads/service')}}/{{$article->image}}" alt="" />
                    <a href="{{route('article.details',$article->slug)}}">
                        <div class="header">Articles & Research</div>
                        <div class="content">
                            <div>
                                <p><strong>{{$article->title}}</strong>
                                </p>
                                <p>{{$article->short}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        <div class="page-view-all">
            <p><a title="Article &amp; Research" href="{{ route('article.news.all') }}">View All</a>
            </p>
        </div>
    </div>
    <div class="pr-new-list">
        <div class="block-link">
            @foreach($prnews as $pr)
                <div class="thumbnail-link">
                    <img src="{{asset('uploads/activity')}}/{{$pr->image}}" alt="" />
                    <a href="{{route('pr.details',$pr->slug)}}" target="_blank">
                        <div class="content">
                            <div>
                                <p><strong>{{$pr->title}}</strong>
                                </p>
                                <p></p>
                            </div>
                        </div>
                        <div class="header">PR news</div>
                    </a>
                </div>
            @endforeach



        </div>
        <div class="page-view-all">
            <p><a title="PR News" href="{{ route('pr.news.all') }}">View All</a>
            </p>
        </div>
    </div>
    <div class="other-link">
        <h4>Quick Links</h4>
        <div>
            <ul>
                @foreach($links as $link)
                    <li><a href="{{$link->url}}" target="_blank">{{$link->title}}</a></li>
                @endforeach

            </ul>

        </div>
    </div>

</div>
<div class="advance-filter">
    <div class="page-head">
        <div class="page-name">
            <div>Rating List</div>
            <div class="fil"><a>Advance Filter</a></div>
        </div>
    </div>
    <div class="filter-list">
        <div class="wr-search">
            <form action="{{route('rating.search')}}" method="get" class="ccm-search-block-form">
                <div class="form-group">
                    <select id="sector" name="sector">
                        <option value="" data-id="rating-0">Sector</option>
                        @foreach($sector as $sector)
                            <option value="{{$sector->title}}" data-id="sector-0">{{$sector->title}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <select id="subsector" name="industry">
                        <option value="" data-id="rating-0">Industry</option>
                        @foreach($industry as $industry)
                            <option value="{{$industry->title}}" data-id="sector-0">{{$industry->title}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <select id="rtype" name="ratingtype">
                        <option value="" data-id="rating-0">Rating Type</option>
                        @foreach($ratingtype as $ratingtype)
                            <option value="{{$ratingtype->title}}" data-id="sector-0">{{$ratingtype->title}}</option>
                        @endforeach



                    </select>
                </div>
                <div class="form-group">
                    <select id="rating" name="ratinglist">
                        <option value="" data-id="rating-0">Rating</option>

                        @foreach($ratinglist as $ratinglist)
                            <option value="{{$ratinglist->title}}" data-id="sector-0">{{$ratinglist->title}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <select id="outlook" name="outlook">
                        <option value="" data-id="out-0">Outlook/Alert</option>
                        @foreach($outlook as $outlook)
                            <option value="{{$outlook->title}}" data-id="sector-0">{{$outlook->title}}</option>
                        @endforeach


                    </select>
                </div>
                <div class="form-group">

                    <button class="btn btn-default">Search</button>



                </div>
            </form>
        </div>
    </div>
</div>
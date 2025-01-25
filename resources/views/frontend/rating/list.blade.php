@extends('frontend.app')

@section('title','Rating List')


@section('content')
    <article style="min-height: 59px;">
        <div class="page-content" style="margin-top: -191px;">

            @include('frontend.common.filter')

                <div class="content-left">
                    <div class="all-company">

                        <div class="page-detail">
                            <p class="choose-now" data-now="name"> Sort by : name</p><table class="db-table">
                                <thead>
                                <tr>
                                    <th data-sort="name" data-order="asc" class=""><span>Name</span></th>
                                    <th data-sort="sector" data-order="asc" class=""><span>Sector</span></th>
                                    <th data-sort="subsector" data-order="asc" class=""><span>Industry</span></th>
                                    <th data-sort="rating_type" data-order="asc" class=""><span>Rating Type</span></th>
                                    <th data-sort="rating" data-order="asc" class=""><span>Rating</span></th>
                                    <th data-sort="date" data-order="asc" class=""><span>Rating Date</span></th>
                                    <th data-sort="outlook" data-order="asc" class=""><span>Outlook</span></th>

                                </tr>
                                </thead>
                                <tbody id="page-detail">
                                @foreach($rating as $ratings)
                                <tr class="each-company" data-id="1159">
                                    <td><a href="{{route('rating.details',$ratings->slug)}}">{{$ratings->title}}</a></td>
                                    <td>{{$ratings->sector}}</td>
                                    <td>{{$ratings->industry}}</td>
                                    <td style="width:120px;">{{$ratings->type}}</td>
                                    <td style="width:80px;">{{$ratings->rating}}</td>
                                    <td style="width:110px;">{{$ratings->radingdate}}</td>
                                    <td style="width:90px;">{{$ratings->outlook}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>

                    </div>

                </div>

                <script type="text/javascript">
                    // function autoSubmit() {
                    // var formObject = document.forms['sortForm'];
                    // formObject.submit();
                    // }
                </script>

            @include('frontend.common.right')



        </div>
    </article>
@endsection
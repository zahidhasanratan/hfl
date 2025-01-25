@extends('frontend.app')

@section('title')
    Life Member
@endsection


@section('main')
    <!-- Inner Page Header Serction Start Here -->
    <div class="inner-page-header">
        <div class="banner">
            <img src="{{asset('front') }}/images/banner/3.jpg" alt="Banner">
        </div>
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="{{ asset('') }}">Home <i class="fa fa-compress" aria-hidden="true"></i> </a> Life Member</li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inner Page Header serction end here -->
    <!-- Home About Start Here -->
    <div class="home-about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Life Member
                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Life Member No.</th>
                                            <th>Name</th>
                                            <th>Batch</th>
                                            <th>Address</th>
                                            <th>Address3</th>
                                            <th>Address1</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($links as $key=>$life)
                                            <tr class="odd gradeX">
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $life->LM_No }}</td>
                                                <td>{{ $life->Name }}</td>
                                                <td>{{ $life->Batch }}</td>
                                                <td>{{ $life->Address }}</td>
                                                <td>{{ $life->Address3 }}</td>
                                                <td>{{ $life->Address1 }}</td>
                                                <td>{{ $life->email }}</td>
                                                <td>{{ $life->phone }}</td>
                                                <td>
                                                    @if($life->image !='')
                                                        <img src="{{ asset('uploads/life/'.$life->image) }}" class="img-thumbnail" width="100" height="100" />
                                                    @else
                                                        <img src="{{ asset('uploads/life/dummy.jpeg') }}" class="img-thumbnail" width="100" height="100" />
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Home About End Here -->
@endsection

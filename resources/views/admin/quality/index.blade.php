@extends('layouts.app')

@section('title','All Quality Management System')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Quality Management System</h2>
                        <a style="float:right" href="{{ route('quality.create') }}" class="btn btn-primary square-btn-adjust">Add Quality Management System</a>
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Quality Management System
                            </div>
                            <div class="panel-body">

                                @include('layouts.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($news as $key=>$news)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $news->title }}</td>
                                                <td><img src="{{ asset('uploads/quality/'.$news->image) }}" class="img-thumbnail" width="100" height="100" /></td>

                                                <td><a href="{{route('quality.edit',$news->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <form id="delete-form-{{ $news->id }}" action="{{ route('quality.destroy',$news->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $news->id }}').submit();
                                                            }else {
                                                            event.preventDefault();
                                                            }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
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
        <!-- /. PAGE INNER  -->
    </div>

@endsection

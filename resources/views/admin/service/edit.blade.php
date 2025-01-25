@extends('layouts.app')

@section('title','Edit Policy')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Policy</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Policy
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('service.update',$service->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $service->title }}" placeholder="Title" />
                                        </div>

                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control ckeditor" name="short" rows="3">{{ $service->short }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>PDF </label>
                                            <input type="file" name="image"/></br>
                                            @if($service->image !='')
                                            <a href="{{ asset('uploads/service/'.$service->image) }}" class="img-thumbnail">See PDF</a>
                                            @endif
                                        </div>

                                        <a href="{{ route('service.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit Button</button>

                                    </form>
                                    <br />

                                </div>
                            </div>
                        </div>
                        <!-- End Form Elements -->
                    </div>
                </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->

@endsection

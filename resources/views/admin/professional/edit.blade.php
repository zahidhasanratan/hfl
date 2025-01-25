@extends('layouts.app')

@section('title','Edit Professional Information')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Professional Information</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Professional Information
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('professional.update',$news->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $news->title }}" placeholder="Title" />

                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="P_id" value="{{ $news->P_id }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" rows="3" name="description">{{ $news->description }}</textarea>
                                        </div>



                                        <div class="form-group">
                                            <label>Image (Height:800px X Width:800px)</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/professional/'.$news->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>

                                        <div class="form-group">
                                            <label>Sequence</label>
                                            <input type="text" class="form-control" name="sequece" placeholder="Sequence" value="{{ $news->sequece }}"/>

                                        </div>

                                        <a href="{{ route('overview.index') }}" class="btn btn-danger">Back</a>
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

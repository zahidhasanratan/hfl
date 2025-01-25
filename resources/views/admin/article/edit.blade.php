@extends('layouts.app')

@section('title','Edit Article')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Article</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Article
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('article.update',$news->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $news->title }}" placeholder="Title" />

                                        </div>
                                        <div class="form-group">
                                            <label>Sub Title</label>
                                            <input class="form-control" name="short" value="{{ $news->short }}" placeholder="Sub Title" />

                                        </div>
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="sub_title" placeholder="Date" value="{{ $news->sub_title }}"/>

                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" rows="3">{{ $news->description }}</textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Image (Height:500px X Width:890px)</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/article/'.$news->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>



                                        <a href="{{ route('article.index') }}" class="btn btn-danger">Back</a>
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

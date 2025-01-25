@extends('layouts.app')

@section('title','Edit')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit {{ $others->title }}</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit {{ $others->title }}
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('others.update',$others->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $others->title }}" placeholder="Title" />

                                        </div>

                                        <div class="form-group">
                                            <label>Corporate Office</label>
                                            <textarea class="form-control ckeditor" cols="3" rows="4" name="slug" placeholder="Address"> {{ $others->slug }} </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Plant</label>
                                            <textarea class="form-control ckeditor" cols="3" rows="4" name="description" placeholder="Plant"> {{ $others->description }} </textarea>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label>International Business Department</label>
                                            <textarea class="form-control ckeditor" name="phone" rows="3">{{ $others->phone }}</textarea>
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <label>Distribution</label>
                                            <textarea class="form-control ckeditor" name="Distribution" rows="3">{{ $others->Distribution }}</textarea>
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <label>U.S. Contact</label>
                                            <textarea class="form-control ckeditor" name="Us" rows="3">{{ $others->Us }}</textarea>
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <label>Whatsapp Number</label>
                                            <input class="form-control" name="whtasapp" value="{{ $others->whtasapp }}" placeholder="Whatsapp Number" />

                                        </div>
                                        <div class="form-group">
                                            <label>Map Iframe</label>
                                            <input class="form-control" name="map" value="{{ $others->map }}" placeholder="Map Iframe" />

                                        </div> --}}

                                        <a href="{{ route('others.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Save</button>

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

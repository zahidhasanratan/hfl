@extends('layouts.app')

@section('title','Edit Overview')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Overview</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Overview
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('overview.update',$news->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Question</label>
                                            <input class="form-control" name="question" value="{{ $news->question }}" placeholder="Question" />

                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="P_id" value="{{ $news->P_id }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="answare" rows="3">{{ $news->answare }}</textarea>
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

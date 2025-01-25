@extends('layouts.app')

@section('title','Edit Flag Logo')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Flag Logo</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Flag Logo
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('flag.update',$company->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $company->title }}" placeholder="Title" />

                                        </div>
                                        <div class="form-group">
                                            <label>URL</label>
                                            <input class="form-control" name="url" value="{{ $company->url }}" placeholder="URL" />

                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>

                                            <select class="form-control" name="type">
                                                <option value="Asia" {{ $company->type == 'Asia' ? 'selected' : '' }}>Asia</option>
                                                <option value="Africa" {{ $company->type == 'Africa' ? 'selected' : '' }}>Africa</option>
                                                <option value="North America" {{ $company->type == 'North America' ? 'selected' : '' }}>North America</option>
                                                <option value="South America" {{ $company->type == 'South America' ? 'selected' : '' }}>South America</option>
                                                <option value="Antarctica" {{ $company->type == 'Antarctica' ? 'selected' : '' }}>Antarctica</option>
                                                <option value="Europe" {{ $company->type == 'Europe' ? 'selected' : '' }}>Europe</option>
                                                <option value="Australia" {{ $company->type == 'Australia' ? 'selected' : '' }}>Australia</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>Sequence</label>
                                            <input class="form-control" name="sequence" value="{{ $company->sequence }}" placeholder="Sequence" />

                                        </div>


                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/flag/'.$company->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>



                                        <a href="{{ route('company.index') }}" class="btn btn-danger">Back</a>
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

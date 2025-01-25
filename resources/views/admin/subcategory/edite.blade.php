@extends('layouts.app')

@section('title','Edit Sub Category')
@section('content')

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Sub Category</h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Sub Category
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-12">
                                {{-- @include('backend.partial.msg') --}}

                                <form role="form" method="post" action="{{ route('SubCategoryUpdate') }}" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" value="{{@$edite->id}}" name="EditeId">


                                   <div class="form-group">
                                        <label>Sub Category Name</label>
                                        <input class="form-control" name="category_name" value="{{@$edite->category_name}}" placeholder="category_name" />

                                    </div>

                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="Pcat_id" required>
                                            <option value="{{ $edite->category_manage_id ?? '' }}">
                                                {{ optional(\App\CategoryManage::find($edite->category_manage_id))->category_name ?? 'Select Category' }}
                                            </option>
                                            @foreach(\App\CategoryManage::all() as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Image (Height:920px X Width:2500px) </label>
                                        <input type="file" name="image"/></br>

                                        <img src="{{ asset('uploads/subcategory/'.$edite->image) }}" class="img-thumbnail" width="100" height="100" />
                                    </div>

                                    <a href="{{ route('SubCategoryIndex') }}" class="btn btn-danger">Back</a>
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

@endsection

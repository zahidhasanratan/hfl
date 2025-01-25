@extends('layouts.app')
@section('title','Generic Category Create page')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Generic Add Category</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Generic Category
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    {{-- @include('backend.partial.msg') --}}

                                    <form role="form" method="post" action="{{ route('GenericCategoryStore') }}" enctype="multipart/form-data">
                                        @csrf


                                       <div class="form-group">
                                            <label>Category Name</label>
                                            <input class="form-control" name="g_category_name" value="{{old('g_category_name')}}" placeholder="category_name" />

                                        </div>


                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option selected disabled>-----Select Once--------</option>
                                                <option value="Active">Active</option>
                                                <option value="Deactive">Deactive</option>
                                            </select>

                                        </div>





                                        <a href="{{ route('GenericCategoryIndex') }}" class="btn btn-danger">Back</a>
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

@extends('layouts.app')
@section('title','Generic Category Edit page')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Generic Category</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Generic Category
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    {{-- @include('backend.partial.msg') --}}

                                    <form role="form" method="post" action="{{ route('GenericCategoryUpdate') }}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" value="{{@$edite->id}}" name="EditeId">


                                       <div class="form-group">
                                            <label>Category Name</label>
                                            <input class="form-control" name="g_category_name" value="{{@$edite->g_category_name}}" placeholder="g_category_name" />

                                        </div>


                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option selected disabled>-----Select Once--------</option>
                                                <option value="Active" {{(@$edite->status=='Active')?'selected':''}}>Active</option>
                                                <option value="Deactive" {{(@$edite->status=='Deactive')?'selected':''}}>Deactive</option>
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

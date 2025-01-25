@extends('layouts.app')

@section('title','Add Product')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Product</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Product
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Trade Name</label>
                                            <input class="form-control" name="title" placeholder="Trade Name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Gereric Name</label>
                                            <input class="form-control" name="gereric" placeholder="Gereric Name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Thereapeutic Name</label>
                                            <input class="form-control" name="thereapeutic" placeholder="Thereapeutic Name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="Pcat_id" required>
                                                <option value="">Select Category</option>
                                                @foreach(\App\Pcategory::all() as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Size</label>
                                            <input class="form-control" name="size" placeholder="Size" />
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input class="form-control" name="type" placeholder="Type" />
                                        </div>
                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" rows="3" name="short"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" rows="3" name="description"></textarea>
                                        </div>



                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="featured" value="1" id="featured">
                                                        <label class="form-check-label" for="featured">Featured in Home Page</label>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="news" value="1" id="news">
                                                        <label class="form-check-label" for="news">Newly Launched</label>
                                                    </div>
                                                </div>




                                        <div class="form-group">
                                            <label>Image (Height:800px X Width:800px)</label>
                                            <input type="file" class="form-control-file" name="image"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Multiple Gallery (Height:800px X Width:800px)</label>
                                            <input type="file" class="form-control" placeholder="Image" name="images2[]" multiple/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Video (MP4 Format)</label>
                                            <input type="file" name="video" class="form-control-file" />
                                            <br/>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label>Show Video</label>-->
                                        <!--    <input class="form-control" type="checkbox" name="display" value="1" />-->
                                        <!--    <br/>-->
                                        <!--</div>-->

                                        <div class="form-group">
                                            <label>PDF (Download Prescription)</label>
                                            <input type="file" class="form-control-file" name="prescription"/>
                                        </div>
                                        <div class="form-group">
                                            <label>PDF (Patient Program)</label>
                                            <input type="file" class="form-control-file" name="patient"/>
                                        </div>

                                        <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
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

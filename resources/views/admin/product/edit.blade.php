@extends('layouts.app')

@section('title','Edit Product')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Product</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Product
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Title -->
                                        <div class="form-group">
                                            <label>Trade Name</label>
                                            <input class="form-control" name="title" value="{{ $product->title }}" placeholder="Trade Name" />
                                        </div>

                                        <!-- Gereric Name -->
                                        <div class="form-group">
                                            <label>Gereric Name</label>
                                            <input class="form-control" name="gereric" value="{{ $product->gereric }}" placeholder="Gereric Name" />
                                        </div>

                                        <!-- Thereapeutic Name -->
                                        <div class="form-group">
                                            <label>Thereapeutic Name</label>
                                            <input class="form-control" name="thereapeutic" value="{{ $product->thereapeutic }}" placeholder="Thereapeutic Name" />
                                        </div>

                                        <!-- Category -->
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="Pcat_id" required>
                                                <option value="">Select Category</option>
                                                @foreach(\App\Pcategory::all() as $category)
                                                    <option value="{{ $category->id }}" {{ $product->Pcat_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Size -->
                                        <div class="form-group">
                                            <label>Size</label>
                                            <input class="form-control" name="size" value="{{ $product->size }}" placeholder="Size" />
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input class="form-control" name="type" value="{{ $product->type }}" placeholder="Type" />
                                        </div>
                                        <!-- Short -->
                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" rows="3" name="short">{{ $product->short }}</textarea>
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" rows="3" name="description">{{ $product->description }}</textarea>
                                        </div>

                                        <!-- Featured Checkbox -->
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="featured" value="1" id="featured" {{ $product->featured ? 'checked' : '' }}>
                                                <label class="form-check-label" for="featured">Featured in Home Page</label>
                                            </div>
                                        </div>

                                        <!-- Newly Launched Checkbox -->
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="news" value="1" id="news" {{ $product->news ? 'checked' : '' }}>
                                                <label class="form-check-label" for="news">Newly Launched</label>
                                            </div>
                                        </div>

                                        <!-- Image -->
                                        <div class="form-group">
                                            <label>Image (Height:800px X Width:800px)</label>
                                            <input type="file" name="image" class="form-control-file" />
                                            <br/>
                                            <img src="{{ asset('uploads/product/'.$product->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>
                                        <div class="form-group">
                                                    <label>Multiple Gallery (Height:800px X Width:800px)</label>
                                                    <input type="file" class="form-control" placeholder="Image" name="images2[]" multiple/>
                                                </div>

                                        <div class="form-group">

                                            <div class="form-group mt-3">
                                                <label for="deleted_images">Select Images for Deleting:</label>
                                                <div class="row">
                                                    @foreach(explode(',', $product->images2) as $image2)
                                                        <div class="col-md-3 mb-3">
                                                            <img style="height:200px;width:200px;" src="{{ asset('images/' . $image2) }}" class="img-fluid" alt="Image">
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" name="deleted_images[]" value="{{ $image2 }}">
                                                                <label class="form-check-label" for="deleted_images[]">Delete this image</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Video -->
                                        <div class="form-group">
                                            <label>Video (MP4 Format)</label>
                                            <input type="file" name="video" class="form-control-file" />
                                            <br/>
                                            @if($product->video)
                                                <video autoplay muted loop width="250" height="150">
                                                    <source src="{{ asset('uploads/video/'.$product->video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label>Show Video</label>-->
                                        <!--    <input class="form-control" type="checkbox" name="display" value="1" {{ $product->display == 1 ? 'checked' : '' }} />-->
                                        <!--    <br/>-->
                                          
                                        <!--</div>-->

                                        

                                        <!-- PDF (Download Prescription) -->
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="presOn" value="1" id="featured" {{ $product->presOn ? 'checked' : '' }}>
                                                <label class="form-check-label" for="featured">Show</label>
                                            </div>
                                            <label>PDF (Download Prescription)</label>
                                            <input type="file" class="form-control-file" name="prescription" />
                                            @if($product->prescription)
                                                <a href="{{ asset('uploads/prescription/'.$product->prescription) }}" target="_blank">View Prescription PDF</a>
                                            @endif
                                        </div>

                                        <!-- PDF (Patient Program) -->
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="PatiOn" value="1" id="featured" {{ $product->PatiOn ? 'checked' : '' }}>
                                                <label class="form-check-label" for="featured">Show</label>
                                            </div>
                                            <label>PDF (Patient Program)</label>
                                            <input type="file" class="form-control-file" name="patient" />
                                            @if($product->PatiOn)
                                                <a href="{{ asset('uploads/patient/'.$product->patient) }}" target="_blank">View All Product List PDF</a>
                                            @endif
                                        </div>

                                        <!-- Buttons -->
                                        <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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

@extends('layouts.app')

@section('title','Edit')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit {{ $objects->title }}</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit {{ $objects->title }}
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('objects.update',$objects->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group" style="display: none;">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $objects->title }}" placeholder="Title" />
                                        </div>
                                    @if($objects->id ==2)
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input class="form-control" name="short" value="{{ $objects->short }}" placeholder="Facebook" />
                                        </div>

                                        <div class="form-group">
                                            <label>Linkedin</label>
                                            <input class="form-control" name="description" value="{{ $objects->description }}" placeholder="Linkedin" />
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input class="form-control" name="slug" value="{{ $objects->slug }}" placeholder="Twitter" />
                                        </div>

                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input class="form-control" name="instagram" value="{{ $objects->instagram }}" placeholder="Instagram" />
                                        </div>
                                        <div class="form-group">
                                            <label>Youtube</label>
                                            <input class="form-control" name="whatsapp" value="{{ $objects->whatsapp }}" placeholder="Youtube" />
                                        </div>
                                    @endif
                                    @if($objects->id ==1)
                                      <div class="form-group">
                                          <label>Youtube Url</label>
                                          <input class="form-control" name="instagram" value="{{ $objects->instagram }}" placeholder="Youtube Url" />
                                      </div>
                                    @endif

                                        @if($objects->id ==3)
                                            <div class="form-group">
                                                <label>Employess</label>
                                                <input class="form-control" name="short" value="{{ $objects->short }}" placeholder="Employess" />
                                            </div>

                                            <div class="form-group">
                                                <label>Registered Medicine</label>
                                                <input class="form-control" name="description" value="{{ $objects->description }}" placeholder="Registered Medicine" />
                                            </div>
                                            {{-- <div class="form-group">
                                                <label>Nutritional products</label>
                                                <input class="form-control" name="slug" value="{{ $objects->slug }}" placeholder="Nutritional products" />
                                            </div> --}}

                                            <div class="form-group">
                                                <label>Nutritional products</label>
                                                <input class="form-control" name="instagram" value="{{ $objects->instagram }}" placeholder="Nutritional products" />
                                            </div>
                                            <div class="form-group">
                                                <label>Generic</label>
                                                <input class="form-control" name="whatsapp" value="{{ $objects->whatsapp }}" placeholder="Generic" />
                                            </div>
                                            <div class="form-group">
                                                <label>Enable</label>
                                                <!-- Hidden field to handle unchecked state -->
                                                <input type="hidden" name="slug" value="0">
                                                <input
                                                    class="form-control"
                                                    type="checkbox"
                                                    name="slug"
                                                    value="1"
                                                    {{ $objects->slug == 1 ? 'checked' : '' }}
                                                />
                                            </div>


                                        @endif
                                        @if($objects->id ==4)
                                            <div class="form-group">
                                                <label>Vision</label>
                                                <textarea class="form-control" name="short" >{{ $objects->short }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Mission</label>
                                                <textarea class="form-control" name="description" >{{ $objects->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Values</label>
                                                <textarea class="form-control" name="slug" >{{ $objects->slug }}</textarea>
                                            </div>
                                        @endif
                                        @if($objects->id ==5)
                                            {{-- <div class="form-group">
                                                <label>Short</label>
                                                <textarea class="form-control" name="short" >{{ $objects->short }}</textarea>
                                            </div> --}}
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control ckeditor" name="description" >{{ $objects->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Image (Height:500px X Width:890px)</label>
                                                <input type="file" name="image"/></br>
                                                <img src="{{ asset('uploads/object/'.$objects->image) }}" class="img-thumbnail" width="100" height="100" />
                                            </div>
                                        @endif

                                        @if($objects->id ==6)
                                            <div class="form-group">
                                                <label>Youtube Url</label>
                                                <input class="form-control" name="instagram" value="{{ $objects->instagram }}" placeholder="Youtube Url" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control ckeditor" name="description" >{{ $objects->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/object/'.$objects->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>

                                        @endif
                                         @if($objects->id ==9)


                                            <div class="form-group">
                                            <label>Pop Up Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/object/'.$objects->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>
                                        <div class="form-group">
                                          <label>Enable</label>
                                          <input class="form-control" type="checkbox" name="instagram" value="1" {{ $objects->instagram == 1 ? 'checked' : '' }} />

                                      </div>
                                        @endif
                                        @if($objects->id ==10)


                                            <div class="form-group">
                                            <label>Pop Up Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/object/'.$objects->image) }}" class="img-thumbnail" width="100" height="100" />
                                            </div>
                                            <div class="form-group">
                                              <label>Enable</label>
                                              <input class="form-control" type="checkbox" name="instagram" value="1" {{ $objects->instagram == 1 ? 'checked' : '' }} />

                                          </div>
                                        @endif


                                        @if($objects->id ==7)

                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control ckeditor" name="description" >{{ $objects->description }}</textarea>
                                            </div>
                                        @endif
                                        @if($objects->id ==8)

                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control ckeditor" name="description" >{{ $objects->description }}</textarea>
                                            </div>
                                        @endif
                                        @if($objects->id ==11)
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="short" value="{{ $objects->short }}" placeholder="Youtube Url" />
                                        </div>

                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" name="slug" value="{{ $objects->slug }}" placeholder="Youtube Url" />
                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control ckeditor" name="description" >{{ $objects->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image"/></br>
                                        <img src="{{ asset('uploads/object/'.$objects->image) }}" class="img-thumbnail" width="100" height="100" />
                                    </div>

                                    @endif

                                    @if($objects->id ==12)
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" name="short" value="{{ $objects->short }}" placeholder="Youtube Url" />
                                    </div>

                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input class="form-control" name="slug" value="{{ $objects->slug }}" placeholder="Youtube Url" />
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control ckeditor" name="description" >{{ $objects->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image"/></br>
                                    <img src="{{ asset('uploads/object/'.$objects->image) }}" class="img-thumbnail" width="100" height="100" />
                                </div>

                                @endif

                                @if($objects->id ==13)
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="short" value="{{ $objects->short }}" placeholder="Youtube Url" />
                                </div>

                                <div class="form-group">
                                    <label>Designation</label>
                                    <input class="form-control" name="slug" value="{{ $objects->slug }}" placeholder="Youtube Url" />
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control ckeditor" name="description" >{{ $objects->description }}</textarea>
                                </div>
                                <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image"/></br>
                                <img src="{{ asset('uploads/object/'.$objects->image) }}" class="img-thumbnail" width="100" height="100" />
                            </div>

                            @endif

                                        <a href="{{ route('objects.index') }}" class="btn btn-danger">Back</a>
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

@extends('layouts.app')

@section('title','Edit Life Member')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Life Member</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Life Member
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('life.update', $news->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="title" placeholder="Name" value="{{ $news->title}}" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" name="Batch" placeholder="Designation" value="{{ $news->Batch }}" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="phone" id="typeSelect" required>
                                                <option value="">Select Type</option>
                                                <option value="Board of Directors" {{ $news->phone === 'Board of Directors' ? 'selected' : '' }}>Board of Directors</option>
                                                <option value="Message From Chairman" {{ $news->phone === 'Message From Chairman' ? 'selected' : '' }}>Message From Chairman</option>
                                                <option value="Message From Managing Director" {{ $news->phone === 'Message From Managing Director' ? 'selected' : '' }}>Message From Managing Director</option>
                                                <option value="Message From DMD & CEO" {{ $news->phone === 'Message From DMD & CEO' ? 'selected' : '' }}>Message From DMD & CEO</option>
                                            </select>
                                        </div>

                                        <div id="display" style="display: none;">
                                            <div class="form-group">
                                                <label>Short Message</label>
                                                <textarea class="form-control" rows="3" name="Address">{{ $news->Address }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Short Details</label>
                                                <textarea class="form-control" rows="3" name="Address3">{{ $news->Address3 }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Message From Details</label>
                                                <textarea class="form-control ckeditor" rows="3" name="Address1">{{ $news->Address1 }}</textarea>
                                            </div>
                                        </div>

                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                // Check if specific types are selected on page load
                                                const selectedValue = $('#typeSelect').val();
                                                if (
                                                    selectedValue === 'Board of Directors' ||
                                                    selectedValue === 'Message From Chairman' ||
                                                    selectedValue === 'Message From Managing Director' ||
                                                    selectedValue === 'Message From DMD & CEO'
                                                ) {
                                                    $('#display').show();
                                                }

                                                // Show or hide the div based on the selected option
                                                $('#typeSelect').change(function() {
                                                    const selectedValue = $(this).val();
                                                    if (
                                                        selectedValue === 'Board of Directors' ||
                                                        selectedValue === 'Message From Chairman' ||
                                                        selectedValue === 'Message From Managing Director' ||
                                                        selectedValue === 'Message From DMD & CEO'
                                                    ) {
                                                        $('#display').show();
                                                    } else {
                                                        $('#display').hide();
                                                    }
                                                });
                                            });
                                        </script>

                                        <div class="form-group">
                                            <label>Photo (Height:320px X Width:320px)</label>
                                            <input type="file" name="image" />
                                            <br />
                                            @if($news->image != '')
                                                <img src="{{ asset('uploads/life/' . $news->image) }}" class="img-thumbnail" width="100" height="100" />
                                            @else
                                                <img src="{{ asset('uploads/life/dummy.jpeg') }}" class="img-thumbnail" width="100" height="100" />
                                            @endif
                                        </div>

                                        <a href="{{ route('news.index') }}" class="btn btn-danger">Back</a>
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

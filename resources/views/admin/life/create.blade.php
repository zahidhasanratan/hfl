@extends('layouts.app')

@section('title','Add Team')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Team</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Team
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('life.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="title" placeholder="Name" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" name="Batch" placeholder="Designation" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="phone" id="typeSelect" required>
                                                <option value="">Select Type</option>
                                                <option value="Board of Directors">Board of Directors</option>
                                                <option value="Message From Chairman">Message From Chairman</option>
                                                <option value="Message From Managing Director">Message From Managing Director</option>
                                                <option value="Message From DMD & CEO">Message From DMD & CEO</option>
                                            </select>
                                        </div>
                                        <div id="display" style="display: none;">
                                            <div class="form-group">
                                                <label>Short Message</label>
                                                <textarea class="form-control" rows="3" name="Address"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Short Details</label>
                                                <textarea class="form-control" rows="3" name="Address3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Message From Details</label>
                                                <textarea class="form-control ckeditor" rows="3" name="Address1"></textarea>
                                            </div>
                                        </div>

                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
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

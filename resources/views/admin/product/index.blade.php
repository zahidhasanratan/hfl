@extends('layouts.app')

@section('title','All Product')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Product</h2>
                        <a style="float:right" href="{{ route('product.create') }}" class="btn btn-primary square-btn-adjust">Add Product</a>
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Product
                            </div>
                            <div class="panel-body">

                                @include('layouts.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Tradename</th>
                                            <th>Gereric</th>
                                            <th>Thereapeutic</th>
                                            <th>Size</th>
                                            <th>Image</th>
                                            <th>Category Name</th>
                                            <th width="30%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product as $key=>$news)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                   {{ optional($news)->title ?? 'Title not available' }}

                                                    
                                                    </td>
                                                <td>{{ $news->gereric }}</td>
                                                <td>{{ $news->thereapeutic }}</td>
                                                <td>{{ $news->size }}</td>
                                                <td><img src="{{ asset('uploads/product/'.$news->image) }}" class="img-thumbnail" width="100" height="100" /></td>
                                                <td>
                                                   {{ optional(\App\Pcategory::find($news->Pcat_id))->title ?? 'Category not available' }}

                                                    
                                                    </td>
                                                <td>
                                                    <!-- Buttons on Top -->
                                                    <div style="margin-bottom: 10px;">
                                                        <a href="{{ route('product.edit', $news->id) }}" class="btn btn-info btn-sm">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>

                                                        <form id="delete-form-{{ $news->id }}" action="{{ route('product.destroy', $news->id) }}" style="display: none;" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                        <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $news->id }}').submit();
                                                            } else {
                                                            event.preventDefault();
                                                            }" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </div>

                                                    <!-- Buttons on Bottom -->
                                                    <div>
                                                        <a target="_blank" href="{{ route('overview.show', $news->id) }}" class="btn btn-info btn-sm">
                                                            <i class="fa fa-plus"></i> Overview
                                                        </a>

                                                        <a target="_blank" href="{{ route('professional.show', $news->id) }}" class="btn btn-info btn-sm">
                                                            <i class="fa fa-plus"></i> Professional Information
                                                        </a>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach



                                                                </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>

            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>

@endsection

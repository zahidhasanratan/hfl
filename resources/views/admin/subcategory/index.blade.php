@extends('layouts.app')

@section('title','All Sub Category')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Sub Category List</h2>
                    <a style="float:right" href="{{ route('SubCategoryCreate') }}" class="btn btn-primary square-btn-adjust">Add Sub Category</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Sub Category
                        </div>
                        <div class="panel-body">

                            {{-- @include('backend.partial.msg') --}}
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">SL.</th>
                                        <th style="text-align: center">Sub Category Name</th>

                                        {{-- <th>Url</th> --}}

                                        <th style="text-align: center">Url</th>
                                        <th style="text-align: center" width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($social as $key=>$socials)
                                    <tr class="odd gradeX">
                                        <td style="text-align: center">{{ $key + 1 }}</td>
                                        <td style="text-align: center">{{ $socials->category_name }}</td>



                                        <td style="text-align: center" class="center">{{ url('sub_category_product') }}/{{ $socials->id }}</td>
                                        <td style="text-align: center"><a href="{{route('SubCategoryEdite',$socials->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                            <a href="{{route('SubCategoryDelete',$socials->id)}}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>


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

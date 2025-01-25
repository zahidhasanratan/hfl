@extends('layouts.app')

@section('title','Generic Category List')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Generic Category List</h2>
                    <a style="float:right" href="{{ route('GenericCategoryCreate') }}" class="btn btn-primary square-btn-adjust"> Generic Add Category</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Generic Category
                        </div>
                        <div class="panel-body">

                            {{-- @include('backend.partial.msg') --}}
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">SL.</th>
                                        <th style="text-align: center">Category Name</th>
                                        <th style="text-align: center">Status</th>
                                        {{-- <th>Url</th> --}}

                                        <th style="text-align: center">Created At</th>
                                        <th style="text-align: center" width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($social as $key=>$socials)
                                    <tr class="odd gradeX">
                                        <td style="text-align: center">{{ $key + 1 }}</td>
                                        <td style="text-align: center">{{ $socials->g_category_name }}</td>
                                        <td style="text-align: center">
                                         @if($socials->status=='Active')
                                          <span class="badge badge-success" style="background:green">Active</span>
                                         @else

                                         <span class="badge badge-success" style="background:red">Deactive</span>

                                         @endif
                                        </td>
                                        {{-- <td>{{ $socials->url }}</td> --}}

                                        <td style="text-align: center" class="center">{{ $socials->created_at }}</td>
                                        <td style="text-align: center"><a href="{{route('GenericCategoryEdite',$socials->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                            <a href="{{route('GenericCategoryDelete',$socials->id)}}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>


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


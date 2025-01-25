@extends('layouts.app')

@section('title','All Product List')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Product List</h2>
                    <a style="float:right" href="{{ route('ProductManageCreate') }}" class="btn btn-primary square-btn-adjust">Add Product</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Product List
                        </div>
                        <div class="panel-body">

                            {{-- @include('backend.partial.msg') --}}
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">SL.</th>
                                        <th style="text-align: center">Product Name</th>
                                        <th style="text-align: center">Category</th>
                                        <th style="text-align: center">Therapeutic Category</th>
                                        <th style="text-align:center">Generic Category</th>
                                        <th style="text-align: center">Image</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Highlight</th>
                                        <th style="text-align: center" width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($index as $key=>$socials)

                                    @php
                                        $procate = App\PrroCategorys::where('pro_id',$socials->id)->get();
                                    @endphp
                                    <tr class="odd gradeX">
                                        <td style="text-align: center">{{ $key + 1 }}</td>
                                        <td style="text-align: center">{{ $socials->product_name }}</td>
                                        <td style="text-align: center">
                                            @if($socials->m_cat_id !='')
                                                 <span class="badge badge-success" style="background: green"> {{ \App\CategoryManage::where('id', $socials->m_cat_id)->first()->category_name }}
                                                </span>
                                            @endif
 @if($socials->sub_cat_id !='')
                                                 <span class="badge badge-success" style="background: #646403"> {{ \App\SubCategoryManage::where('id', $socials->sub_cat_id)->first()->category_name }}
                                                </span>
                                            @endif

                                        </td>

                                        <td style="text-align: center">{{ @$socials->TCate->t_category_name }}</td>
                                        <td style="text-align: center">{{ @$socials->GCate->g_category_name }}</td>


                                        <td style="text-align: center"><img style="width: 100px" src="{{(@$socials->image)?url('upload/product_manage/'.$socials->image):''}}" alt=""></td>

                                        <td style="text-align: center" class="center">

                                          @if($socials->status=='Active')
                                                <span class="badge badge-success" style="background:green">Active</span>
                                          @else
                                            <span class="badge badge-success" style="background:rgb(230, 81, 13)">Deactive</span>
                                          @endif
                                        </td>


                                        <td style="text-align: center" class="center">

                                            @if($socials->home_status=='1')
                                                 <a href="{{route('ProductManageActive',$socials->id)}}" class="btn btn-success"><i class="fa fa-arrow-down">Yes</i></a>
                                            @else
                                              <a href="{{route('ProductManageDeactive',$socials->id)}}" class="btn btn-warning"><i class="fa fa-arrow-up">No</i></a>
                                            @endif

                                          </td>


                                        <td style="text-align: center;min-width:110px"><a href="{{route('ProductManageEdite',$socials->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                            <a href="{{route('ProductManageView',$socials->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('ProductManageDelete',$socials->id)}}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>


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


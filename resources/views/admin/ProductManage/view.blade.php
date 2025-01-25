@extends('layouts.app')
@section('title','Product View page')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>View Product</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          {{@$edite->product_name}}  View Product
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    {{-- @include('backend.partial.msg') --}}
{{--
                                    <form role="form" method="post" action="{{ route('ProductManageUpdate') }}" enctype="multipart/form-data">
                                        @csrf --}}

                                        <input type="hidden" value="{{@$edite->id}}" name="EditeId">







                                        @foreach($category as $key => $c)
                                        <div class="singlse">


                                            <div class="col-md-6">
                                                <label style="font-family: none;font-size: 23px;font-weight: normal;" for="">{{$c->category_name}}</label>
                                            </div>


                                            <div class="col-md-6" >


                                                <input style="height: 36px;width: 43px;" disabled id="single" name="cat_id[]" @foreach($Prcategory as $key => $value) {{(@$c->id==$value->cat_id)?'checked':''}}   @endforeach  value="{{$c->id}}"  type="checkbox" >

                                            </div>


                                        </div>


                                        @endforeach







                                        <div class="row">

                                            <div class="col-md-12" style="border-top: 1px dotted black;
                                            padding-top: 40px;">
                                                <label for="">Product Name</label>
                                                <input type="text" class="form-control" name="product_name" value="{{@$edite->product_name}}" id="" placeholder="Product Name">
                                            </div>

                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Generic Name</label>
                                                 {{-- <textarea name="summary" class="form-control" id="" cols="10" rows="10">{!!@$edite->summary!!}</textarea> --}}
                                                 <input type="text" class="form-control" name="summary" value="{{$edite->summary}}" placeholder="Enter Generic Name">
                                            </div>


                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Short</label>
                                                 {{-- <textarea name="shot" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->shot!!}</textarea> --}}

                                                 <input type="text" class="form-control" name="shot" value="{{@$edite->shot}}" placeholder="Enter shot">
                                            </div>


                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Short Summary</label>
                                                 <textarea name="short_summary" class="form-control" id="" cols="10" rows="10">{!!@$edite->short_summary!!}</textarea>
                                                   {{-- <input type="text" class="form-control" name="short_summary" placeholder="Enter Generic Name"> --}}
                                                </div>




                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Description</label>
                                                 <textarea name="description" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->description!!}</textarea>
                                            </div>




                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Presntation</label>
                                                 <textarea name="presntation" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->presntation!!}</textarea>
                                            </div>




                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Indications</label>
                                                 <textarea name="indications" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->indications!!}</textarea>
                                            </div>


                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Dosage & Administration</label>
                                                 <textarea name="dosage_administration" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->dosage_administration!!}</textarea>
                                            </div>


                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Contrainidications</label>
                                                 <textarea name="contrainidications" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->contrainidications!!}</textarea>
                                            </div>



                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Side Effects</label>
                                                 <textarea name="side_effects" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->side_effects!!}</textarea>
                                            </div>



                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Warning Precautions</label>
                                                 <textarea name="warning_precautions" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->warning_precautions!!}</textarea>
                                            </div>





                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Drug Interaction</label>
                                                 <textarea name="drug_interaction" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->drug_interaction!!}</textarea>
                                            </div>



                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">User In Special Group</label>
                                                 <textarea name="use_in_special_groups" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->use_in_special_groups!!}</textarea>
                                            </div>



                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Packing</label>
                                                 <textarea name="packing" class="form-control ckeditor" id="" cols="10" rows="10">{!!@$edite->packing!!}</textarea>
                                            </div>


                                            {{-- <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Product Image</label>
                                                <input type="file" name="image" class="form-control" id="">
                                                <span style="color:red">Max Size: Width:370px, Height:257px</span> <br>


                                            </div>


                                            <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Brand Image</label>
                                                <input type="file" name="brand_image" class="form-control" id="">
                                                <span style="color:red">Max Size: Width:134px, Height:46px</span>


                                            </div>


                                            <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">PDF</label>
                                                <input type="file" name="pdf" class="form-control" id="">

                                            </div>



                                            <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Image Gallery</label>
                                                <input type="file" name="gallery[]" multiple class="form-control" id="">
                                                <span style="color:red">Max Size: Width:450px, Height:300px</span>
                                            </div> --}}





                                            <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Old Product Image</label> <br>

                                                <img style="width: 100px" src="{{(@$edite->image)?url('uploads/product_manage/'.$edite->image):''}}" alt="">



                                            </div>


                                            <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Old Brand Image</label> <br>
                                                <img style="width: 100px" src="{{(@$edite->brand_image)?url('uploads/brand_image/'.$edite->brand_image):''}}" alt="">


                                            </div>


                                            <div class="col-md-6" style="">
                                                <label for="">Old PDF</label> <br>
                                                <a href="{{(@$edite->pdf)?url('uploads/product_pdf/'.$edite->pdf):''}}">Open PDF</a>

                                            </div>



                                            <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Image Gallery</label> <br>

                                                @foreach($gallery as $key => $g)
                                                  <img style="width:100px" src="{{(@$g->gallery)?url('uploads/product_gallery/'.$g->gallery):''}}" alt="">
                                                 @endforeach

                                            </div>






                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Status</label>
                                                <select name="status" class="form-control" id="">
                                                    <option disabled selected>------Select Once-----</option>
                                                    <option value="Active" {{(@$edite->status=='Active')?'selected':''}}>Active</option>
                                                    <option value="Deactive" {{(@$edite->status=='Deactive')?'selected':''}}>Deactive</option>
                                                </select>

                                            </div>





                                           <div class="col-md-12">

                                            <h4 style="margin-top: 30px">Seo Tools:  <button style="background: none;
                                                border: 1px solid burlywood;
                                                padding: 3px;" type="button" class="" data-toggle="collapse" data-target="#demo"><span class="glyphicon glyphicon-sort"></span></button><h4>

                                                    <div id="demo" class="collapse">
                                                          <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="" style="display: inline-block; max-width: 100%;
                                                margin-bottom: 5px;font-weight: normal;">Meta Title</label>
                                                            <input type="text" class="form-control" name="meta_title" value="{{(@$edite->meta_title)}}" id="meta_title" placeholder="Enter meta title">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="" style="display: inline-block; max-width: 100%;
                                                margin-bottom: 5px;font-weight: normal;">Meta Description</label>
                                                            <textarea class="form-control" name="meta_des" id="meta_des" cols="20" rows="6">{!!@$edite->meta_des!!}</textarea>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="" style="display: inline-block; max-width: 100%;
                                                margin-bottom: 5px;font-weight: normal;">Header Code</label>
                                                            <textarea class="form-control" name="header_code" id="header_code" cols="20" rows="6"></textarea>
                                                        </div>
                                                    </div> --}}
                                                    </div>
                                           </div>





                                        </div>








                                        <a style="margin-top: 40px" href="{{ route('ProductManageIndex') }}" class="btn btn-danger">Back</a>
                                        {{-- <button style="margin-top: 40px" type="submit" class="btn btn-primary">Submit Button</button> --}}

                                    {{-- </form> --}}
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

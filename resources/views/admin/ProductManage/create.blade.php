@extends('layouts.app')
@section('title','Product Create page')
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
                                    {{-- @include('backend.partial.msg') --}}

                                    <form role="form" method="post" action="{{ route('ProductManageStore') }}" enctype="multipart/form-data">
                                        @csrf



                                        @foreach($category as $key => $c)
                                        <div class="singlse">


                                            <div class="col-md-6">
                                                <label style="font-family: none;font-size: 23px;font-weight: normal;" for="">{{$c->category_name}}</label>
                                            </div>


                                            <div class="col-md-6" >
                                                <input style="height: 36px;width: 43px;" id="single" name="cat_id[]"  value="{{$c->id}}"  type="checkbox" >
                                            </div>


                                        </div>


                                        @endforeach




                                        <!--<h3 style="text-decoration: underline;font-weight: bold;color: currentColor;">Therapeutic Category:</h3>-->

                                        <!--<br>-->
                                        <!--@foreach($t_category as $key => $c)-->
                                        <!--    <div class="singlse">-->


                                        <!--        <div class="col-md-6">-->
                                        <!--            <label style="font-family: none;font-size: 23px;font-weight: normal;" for="">{{$c->t_category_name}}</label>-->
                                        <!--        </div>-->


                                        <!--        <div class="col-md-6" >-->
                                        <!--            <input style="height: 36px;width: 43px;" class="chec" name="t_cat_id"  value="{{$c->id}}"  type="radio" >-->
                                        <!--        </div>-->


                                        <!--    </div>-->


                                        <!--@endforeach-->

                                         <br>

                                       <div class="row">

                                             <div class="col-md-12">
                                                <label for="">Therapeutic Category</label>
                                               <select class="form-control" name="t_cat_id">
                                                   <option selected="" disabled="">-----Select Once------</option>
                                                    @foreach($t_category as $key => $c)
                                                <option value="{{@$c->id}}">{{@$c->t_category_name}}</option>
                                                    @endforeach
                                               </select>
                                            </div>

                                        </div>




                                       <div class="row">

                                        <div class="col-md-12">
                                           <label for="">Generic Category</label>
                                          <select class="form-control" name="g_cat_id">
                                              <option selected="" disabled="">-----Select Once------</option>
                                               @foreach($g_category as $key => $c)
                                           <option value="{{@$c->id}}">{{@$c->g_category_name}}</option>
                                               @endforeach
                                          </select>
                                       </div>

                                   </div>

                                         <hr>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Main Category</label>
                                                <select class="form-control" id="mainCategory" name="m_cat_id">
                                                    <option selected="" disabled="">-----Select Once------</option>
                                                    @foreach(\App\CategoryManage::all() as $key => $mainCategory)
                                                        <option value="{{ $mainCategory->id }}">{{ $mainCategory->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-3" id="subCategoryContainer" style="display: none;">
                                            <div class="col-md-12">
                                                <label for="">Sub Category</label>
                                                <select class="form-control" id="subCategory" name="sub_cat_id" required>
                                                    <option selected="">-----Select Once------</option>
                                                    @foreach(\App\SubCategoryManage::all() as $key => $subCategory)
                                                        <option value="{{ $subCategory->id }}" data-category-id="{{ $subCategory->category_manage_id }}">
                                                            {{ $subCategory->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <script>
                                            document.getElementById('mainCategory').addEventListener('change', function () {
                                                const selectedMainCategoryId = this.value;
                                                const subCategoryContainer = document.getElementById('subCategoryContainer');
                                                const subCategorySelect = document.getElementById('subCategory');
                                                const subCategoryOptions = subCategorySelect.querySelectorAll('option');

                                                // Reset visibility and subcategories
                                                subCategoryContainer.style.display = 'none';
                                                subCategorySelect.value = '';
                                                let hasMatchingSubCategory = false;

                                                // Check and filter subcategories
                                                subCategoryOptions.forEach(option => {
                                                    if (option.hasAttribute('data-category-id')) {
                                                        if (option.getAttribute('data-category-id') === selectedMainCategoryId) {
                                                            option.style.display = ''; // Show matching subcategories
                                                            hasMatchingSubCategory = true;
                                                        } else {
                                                            option.style.display = 'none'; // Hide non-matching subcategories
                                                        }
                                                    }
                                                });

                                                // Show subcategory container only if there are matching subcategories
                                                if (hasMatchingSubCategory) {
                                                    subCategoryContainer.style.display = 'block';
                                                }
                                            });
                                        </script>


                                        <hr>

                                        <div class="row">

                                            <div class="col-md-12" >
                                                <label for="">Product Name</label>
                                                <input type="text" class="form-control" name="product_name" id="" placeholder="Product Name">
                                            </div>


                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Generic Name</label>
                                                 {{-- <textarea name="summary" class="form-control" id="" cols="10" rows="10"></textarea> --}}
                                                   <input type="text" class="form-control" name="summary" placeholder="Enter Generic Name">
                                                </div>





                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Short</label>
                                                 {{-- <textarea name="shot" class="form-control ckeditor" id="" cols="10" rows="10"></textarea> --}}
                                                 <input type="text" class="form-control" name="shot" placeholder="Enter shot">
                                            </div>


                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Short Summary</label>
                                                 <textarea name="short_summary" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                                   {{-- <input type="text" class="form-control" name="short_summary" placeholder="Enter Generic Name"> --}}
                                                </div>







                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Description</label>
                                                 <textarea name="description" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                            </div>




                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Composition</label>
                                                 <textarea name="presntation" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                            </div>




                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Mode of Action</label>
                                                 <textarea name="drug_interaction" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                            </div>

                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Indication</label>
                                                 <textarea name="indications" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                            </div>


                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Dosage & Administration</label>
                                                 <textarea name="dosage_administration" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                            </div>






                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Withdrawal period</label>
                                                 <textarea name="side_effects" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                            </div>



                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Pack Size</label>
                                                 <textarea name="warning_precautions" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                            </div>



                                            {{-- <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Drug Interaction</label>
                                                 <textarea name="drug_interaction" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                            </div>

                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">User In Special Group</label>
                                                 <textarea name="use_in_special_groups" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                            </div>

                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Packing</label>
                                                 <textarea name="packing" class="form-control ckeditor" id="" cols="10" rows="10"></textarea>
                                            </div> --}}


                                            <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Product Image</label>
                                                <input type="file" name="image" class="form-control" id="">
                                                <span style="color:red">Max Size: Width:370px, Height:247px</span>
                                            </div>


                                            {{-- <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Brand Image</label>
                                                <input type="file" name="brand_image" class="form-control" id="">
                                                <span style="color:red">Max Size: Width:134px, Height:46px</span>
                                            </div> --}}


                                            <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Show PDF</label>
                                                <input type="file" name="pdf" class="form-control" id="">

                                            </div>

                                            <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Inside PDF</label>
                                                <input type="file" name="pdf1" class="form-control" id="">

                                            </div>



                                            <div class="col-md-6" style="
                                            padding-top: 17px;">
                                                <label for="">Image Gallery</label>
                                                <input type="file" name="gallery[]" multiple class="form-control" id="">
                                                <span style="color:red">Max Size: Width:450px, Height:300px</span>
                                            </div>



                                            <div class="col-md-12" style="
                                            padding-top: 17px;">
                                                <label for="">Status</label>
                                                <select name="status" class="form-control" id="">
                                                    <option disabled selected>------Select Once-----</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Deactive">Deactive</option>
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
                                                            <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter meta title">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="" style="display: inline-block; max-width: 100%;
                                                margin-bottom: 5px;font-weight: normal;">Meta Description</label>
                                                            <textarea class="form-control" name="meta_des" id="meta_des" cols="20" rows="6"></textarea>
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
                                        <button style="margin-top: 40px" type="submit" class="btn btn-primary">Submit Button</button>

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


@endsection

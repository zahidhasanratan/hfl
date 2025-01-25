<?php

namespace App\Http\Controllers\admin;

use App\CategoryManage;
use App\GCategory;
use App\Http\Controllers\Controller;
use App\ProductManage;
use App\ProGallery;
use App\PrroCategorys;
use App\TCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

//use Image;
class ProductManageController extends Controller {
    public function ProductManageCreate() {

        $data['category'] = CategoryManage::get();
        $data['t_category'] = TCategory::get();
        $data['g_category'] = GCategory::get();

        return view('admin.ProductManage.create', $data);
    }

    public function ProductManageIndex() {

        $data['index'] = ProductManage::with('TCate')->OrderBy('id', 'desc')->get();

        $data['t_category'] = TCategory::get();
        $data['g_category'] = GCategory::get();

        return view('admin.ProductManage.index', $data);
    }

    public function ProductManageStore(Request $request) {

        DB::transaction(function () use ($request) {

            $exit = ProductManage::where('product_name', $request->product_name)->exists();

            if ($exit) {

                $noti = array(
                    'message'    => 'Product Name Already Exists!! Please Try Another Name',
                    'alert-type' => 'error',
                );

                return redirect()->route('ProductManageIndex')->with($noti);

            } else {

                $first_ch = str_split($request->product_name);

                $store = new ProductManage();
                $store->product_name = $request->product_name;
                $store->t_cat_id = $request->t_cat_id;
                $store->g_cat_id = $request->g_cat_id;
                $store->m_cat_id = $request->m_cat_id;
                $store->sub_cat_id = $request->sub_cat_id;
                $store->slug = str_slug($request->product_name);
                $store->summary = $request->summary;
                $store->shot = $request->shot;
                $store->description = $request->description;
                $store->meta_title = $request->meta_title;
                $store->meta_des = $request->meta_des;
                $store->presntation = $request->presntation;
                $store->indications = $request->indications;
                $store->dosage_administration = $request->dosage_administration;
                $store->contrainidications = $request->contrainidications;
                $store->side_effects = $request->side_effects;
                $store->warning_precautions = $request->warning_precautions;
                $store->drug_interaction = $request->drug_interaction;
                $store->use_in_special_groups = $request->use_in_special_groups;
                $store->packing = $request->packing;
                $store->first_ch = $first_ch[0];
                $store->status = $request->status;
                $store->short_summary = $request->short_summary;
                $store->save();

                //.................Image Section........................
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $fullname = time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(370, 247)->save('uploads/product_manage/' . $fullname);
                    $store->image = $fullname;
                    $store->save();
                }
                //................Brand Image................

                // if($request->hasFile('brand_image')){
                //     $image = $request->file('brand_image');
                //     $fullnames = time().'.'.$image->getClientOriginalExtension();
                //     Image::make($image)->resize(134,46)->save('upload/brand_image/'.$fullnames);
                //     $store->brand_image = $fullnames;
                //     $store->save();
                // }

                //...................Pdf Uplaod Section.............

                if ($request->pdf) {

                    $imageName = time() . '.' . request()->pdf->getClientOriginalExtension();
                    request()->pdf->move(public_path('uploads/product_pdf/'), $imageName);
                    $store->pdf = $imageName;
                    $store->save();
                }

                if ($request->pdf1) {

                    $imageName = time() . '.' . request()->pdf1->getClientOriginalExtension();
                    request()->pdf1->move(public_path('uploads/product_pdf/'), $imageName);
                    $store->pdf1 = $imageName;
                    $store->save();
                }

                //..........................Image Gallery..................

                if ($request->hasFile('gallery')) {

                    $image = $request->file('gallery');
                    foreach ($image as $key => $img) {
                        $fullnamess = time() . '.' . uniqid() . '.' . $key . '.' . $img->getClientOriginalExtension();
                        Image::make($img)->resize(450, 300)->save('uploads/product_gallery/' . $fullnamess);
                        $gall = new ProGallery();
                        $gall->pro_id = $store->id;
                        $gall->gallery = $fullnamess;
                        $gall->save();

                    }
                }

                //.....................Category Manage..................

                if ($request->cat_id) {

                    foreach ($request->cat_id as $cat) {
                        $category = new PrroCategorys();
                        $category->pro_id = $store->id;
                        $category->cat_id = $cat;
                        $category->save();
                    }
                }
            }

        });

        $noti = array(
            'message'    => 'Product Successfully Inserted',
            'alert-type' => 'success',
        );

        return redirect()->route('ProductManageIndex')->with($noti);
    }

    public function ProductManageEdite($id) {
        $data['t_category'] = TCategory::get();
        $data['g_category'] = GCategory::get();
        $data['edite'] = ProductManage::where('id', $id)->first();
        $data['Prcategory'] = PrroCategorys::where('pro_id', $data['edite']->id)->get();
        $data['gallery'] = ProGallery::where('pro_id', $data['edite']->id)->get();
        $data['category'] = CategoryManage::get();
        return view('admin.ProductManage.edite', $data);

        // return $data['gallery'];
    }

    public function ProductManageView($id) {
        $data['edite'] = ProductManage::where('id', $id)->first();
        $data['Prcategory'] = PrroCategorys::where('pro_id', $data['edite']->id)->get();
        $data['gallery'] = ProGallery::where('pro_id', $data['edite']->id)->get();
        $data['category'] = CategoryManage::get();
        return view('admin.ProductManage.view', $data);

    }

    public function ProductManageUpdate(Request $request) {

        DB::transaction(function () use ($request) {
            $first_ch = str_split($request->product_name);
            $update = ProductManage::where('id', $request->EditeId)->first();
            $update->product_name = $request->product_name;
            $update->slug = str_slug($request->product_name);
            $update->t_cat_id = $request->t_cat_id;
            $update->g_cat_id = $request->g_cat_id;
            $update->m_cat_id = $request->m_cat_id;
            $update->sub_cat_id = $request->sub_cat_id;
            $update->summary = $request->summary;
            $update->shot = $request->shot;
            $update->description = $request->description;
            $update->meta_title = $request->meta_title;
            $update->meta_des = $request->meta_des;
            $update->first_ch = $first_ch[0];
            $update->presntation = $request->presntation;
            $update->indications = $request->indications;
            $update->dosage_administration = $request->dosage_administration;
            $update->contrainidications = $request->contrainidications;
            $update->side_effects = $request->side_effects;
            $update->warning_precautions = $request->warning_precautions;
            $update->drug_interaction = $request->drug_interaction;
            $update->use_in_special_groups = $request->use_in_special_groups;
            $update->packing = $request->packing;
            $update->status = $request->status;
            $update->short_summary = $request->short_summary;

            $update->save();

            //...........................Product Image................

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $fullname = time() . '.' . $image->getClientOriginalExtension();
                @unlink('uploads/product_manage/' . $update->image);
                Image::make($image)->resize(370, 247)->save('uploads/product_manage/' . $fullname);
                $update->image = $fullname;
                $update->save();
            }

            //................Brand Image................

            //    if($request->hasFile('brand_image')){
            //     $image = $request->file('brand_image');
            //     $fullnames = time().'.'.$image->getClientOriginalExtension();
            //     @unlink('uploads/brand_image/'.$update->brand_image);
            //     Image::make($image)->resize(134,46)->save('uploads/brand_image/'.$fullnames);
            //     $update->brand_image = $fullnames;
            //     $update->save();
            // }

            //...................Pdf Uplaod Section.............

            if ($request->pdf) {

                $imageName = time() . '.' . request()->pdf->getClientOriginalExtension();
                @unlink('uploads/product_pdf/' . $update->pdf);
                request()->pdf->move(public_path('uploads/product_pdf/'), $imageName);
                $update->pdf = $imageName;
                $update->save();
            }

            if ($request->pdf1) {

                $imageName = time() . '.' . request()->pdf1->getClientOriginalExtension();
                @unlink('uploads/product_pdf/' . $update->pdf1);
                request()->pdf1->move(public_path('uploads/product_pdf/'), $imageName);
                $update->pdf1 = $imageName;
                $update->save();
            }

            //..........................Image Gallery..................

            if ($request->hasFile('gallery')) {
                $galleryDele = ProGallery::where('pro_id', $request->EditeId)->get();
                foreach ($galleryDele as $key => $ga) {

                    @unlink('uploads/product_gallery/' . $ga->gallery);
                    $ga->delete();
                }
                $image = $request->file('gallery');
                foreach ($image as $key => $img) {
                    $fullnamesss = time() . '.' . uniqid() . '.' . $key . '.' . $img->getClientOriginalExtension();
                    Image::make($img)->resize(450, 300)->save('uploads/product_gallery/' . $fullnamesss);
                    $gall = new ProGallery();
                    $gall->pro_id = $update->id;
                    $gall->gallery = $fullnamesss;
                    $gall->save();

                }
            }

            //.....................Category Manage..................

            if ($request->cat_id) {

                PrroCategorys::where('pro_id', $request->EditeId)->delete();

                foreach ($request->cat_id as $cat) {
                    $category = new PrroCategorys();
                    $category->pro_id = $update->id;
                    $category->cat_id = $cat;
                    $category->save();
                }
            }

        });

        $noti = array(
            'message'    => 'Product Successfully Updated',
            'alert-type' => 'success',
        );

        return redirect()->route('ProductManageIndex')->with($noti);

    }

    public function ProductManageDelete($id) {

        $dele = ProductManage::where('id', $id)->first();

        $gallery = ProGallery::where('pro_id', $id)->get();

        if ($gallery) {

            foreach ($gallery as $gal) {
                @unlink('uploads/product_gallery/' . $gal->gallery);
                $gal->delete();
            }
        }

        //.............Category Section..............

        $cate = PrroCategorys::where('pro_id', $id)->get();

        if ($cate) {

            foreach ($cate as $c) {

                $c->delete();
            }
        }

        if ($dele) {

            @unlink('uploads/product_manage/' . $dele->image);
            @unlink('uploads/brand_image/' . $dele->brand_image);
            @unlink('uploads/product_pdf/' . $dele->pdf);
            ProductManage::where('id', $id)->delete();

        }

        $noti = array(
            'message'    => 'Product Successfully Deleted',
            'alert-type' => 'success',
        );

        return redirect()->route('ProductManageIndex')->with($noti);

    }

    public function ProductManageActive($id) {

        $active = ProductManage::where('id', $id)->first();
        $active->home_status = 2;
        $active->save();

        $noti = array(
            'message'    => 'Product Successfully Actived',
            'alert-type' => 'success',
        );

        return redirect()->route('ProductManageIndex')->with($noti);

    }

    public function ProductManageDeactive($id) {

        $active = ProductManage::where('id', $id)->first();
        $active->home_status = 1;
        $active->save();

        $noti = array(
            'message'    => 'Product Successfully Deactive',
            'alert-type' => 'success',
        );

        return redirect()->route('ProductManageIndex')->with($noti);

    }

    public function ProductManagePanding() {

        $data['index'] = ProductManage::OrderBy('id', 'desc')->where('status', 'Deactive')->get();

        return view('admin.ProductManage.panding', $data);

    }

    public function ProductManageApprove() {

        $data['index'] = ProductManage::OrderBy('id', 'desc')->where('status', 'Active')->get();

        return view('admin.ProductManage.approve', $data);

    }

}

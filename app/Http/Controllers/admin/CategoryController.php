<?php

namespace App\Http\Controllers\admin;

use App\CategoryManage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryCreate(){

        return view('admin.category.create');
    }

    public function CategoryIndex(){

        $data['social'] = CategoryManage::OrderBy('id','desc')->get();

        return view('admin.category.index',$data);
    }

    public function CategoryStore(Request $request){

        $exist = CategoryManage::where('category_name',$request->category_name)->exists();

        if($exist){

            $noti = array(
                'message'=>'Already Exists',
                'alert-type'=>'error'
            );

            return redirect()->route('CategoryIndex')->with($noti);
        }else{

        $store = new CategoryManage();
        $store->category_name = $request->category_name;
        $store->status = $request->status;
        $store->save();

        $noti = array(
            'message'=>'category successfully inserted',
            'alert-type'=>'success'
        );

        return redirect()->route('CategoryIndex')->with($noti);
    }

    }

    public function CategoryEdite($id){

        $data['edite'] = CategoryManage::where('id',$id)->first();

        return view('admin.category.edite',$data);
    }

    public function CategoryUpdate(Request $request){

         $update = CategoryManage::where('id',$request->EditeId)->first();
         $update->category_name = $request->category_name;
         $update->status = $request->status;
         $update->save();

         $noti = array(
            'message'=>'category successfully Updated',
            'alert-type'=>'success'
        );

        return redirect()->route('CategoryIndex')->with($noti);
    }

    public function CategoryDelete($id){

        CategoryManage::where('id',$id)->delete();

        $noti = array(
            'message'=>'category successfully Deleted',
            'alert-type'=>'success'
        );

        return redirect()->route('CategoryIndex')->with($noti);
    }
}

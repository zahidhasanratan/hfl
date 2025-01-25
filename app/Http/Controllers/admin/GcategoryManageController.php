<?php

namespace App\Http\Controllers\admin;

use App\GCategory;
use App\Http\Controllers\Controller;
use Balping\JsonRaw\Raw;
use Illuminate\Http\Request;

class GcategoryManageController extends Controller
{
    public function GenericCategoryCreate(){

       return view('admin.GCategory.create');
    }

    public function GenericCategoryIndex(){

        $data['social'] = GCategory::get();
        return view('admin.GCategory.index',$data);
    }

    public function GenericCategoryStore(Request $request){

         $store = new GCategory();
         $this->save($store,$request);

         $noti = array(
             'message'=>'successfully Stored',
             'alert-type'=>'success'
         );

         return redirect()->route('GenericCategoryIndex')->with($noti);
    }

    public function GenericCategoryEdite($id){

        $data['edite'] = GCategory::where('id',$id)->first();
        return view('admin.GCategory.edite',$data);
    }

    public function GenericCategoryUpdate(Request $request){

        $store = GCategory::where('id',$request->EditeId)->first();
        $this->save($store,$request);
        $noti = array(
            'message'=>'successfully Updated',
            'alert-type'=>'success'
        );

        return redirect()->route('GenericCategoryIndex')->with($noti);
    }

    private function save(GCategory $store,Request $request){

        $store->g_category_name = $request->g_category_name;
        $store->status = $request->status;
        $store->save();
    }

    public function GenericCategoryDelete($id){

        GCategory::where('id',$id)->delete();
        $noti = array(
            'message'=>'successfully Delete',
            'alert-type'=>'success'
        );

        return redirect()->route('GenericCategoryIndex')->with($noti);

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TCategory;
use Illuminate\Http\Request;

class TherapeuticCategoryController extends Controller
{
    //   TheraCategoryDelete

    public function TheraCategoryCreate(){
        return view('admin.TCategory.create');
    }

    public function TheraCategoryIndex(){

        $data['social'] = TCategory::get();
        return view('admin.TCategory.index',$data);
    }

    public function TheraCategoryStore(Request $request){

        $request->validate([
            't_category_name'=>'required'
        ]);

        $store =new TCategory();
        $this->save($store,$request);

        $noti = array(
            'message'=>'successfully Added',
            'alert-type'=>'success'
        );
        return redirect()->route('TheraCategoryIndex')->with($noti);
    }

    public function TheraCategoryEdite($id){

        $data['edite'] = TCategory::where('id',$id)->first();

        return view('admin.TCategory.edite',$data);
    }

    public function TheraCategoryUpdate(Request $request){

        $store = TCategory::where('id',$request->EditeId)->first();
        $this->save($store,$request);


        $noti = array(
            'message'=>'successfully Updaed',
            'alert-type'=>'success'
        );
        return redirect()->route('TheraCategoryIndex')->with($noti);

    }

    private function save(TCategory $store,Request $request){

         $store->t_category_name = $request->t_category_name;
         $store->status = $request->status;
         $store->save();
    }

    public function TheraCategoryDelete($id){

        TCategory::where('id',$id)->delete();

        $noti = array(
            'message'=>'successfully Deleted',
            'alert-type'=>'success'
        );
        return redirect()->route('TheraCategoryIndex')->with($noti);
    }

}

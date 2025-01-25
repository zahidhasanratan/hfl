<?php

namespace App\Http\Controllers\admin;

use App\SubCategoryManage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CategoryIndex(){

        $data['social'] = SubCategoryManage::OrderBy('id','desc')->get();

        return view('admin.subcategory.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CategoryCreate()
    {

        return view('admin.subcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function CategoryStore(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png|max:2048', // Nullable and size validation
        ]);

        $image = $request->file('image');
        $slug = \Illuminate\Support\Str::slug($request->category_name); // Use Str::slug for slug generation
        $imagename = null;

        if ($image) {
            $currentDate = \Carbon\Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Ensure directory exists
            if (!file_exists(public_path('uploads/subcategory'))) {
                mkdir(public_path('uploads/subcategory'), 0777, true);
            }

            $image->move(public_path('uploads/subcategory'), $imagename);
        }

        // Check if category already exists
        $exists = SubCategoryManage::where('category_name', $request->category_name)->exists();

        if ($exists) {
            $noti = [
                'message' => 'Category already exists',
                'alert-type' => 'error'
            ];

            return redirect()->route('CategoryIndex')->with($noti);
        } else {
            $store = new SubCategoryManage();
            $store->category_name = $request->category_name;
            $store->category_manage_id = $request->Pcat_id;
            $store->image = $imagename; // Assign the image name
            $store->save();

            $noti = [
                'message' => 'Category successfully inserted',
                'alert-type' => 'success'
            ];

            return redirect()->route('SubCategoryIndex')->with($noti);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function CategoryEdite($id){
        $data['edite'] = SubCategoryManage::where('id',$id)->first();
        return view('admin.subcategory.edite',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function CategoryUpdate(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png|max:2048',
        ]);

        $slug = \Illuminate\Support\Str::slug($request->category_name); // Use Str::slug for slug generation
        $imagename = null;

        // Retrieve the record to update
        $update = SubCategoryManage::findOrFail($request->EditeId);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $currentDate = \Carbon\Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Ensure directory exists
            if (!file_exists(public_path('uploads/subcategory'))) {
                mkdir(public_path('uploads/subcategory'), 0777, true);
            }

            // Move the new image to the uploads directory
            $image->move(public_path('uploads/subcategory'), $imagename);

            // Delete the old image if it exists
            if ($update->image && file_exists(public_path('uploads/subcategory/' . $update->image))) {
                unlink(public_path('uploads/subcategory/' . $update->image));
            }
        } else {
            // Retain the existing image if no new image is uploaded
            $imagename = $update->image;
        }

        // Update the record
        $update->category_name = $request->category_name;
        $update->category_manage_id = $request->Pcat_id;
        $update->image = $imagename;
        $update->save();

        // Notification
        $noti = [
            'message' => 'Category successfully updated',
            'alert-type' => 'success',
        ];

        return redirect()->route('SubCategoryIndex')->with($noti);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function CategoryDelete($id)
    {
        // Find the SubCategoryManage record
        $team = SubCategoryManage::findOrFail($id);

        // Delete the image file if it exists
        if ($team->image && file_exists(public_path('uploads/subcategory/' . $team->image))) {
            unlink(public_path('uploads/subcategory/' . $team->image));
        }

        // Delete the database record
        $team->delete();

        // Notification
        $noti = [
            'message' => 'Category successfully deleted',
            'alert-type' => 'success',
        ];

        return redirect()->route('SubCategoryIndex')->with($noti);
    }

}

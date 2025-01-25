<?php

namespace App\Http\Controllers\admin;

use App\Activity;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product =   Product::all();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
{
    $this->validate($request, [
        'title' => 'required',
        'image' => 'nullable',
        'prescription' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'patient' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'video' => 'nullable|file|mimes:mp4|max:15200', // Video validation
        'Pcat_id' => 'required|exists:pcategories,id',
    ]);

    $slug = str_slug($request->title);

    // Handle image upload
    $image = $request->file('image');
    $images2 = [];

    if ($request->hasFile('images2')) {
        foreach ($request->file('images2') as $image2) {
            $imageName = time() . '_' . $image2->getClientOriginalName();
            $image2->move(public_path('images'), $imageName);
            $images2[] = $imageName;
        }
    }
    $imagesString = implode(',', $images2);

    if (isset($image)) {
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        if (!file_exists('uploads/product')) {
            mkdir('uploads/product', 0755, true);
        }
        $image->move('uploads/product', $imagename);
    } else {
        $imagename = 'default.png';
    }

    // Handle prescription upload
    $prescription = $request->file('prescription');
    if (isset($prescription)) {
        $currentDate = Carbon::now()->toDateString();
        $prescriptionname = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $prescription->getClientOriginalExtension();
        if (!file_exists('uploads/prescription')) {
            mkdir('uploads/prescription', 0755, true);
        }
        $prescription->move('uploads/prescription', $prescriptionname);
    } else {
        $prescriptionname = 'default.png';
    }

    // Handle patient file upload
    $patient = $request->file('patient');
    if (isset($patient)) {
        $currentDate = Carbon::now()->toDateString();
        $patientname = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $patient->getClientOriginalExtension();
        if (!file_exists('uploads/patient')) {
            mkdir('uploads/patient', 0755, true);
        }
        $patient->move('uploads/patient', $patientname);
    } else {
        $patientname = 'default.png';
    }

    // Handle video upload
    $video = $request->file('video');
    if (isset($video)) {
        $currentDate = Carbon::now()->toDateString();
        $videoname = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $video->getClientOriginalExtension();
        if (!file_exists('uploads/video')) {
            mkdir('uploads/video', 0755, true);
        }
        $video->move('uploads/video', $videoname);
    } else {
        $videoname = null; // Set to null if no video is uploaded
    }

    // Saving product data
    $product = new Product();
    $product->title = $request->title;
    $product->Pcat_id = $request->Pcat_id;
    $product->gereric = $request->gereric;
    $product->type = $request->type;
    $product->size = $request->size;
    $product->display = $request->has('display') ? 1 : 0; // Check if display checkbox is checked
    $product->thereapeutic = $request->thereapeutic;
    $product->short = $request->short;
    $product->description = $request->description;
    $product->featured = $request->has('featured') ? 1 : 0;
    $product->news = $request->has('news') ? 1 : 0;
    $product->slug = $slug;
    $product->images2 = $imagesString; // Corrected
    $product->prescription = $prescriptionname;
    $product->patient = $patientname;
    $product->image = $imagename;
    $product->video = $videoname; // Save the video file name

    $product->save();

    return redirect()->route('product.index')->with('successMsg', 'Product Successfully Saved');
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =   Product::find($id);
        return view('admin/product/edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     
    public function update(Request $request, $id)
{
    $this->validate($request, [
        'title' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'prescription' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'patient' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'video' => 'nullable|file|mimes:mp4|max:15200',
        'Pcat_id' => 'required|exists:pcategories,id',
    ]);

    $product = Product::findOrFail($id);
    $slug = str_slug($request->title);

    // Handle image upload
    $image = $request->file('image');
    if (isset($image)) {
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        if (!file_exists('uploads/product')) {
            mkdir('uploads/product', 0755, true);
        }
        $image->move('uploads/product', $imagename);

        if ($product->image != 'default.png') {
            @unlink('uploads/product/' . $product->image);
        }
    } else {
        $imagename = $product->image;
    }

    // Handle images2 upload and deletion
    if ($request->hasFile('images2')) {
        $newImages2 = $request->file('images2');
        $newImageNames2 = [];

        foreach ($newImages2 as $image2) {
            $imageName2 = time() . '_' . $image2->getClientOriginalName();
            $image2->move(public_path('images'), $imageName2);
            $newImageNames2[] = $imageName2;
        }

        $existingImages2 = explode(',', $product->images2);
        $mergedImages2 = array_merge($existingImages2, $newImageNames2);
        $product->images2 = implode(',', $mergedImages2);
    }

    if ($request->has('deleted_images')) {
        $deletedImages = $request->input('deleted_images');
        $existingImages2 = explode(',', $product->images2);

        foreach ($deletedImages as $image2) {
            $imagePath = public_path('images/' . $image2);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $existingImages2 = array_diff($existingImages2, [$image2]);
        }

        $product->images2 = implode(',', $existingImages2);
    }

    // Handle video upload
    $video = $request->file('video');
    if (isset($video)) {
        $currentDate = Carbon::now()->toDateString();
        $videoname = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $video->getClientOriginalExtension();
        if (!file_exists('uploads/video')) {
            mkdir('uploads/video', 0755, true);
        }
        $video->move('uploads/video', $videoname);

        if ($product->video && $product->video != 'default.mp4') {
            @unlink('uploads/video/' . $product->video);
        }
    } else {
        $videoname = $product->video;
    }

    // Handle prescription upload
    $prescription = $request->file('prescription');
    if (isset($prescription)) {
        $currentDate = Carbon::now()->toDateString();
        $prescriptionname = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $prescription->getClientOriginalExtension();
        if (!file_exists('uploads/prescription')) {
            mkdir('uploads/prescription', 0755, true);
        }
        $prescription->move('uploads/prescription', $prescriptionname);

        if ($product->prescription != 'default.png') {
            @unlink('uploads/prescription/' . $product->prescription);
        }
    } else {
        $prescriptionname = $product->prescription;
    }

    // Handle patient file upload
    $patient = $request->file('patient');
    if (isset($patient)) {
        $currentDate = Carbon::now()->toDateString();
        $patientname = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $patient->getClientOriginalExtension();
        if (!file_exists('uploads/patient')) {
            mkdir('uploads/patient', 0755, true);
        }
        $patient->move('uploads/patient', $patientname);

        if ($product->patient != 'default.png') {
            @unlink('uploads/patient/' . $product->patient);
        }
    } else {
        $patientname = $product->patient;
    }

    // Update product data
    $product->title = $request->title;
    $product->display = $request->display;
    $product->Pcat_id = $request->Pcat_id;
    $product->gereric = $request->gereric;
    $product->size = $request->size;
    $product->type = $request->type;
    $product->thereapeutic = $request->thereapeutic;
    $product->short = $request->short;
    $product->presOn = $request->presOn;
    $product->PatiOn = $request->PatiOn;
    
    $product->description = $request->description;
    $product->featured = $request->has('featured') ? 1 : 0;
    $product->news = $request->has('news') ? 1 : 0;
    $product->slug = $slug;
    $product->prescription = $prescriptionname;
    $product->patient = $patientname;
    $product->image = $imagename;
    $product->video = $videoname;
    $product->save();

    return redirect()->route('product.index')->with('successMsg', 'Product Successfully Updated');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Product::find($id);
        if (file_exists('uploads/product/'.$activity->image))
        {
            unlink('uploads/product/'.$activity->image);
        }
        $activity->delete();
        return redirect()->back()->with('successMsg','Product Successfully Deleted');
    }
}

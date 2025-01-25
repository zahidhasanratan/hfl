<?php

namespace App\Http\Controllers\admin;

use App\Facility;
use App\Menu;
use App\News;
use App\Objects;
use App\Others;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news =   Facility::all();
        return view('admin.facility.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/facility'))
            {
                mkdir('uploads/facility', 0777 , true);
            }
            $image->move('uploads/facility',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $news = new Facility();
        $news->title = $request->title;
        $news->url = $request->url;
        $news->video = $request->video;
        $news->slug = $slug;
        $news->short = $request->short;
        $news->description = $request->description;
        $news->image = $imagename;
        $news->save();
        return redirect()->route('facility.index')->with('successMsg','Facility Successfully Saved');

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
        $news =   Facility::find($id);
        return view('admin/facility/edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request,[
    //         'title' => 'required',
    //     ]);
    //     $image = $request->file('image');
    //     $slug = str_slug($request->title);
    //     $news = Facility::find($id);

    //     $news->title = $request->title;
    //     $news->url = $request->url;
    //     $news->video = $request->video;
    //     $news->slug = $slug;
    //     $news->short = $request->short;
    //     $news->description = $request->description;
    //     $news->save();
    //     return redirect()->route('facility.index')->with('successMsg','Facility Successfully Updated');
    // }

    public function update(Request $request, $id)
{
    // Validate the request
    $this->validate($request, [
        'title' => 'required',
    ]);

    // Fetch the facility record
    $news = Facility::findOrFail($id);

    // Handle the image upload
    $image = $request->file('image');
    $slug = str_slug($request->title);

    if (isset($image)) {
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

        // Create the directory if it doesn't exist
        if (!file_exists('uploads/facility')) {
            mkdir('uploads/facility', 0777, true);
        }

        // Move the uploaded image to the target directory
        $image->move('uploads/facility', $imagename);

        // Delete the old image if it exists and is not the default
        if ($news->image && $news->image != 'default.png' && file_exists('uploads/facility/' . $news->image)) {
            unlink('uploads/facility/' . $news->image);
        }

        // Assign the new image name
        $news->image = $imagename;
    }

    // Update other fields
    $news->title = $request->title;
    $news->url = $request->url;
    $news->video = $request->video;
    $news->slug = $slug;
    $news->short = $request->short;
    $news->description = $request->description;

    // Save the updated record
    $news->save();

    // Redirect back with success message
    return redirect()->route('facility.index')->with('successMsg', 'Facility Successfully Updated');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Facility::find($id);
        $news->delete();
        return redirect()->back()->with('successMsg','Facility Successfully Deleted');
    }

    public function details($slug){
        $news = Facility::where('slug',$slug)->first();

        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::find(2);
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $footer2  =  Menu::orderBy('sequence','ASC')
            ->where('footer2',1)
            ->get();
        $top_header  = Menu::orderBy('sequence','ASC')
            ->where('top_header',1)
            ->get();
        return view('frontend/facility.details',compact('footer2','top_header','objects2','contact2','headoffice','news','main','contact1','footer'));
    }
}

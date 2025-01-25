<?php

namespace App\Http\Controllers\admin;

use App\Activity;
use App\Overview;
use App\Professional;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = $id;
        return view('admin.professional.create', compact('id'));
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
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/professional'))
            {
                mkdir('uploads/professional', 0777 , true);
            }
            $image->move('uploads/professional',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $activity = new Professional();
        $activity->title = $request->title;
        $activity->slug = $slug;
        $activity->P_id = $request->P_id;
        $activity->description = $request->description;
        $activity->image = $imagename;
        $activity->save();
        return redirect()->route('professional.show',$request->P_id)->with('successMsg','Professional Information Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = Professional::where('P_id', $id)->get();
        return view('admin.professional.index', compact('news', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news =   Professional::find($id);
        return view('admin/professional/edit',compact('news'));
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
        $this->validate($request,[
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $activity = Professional::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/professional'))
            {
                mkdir('uploads/professional', 0777 , true);
            }
            $image->move('uploads/professional',$imagename);
        }else {
            $imagename = $activity->image;
        }

        $activity->title = $request->title;

        $activity->slug = $slug;
        $activity->P_id = $request->P_id;
        $activity->sequece = $request->sequece;
        $activity->description = $request->description;
        $activity->image = $imagename;
        $activity->save();
        return redirect()->route('professional.show',$request->P_id)->with('successMsg','Professional Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Professional::find($id);
        if (file_exists('uploads/professional/'.$activity->image))
        {
            unlink('uploads/professional/'.$activity->image);
        }
        $activity->delete();
        return redirect()->back()->with('successMsg','Professional Successfully Deleted');
    }
}

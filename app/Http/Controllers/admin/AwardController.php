<?php

namespace App\Http\Controllers\admin;

use App\Award;
use App\Gmp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company =   Award::all();
        return view('admin.award.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.award.create');
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
            'url' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/award'))
            {
                mkdir('uploads/award', 0777 , true);
            }
            $image->move('uploads/award',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $company = new Award();
        $company->title = $request->title;
        $company->url = $request->url;
        $company->image = $imagename;
        $company->save();
        return redirect()->route('award.index')->with('successMsg','Award Successfully Saved');

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
        $company =   Award::find($id);
        return view('admin/award/edit',compact('company'));
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
            'url' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $company = Award::find($id);
        if (isset($image))
        {
            $currentDate = \Carbon\Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/award'))
            {
                mkdir('uploads/award', 0777 , true);
            }
            $image->move('uploads/award',$imagename);
        }else {
            $imagename = $company->image;
        }

        $company->title = $request->title;
        $company->url = $request->url;
        $company->image = $imagename;
        $company->save();
        return redirect()->route('award.index')->with('successMsg','Award Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Award::find($id);
        if (file_exists('uploads/award/'.$company->image))
        {
            unlink('uploads/award/'.$company->image);
        }
        $company->delete();
        return redirect()->back()->with('successMsg','Award Successfully Deleted');
    }
}

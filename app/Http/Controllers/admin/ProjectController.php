<?php

namespace App\Http\Controllers\admin;

use App\Gmp;
use App\Project;
use App\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company =   Project::all();
        return view('admin.project.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
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
            if (!file_exists('uploads/project'))
            {
                mkdir('uploads/project', 0777 , true);
            }
            $image->move('uploads/project',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $company = new Project();
        $company->title = $request->title;
        $company->url = $request->url;
        $company->short = $request->short;
        $company->description = $request->description;
        $company->slug = $slug;
        $company->image = $imagename;
        $company->save();
        return redirect()->route('project.index')->with('successMsg','Pipeline Project Successfully Saved');

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
        $company =   Project::find($id);
        return view('admin/project/edit',compact('company'));
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
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $company = Project::find($id);
        if (isset($image))
        {
            $currentDate = \Carbon\Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/project'))
            {
                mkdir('uploads/project', 0777 , true);
            }
            $image->move('uploads/project',$imagename);
        }else {
            $imagename = $company->image;
        }

        $company->title = $request->title;
        $company->url = $request->url;
        $company->image = $imagename;
        $company->slug = $slug;
        $company->short = $request->short;
        $company->description = $request->description;
        $company->save();
        return redirect()->route('project.index')->with('successMsg','Project Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Project::find($id);
        if (file_exists('uploads/project/'.$company->image))
        {
            unlink('uploads/project/'.$company->image);
        }
        $company->delete();
        return redirect()->back()->with('successMsg','Project Successfully Deleted');
    }
}

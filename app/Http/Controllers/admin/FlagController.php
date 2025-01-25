<?php

namespace App\Http\Controllers\admin;

use App\CompanyManagement;
use App\Flag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flag.create');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company =   Flag::all();
        return view('admin.flag.index',compact('company'));
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
            if (!file_exists('uploads/flag'))
            {
                mkdir('uploads/flag', 0777 , true);
            }
            $image->move('uploads/flag',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $company = new Flag();
        $company->title = $request->title;
        $company->url = $request->url;
        $company->type = $request->type;
        $company->sequence = $request->sequence;
        $company->image = $imagename;
        $company->save();
        return redirect()->route('flag.index')->with('successMsg','Flag Successfully Saved');

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
        $company =   Flag::find($id);
        return view('admin/flag/edit',compact('company'));
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
        $company = Flag::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/company'))
            {
                mkdir('uploads/company', 0777 , true);
            }
            $image->move('uploads/company',$imagename);
        }else {
            $imagename = $company->image;
        }

        $company->title = $request->title;
        $company->url = $request->url;
        $company->type = $request->type;
        $company->sequence = $request->sequence;
        $company->image = $imagename;
        $company->save();
        return redirect()->route('flag.index')->with('successMsg','Flag Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Flag::find($id);
        if (file_exists('uploads/flag/'.$company->image))
        {
            unlink('uploads/flag/'.$company->image);
        }
        $company->delete();
        return redirect()->back()->with('successMsg','Flag Successfully Deleted');
    }
}

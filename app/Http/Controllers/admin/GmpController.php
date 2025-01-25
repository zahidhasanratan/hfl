<?php

namespace App\Http\Controllers\admin;

use App\CompanyManagement;
use App\Gmp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class GmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company =   Gmp::all();
        return view('admin.gmp.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gmp.create');
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
            if (!file_exists('uploads/gmp'))
            {
                mkdir('uploads/gmp', 0777 , true);
            }
            $image->move('uploads/gmp',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $company = new Gmp();
        $company->title = $request->title;
        $company->url = $request->url;
        $company->image = $imagename;
        $company->save();
        return redirect()->route('gmp.index')->with('successMsg','GMP Accreditation Successfully Saved');

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
        $company =   Gmp::find($id);
        return view('admin/gmp/edit',compact('company'));
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
        $company = Gmp::find($id);
        if (isset($image))
        {
            $currentDate = \Carbon\Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/gmp'))
            {
                mkdir('uploads/gmp', 0777 , true);
            }
            $image->move('uploads/gmp',$imagename);
        }else {
            $imagename = $company->image;
        }

        $company->title = $request->title;
        $company->url = $request->url;
        $company->image = $imagename;
        $company->save();
        return redirect()->route('gmp.index')->with('successMsg','GMP Accreditation Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Gmp::find($id);
        if (file_exists('uploads/gmp/'.$company->image))
        {
            unlink('uploads/gmp/'.$company->image);
        }
        $company->delete();
        return redirect()->back()->with('successMsg','GMP Accreditation Successfully Deleted');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Pcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Pcategory::all();
        return view('admin.pcategory.index',compact('categories'));
    }
    public function create()
    {
        return view('admin.pcategory.create');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        $slug = str_slug($request->title);

        $category = new Pcategory();
        $category->title = $request->title;
        $category->slug = $slug;
        $category->save();
        return redirect()->route('pcategory.index')->with('successMsg','Category Successfully Saved');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
        $category = Pcategory::find($id);
        return view('admin.pcategory.edit',compact('category'));
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
            'title' => 'required'
        ]);

        $slug = str_slug($request->title);
        $category = Pcategory::find($id);

        $category->title = $request->title;
        $category->slug = $slug;

        $category->save();
        return redirect()->route('pcategory.index')->with('successMsg','Category Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Pcategory::find($id);

        $categories->delete();
        return redirect()->back()->with('successMsg','Category Successfully Deleted');
    }
}

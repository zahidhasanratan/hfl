<?php

namespace App\Http\Controllers\admin;

use App\Activity;
use App\Overview;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OverviewController extends Controller
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
        return view('admin.overview.create', compact('id'));
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
            'question' => 'required',
        ]);

        $slug = str_slug($request->question);


        $activity = new Overview();
        $activity->question = $request->question;
        $activity->slug = $slug;
        $activity->answare = $request->answare;
        $activity->P_id = $request->P_id;
        $activity->save();
        return redirect()->route('overview.show',$request->P_id)->with('successMsg','Overview Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = Overview::where('P_id', $id)->get();
        return view('admin.overview.index', compact('news', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news =   Overview::find($id);
        return view('admin/overview/edit',compact('news'));
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
            'question' => 'required',
        ]);
        $slug = str_slug($request->title);
        $activity = Overview::find($id);

        $activity->question = $request->question;
        $activity->slug = $slug;
        $activity->answare = $request->answare;
        $activity->P_id = $request->P_id;
        $activity->sequece = $request->sequece;
        $activity->save();
        return redirect()->route('overview.show',$request->P_id)->with('successMsg','Overview Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Overview::find($id);

        $activity->delete();
        return redirect()->back()->with('successMsg','Overview Successfully Deleted');
    }
}

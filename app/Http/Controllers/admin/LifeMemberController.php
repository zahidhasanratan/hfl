<?php

namespace App\Http\Controllers\admin;

use App\Link;
use App\Menu;
use App\News;
use App\video;
use App\Others;
use App\Slider;
use App\Objects;
use App\Service;
use App\Activity;
use App\Category;
use Carbon\Carbon;
use App\LifeMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LifeMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news =   LifeMember::all();
        return view('admin.life.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.life.create');
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
            if (!file_exists('uploads/life'))
            {
                mkdir('uploads/life', 0777 , true);
            }
            $image->move('uploads/life',$imagename);
        }else {
            $imagename = '';
        }
        $service = new LifeMember();
        $service->Name = $request->title;
        $service->slug = $slug;
        $service->LM_No = $request->LM_No;
        $service->Batch = $request->Batch;
        $service->Address = $request->Address;
        $service->Address3 = $request->Address3;
        $service->Address1 = $request->Address1;
        $service->email = $request->email;
        $service->phone = $request->phone;
        $service->image = $imagename;
        $service->save();
        return redirect()->route('life.index')->with('successMsg','HPL Team Successfully Saved');
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
        $news =   LifeMember::find($id);
        return view('admin/life/edit',compact('news'));
    }

    public function view($id)
    {
        $slug = $id;
        $service =   Service::find($id);

        return view('admin/service/view',compact('service','slug'));
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
        $news = LifeMember::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/life'))
            {
                mkdir('uploads/life', 0777 , true);
            }
            $image->move('uploads/life',$imagename);
        }else {
            $imagename = $news->image;
        }

        $news->Name = $request->title;
        $news->slug = $slug;
        $news->LM_No = $request->LM_No;
        $news->Batch = $request->Batch;
        $news->LM_No = $request->LM_No;
        $news->Address = $request->Address;
        $news->Address3 = $request->Address3;
        $news->Address1 = $request->Address1;
        $news->email = $request->email;
        $news->phone = $request->phone;
        $news->image = $imagename;
        $news->save();
        return redirect()->route('life.index')->with('successMsg','HPL Team Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = LifeMember::find($id);
        if (file_exists('uploads/life/'.$service->image))
        {
            unlink('uploads/life/'.$service->image);
        }
        $service->delete();
        return redirect()->back()->with('successMsg','HPL Team Successfully Deleted');
    }

    public function details($slug){
        $news = LifeMember::where('slug',$slug)->first();
        if (!$news) {
            abort(404, 'Life Member not found'); // Return a 404 page
        }
        $contact1  =   Others::find(2);
        $footer2   =   Menu::orderBy('sequence','ASC')
        ->where('footer2',1)
        ->get();
        $top_header  =  Menu::orderBy('sequence','ASC')
        ->where('top_header',1)
        ->get();
       
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        // $contact1  =   Others::orderBy('id','ASC')
        //     ->where('id',2)
        //     ->get();

        return view('frontend/service.details',compact('contact1','top_header','footer2','main','objects2','footer','prnews','news'));
    }

    // public function details($slug){
    // {
    //     $news = LifeMember::where('slug',$slug)->first();
    //     $sliders = Slider::all();
    //     $categories = Category::orderBy('id','DESC')->limit(2)->get();
    //     $video   =   video::orderBy('id','DESC')->limit(2)->get();
    //     $links  =   Link::all();
    //     $main   =   Menu::orderBy('sequence','ASC')
    //         ->where('display',1)
    //         ->get();

    //     $footer   =   Menu::orderBy('sequence','ASC')
    //         ->where('footer1',1)
    //         ->get();
    //     $footer2   =   Menu::orderBy('sequence','ASC')
    //         ->where('footer2',1)
    //         ->get();
    //     $top_header  =  Menu::orderBy('sequence','ASC')
    //         ->where('top_header',1)
    //         ->get();
    //     $activity   =   Activity::orderBy('id','DESC')

    //         ->get();
    //     $contact1  =   Others::orderBy('id','ASC')
    //         ->where('id',2)
    //         ->get();
    //     $service   =   Service::orderBy('id','ASC')

    //         ->get();
    //     $news   =   News::orderBy('id','DESC')
    //         ->limit(7)
    //         ->get();
    //     $objects  =   Objects::orderBy('id','ASC')
    //         ->where('id',1)
    //         ->get();
    //     $objects2  =   Objects::orderBy('id','ASC')
    //         ->where('id',2)
    //         ->get();
    //     $contact1  =   Others::find(2);
    //     $about  =   Objects::find(5);
    //     $aboutmissionvission  =   Objects::find(4);
    //     $contact2  =   Others::orderBy('id','ASC')
    //         ->where('id',2)
    //         ->get();
    //     $headoffice  =   Others::orderBy('id','ASC')
    //         ->where('id',4)
    //         ->get();

    //     return view('frontend/service.details',compact('news','about','aboutmissionvission','top_header','sliders','video','contact1','activity','service','categories','news','main','links','footer','footer2','objects','objects2','contact1','contact2','headoffice'));
    // }
}

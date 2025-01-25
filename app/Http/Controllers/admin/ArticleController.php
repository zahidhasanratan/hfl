<?php

namespace App\Http\Controllers\admin;

use App\Article;
use App\Menu;
use App\News;
use App\Objects;
use App\Others;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news =   Article::all();
        return view('admin.article.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
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
            if (!file_exists('uploads/article'))
            {
                mkdir('uploads/article', 0777 , true);
            }
            $image->move('uploads/article',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $news = new Article();
        $news->title = $request->title;
        $news->sub_title = $request->sub_title;
        $news->slug = $slug;
        $news->short = $request->short;
        $news->description = $request->description;
        $news->image = $imagename;
        $news->save();
        return redirect()->route('article.index')->with('successMsg','Article Successfully Saved');

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
        $news =   Article::find($id);
        return view('admin/article/edit',compact('news'));
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
        $news = Article::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/article'))
            {
                mkdir('uploads/article', 0777 , true);
            }
            $image->move('uploads/article',$imagename);
        }else {
            $imagename = $news->image;
        }

        $news->title = $request->title;
        $news->sub_title = $request->sub_title;
        $news->slug = $slug;
        $news->short = $request->short;
        $news->description = $request->description;
        $news->image = $imagename;
        $news->save();
        return redirect()->route('article.index')->with('successMsg','Article Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Article::find($id);
        if (file_exists('uploads/article/'.$news->image))
        {
            unlink('uploads/article/'.$news->image);
        }
        $news->delete();
        return redirect()->back()->with('successMsg','News Successfully Deleted');
    }
    public function details($slug){
        $news = Article::where('slug',$slug)->first();

        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
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
        return view('frontend/article.details',compact('objects2','contact2','headoffice','news','main','contact1','footer'));
    }
}

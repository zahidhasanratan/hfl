<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu;
use App\News;
use App\Objects;
use App\Others;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/news')) {
                mkdir('uploads/news', 0777, true);
            }
            $image->move('uploads/news', $imagename);
        } else {
            $imagename = 'dafault.png';
        }

        $news = new News();
        $news->title = $request->title;
        $news->url = $request->url;
        $news->sub_title = $request->sub_title;
        $news->slug = $slug;
        $news->News = $request->News;
        $news->Media = $request->Media;
        $news->Event = $request->Event;

        $news->short = $request->short;
        $news->description = $request->description;
        $news->image = $imagename;
        $news->save();
        return redirect()->route('news.index')->with('successMsg', 'News Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $news = News::find($id);
        return view('admin/news/edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $news = News::find($id);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/news')) {
                mkdir('uploads/news', 0777, true);
            }
            $image->move('uploads/news', $imagename);
        } else {
            $imagename = $news->image;
        }

        $news->title = $request->title;
        $news->sub_title = $request->sub_title;
        $news->url = $request->url;
        $news->slug = $slug;
        $news->short = $request->short;
        $news->News = $request->News;
        $news->Media = $request->Media;
        $news->Event = $request->Event;
        $news->description = $request->description;
        $news->image = $imagename;
        $news->save();
        return redirect()->route('news.index')->with('successMsg', 'News Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $news = News::find($id);
        if (file_exists('uploads/news/' . $news->image)) {
            unlink('uploads/news/' . $news->image);
        }
        $news->delete();
        return redirect()->back()->with('successMsg', 'News Successfully Deleted');
    }
    public function details($slug) {
        $news = News::where('slug', $slug)->first();

        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::find(2);
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        return view('frontend/news.details', compact('objects2', 'top_header', 'footer2', 'contact2', 'headoffice', 'news', 'main', 'contact1', 'footer'));
    }
}

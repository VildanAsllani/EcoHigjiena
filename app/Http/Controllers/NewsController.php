<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Str;
use DateTime;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('dashboard.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = new DateTime();
        $request->validate([
            'title' => 'required|min:5',
            'text' => 'required|min:5',
            'image_name' => 'required|mimes:jpeg,jpg,png',
        ]);
        $slug = Str::slug($request->title, '-');
        $data = $request->all();

        $filename = time().'-'.$request->file('image_name')->getClientOriginalName();
        $request->file('image_name')->storeAs('public/cover_image', $filename);

        $data['slug'] = $slug.'-'.$now->format('d-m-Y m-i-s');
        $data['image_name']=$filename;
        $data['user_id'] = 1;
        if(News::create($data))
        return redirect()->route('news.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    // public function show(News $news)
    // {
    //     return $news->slug;
    // }
    public function show(News $news)
    {
        // return $news->slug;
        // $news = News::findOrFail($news->id);

        // return $news;
        return view('dashboard.news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news = News::findOrFail($news->id);
        if(Storage::delete('public/cover_image/'.$news->image_name)){
            $news->delete();
        }
        return redirect()->route('news.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\News;
use Validator;
use Illuminate\Http\Request;
use Str;
use DateTime;
use Illuminate\Support\Facades\Storage;
Use Alert;

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
    // public function check_slug(Request $request){
    //     // $now = new DateTime();
    //     // $slug = Str_slug($request->title);
    //     // $slug = $slug.'-'.$now->format('d-m-Y m-i-s');
    //     // return response()->json(['slug' => $slug]);
    //     dd($request->all());
    //     // return 'none';
    // }

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
        toast('Your Post has been created!','success');
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
        $news = News::findOrFail($news->id);
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
        $news = News::findOrFail($news->id);
        return view('dashboard.news.edit',compact('news'));
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
        $news = News::findOrFail($news->id);
        $now = new DateTime();
        $request->validate([
            'title' => 'required|min:5',
            'text' => 'required|min:5',
            'image_name' => 'mimes:jpeg,jpg,png',
        ]);
        $slug = Str::slug($request->title, '-');
        $slug = $slug.'-'.$now->format('d-m-Y m-i-s');
        $data = $request->all();

        $news->title = $request->title;
        if ($request->hasFile('image_name')) {
            Storage::delete('public/cover_image/'.$news->image_name);
            $news->title = $request->title;
            $filename = time().'-'.$request->file('image_name')->getClientOriginalName();
            $request->file('image_name')->storeAs('public/cover_image', $filename);

            $news->image_name = $filename;
        }
        $news->slug = $slug;
        $news->text = $request->text;
        $news->user_id = 1;
        $news->update();
        toast('Your Post has been updated!','success');
        return redirect()->route('news.index');
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
        toast('Your Post has been deleted!','success');
        return redirect()->route('news.index');
    }
}

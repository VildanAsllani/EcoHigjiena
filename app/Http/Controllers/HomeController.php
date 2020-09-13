<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Auctions;
use App\Comments;
use App\Gallery;
use App\Subscribers;

Use Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        // toast('Your Post as been submited!','success');
        $news = News::all();
        $auctions = Auctions::all();
        $comments = Comments::all();
        $notConfirmed = Comments::where('confirmed',0)->count();
        $gallery = Gallery::all();
        $subscribers = Subscribers::all();
        return view('dashboard.index',compact('news','auctions','comments','gallery','subscribers','notConfirmed'));
    }
}

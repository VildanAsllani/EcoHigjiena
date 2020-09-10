<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
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
        return view('dashboard.index',compact('news'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Auctions;
use Illuminate\Http\Request;

use Str;
use DateTime;
use Illuminate\Support\Facades\Storage;
Use Alert;
use App\Subscribers;
use App\Mail\New_Auction_Post;
use Mail;

class AuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auctions::orderBy('created_at','desc')->get();
        // dd($auctions);
        return view('dashboard.auctions.index',compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.auctions.create');
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
            'open_until' => 'required|date',
            // 'attachment_name' => 'required',
        ]);
        $slug = Str::slug($request->title, '-');
        $data = $request->all();

        $filename = time().'-'.$request->file('image_name')->getClientOriginalName();
        $request->file('image_name')->storeAs('public/cover_image', $filename);

        if ($request->hasFile('attachment_name')) {
            $attachmentname = time().'-'.$request->file('attachment_name')->getClientOriginalName();
            $request->file('attachment_name')->storeAs('public/attachment_name', $attachmentname);
            $data['attachment_name']=$attachmentname;
        }

        $data['slug'] = $slug.'-'.$now->format('d-m-Y m-i-s');
        $data['image_name']=$filename;
        $data['user_id'] = 1;

        if($auctions = Auctions::create($data)){
            $subscribers= Subscribers::all();
            foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new New_Auction_Post($auctions));
            }
            toast('Your Auction has been created!','success');
        }
        return redirect()->route('auctions.index');

    }

    public function show(Auctions $auction)
    {
        $auction = Auctions::findOrFail($auction->id);
        // dd($auction);
        return view('dashboard.auctions.show',compact('auction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auctions  $auctions
     * @return \Illuminate\Http\Response
     */
    public function edit(Auctions $auction)
    {
        $auction = Auctions::findOrFail($auction->id);
        return view('dashboard.auctions.edit',compact('auction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auctions  $auctions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auctions $auction)
    {
        $auction = Auctions::findOrFail($auction->id);
        $now = new DateTime();
        $request->validate([
            'title' => 'required|min:5',
            'text' => 'required|min:5',
            'image_name' => 'mimes:jpeg,jpg,png',
        ]);

        $slug = Str::slug($request->title, '-');
        $slug = $slug.'-'.$now->format('d-m-Y m-i-s');
        $data = $request->all();

        $auction->title = $request->title;

        if ($request->hasFile('image_name')) {
            Storage::delete('public/cover_image/'.$auction->image_name);
            
            $filename = time().'-'.$request->file('image_name')->getClientOriginalName();
            $request->file('image_name')->storeAs('public/cover_image', $filename);

            $auction->image_name = $filename;
        }
        if($request->hasFile('attachment_name')){
            Storage::delete('public/attachment_name/'.$auction->attachment_name);
            
            $attachmentname = time().'-'.$request->file('attachment_name')->getClientOriginalName();
            $request->file('attachment_name')->storeAs('public/attachment_name', $attachmentname);

            $auction->attachment_name = $attachmentname;
        }
        $auction->slug = $slug;
        $auction->text = $request->text;
        $auction->user_id = 1;
        $auction->update();
        toast('Your Auction has been updated!','success');
        return redirect()->route('auctions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auctions  $auctions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auctions $auction)
    {
        $auction = Auctions::findOrFail($auction->id);
        if(Storage::delete('public/cover_image/'.$auction->image_name)){
            Storage::delete('public/attachment_name/'.$auction->attachment_name);
            $auction->delete();
        }
        toast('Your Auction has been deleted!','success');
        return redirect()->route('auctions.index');
    }
}

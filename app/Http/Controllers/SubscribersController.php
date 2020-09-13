<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribers;

class SubscribersController extends Controller
{
    public function index(){
        // return 'subscribers';
        $subscribers = Subscribers::all();
        return view('dashboard/subscribers.index',compact('subscribers'));
    }
    public function destroy(Subscribers $subscriber){
        $subscriber = Subscribers::findOrFail($subscriber->id);

        toast('Subscriber was deleted','success');
        $subscriber->delete();
        return redirect()->back();
    }
}

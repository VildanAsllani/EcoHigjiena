<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index(){
        // $user = User::findorfail(Auth::id());s
        // // dd($user);
        return view('dashboard.profile.index');
    }
    public function update(Request $request, User $user){
        $request->validate([
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user->password = Hash::make($request->password);
        if($user->save()){
            return 'Password changes';
        }
        else{
            return 'not working';
        }
    }
}

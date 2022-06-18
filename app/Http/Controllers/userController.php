<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function login(Request $request) {
        $user = User::where(['email'=>$request->email])->first();
        if(!$user || !($request->password == $user->password)) {
            return "don't match";
        } else {
            $request->session()->put('user',$user);
            return redirect('/');
        }
    }
}

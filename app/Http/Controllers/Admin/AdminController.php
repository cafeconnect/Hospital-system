<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dologin(Request $req){
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:15'
        ]);
        $check = $req->only('email','password');
        if (Auth::guard('admin')->attempt($check)) {
            return redirect()->route('admin.home')->with('success','Welcome to dashboard');
        }
        else{
            return redirect()->back()->with('error','Incorrect Password or Email');
        }

    }
}

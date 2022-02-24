<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TheraphistController extends Controller
{
    public function index(){
        $theraphist = User::all();
        return view('admin.theraphist.index',compact('theraphist', $theraphist));
    }
    public function create(){
        return view('admin.theraphist.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:15',
            'cpassword'=>'required|same:password'
        ],[
            'cpassword.required'=>'The confirm field is required',
            'cpassword.same'=>'The confirm password must match'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $data = $user->save();
        if ($data) {
            return redirect()->back()->with('success','Registration done succesfully');
        }
        return redirect()->back()->with('error','Registration Failed');

    }
}

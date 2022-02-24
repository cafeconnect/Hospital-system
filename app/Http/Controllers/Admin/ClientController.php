<?php

namespace App\Http\Controllers\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index(){
        $client = Client::all();
        return view('admin.client.index',compact('client', $client));
    }

    public function create(){
        return view('admin.client.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email'
        ]);
        $client = new Client();
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $data = $client->save();
        if ($data) {
            return redirect()->back()->with('success','Client Created');
        }
        return redirect()->back()->with('error','Created Failed');

    }

}

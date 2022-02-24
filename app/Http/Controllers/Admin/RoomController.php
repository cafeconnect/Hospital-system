<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index(){
        $room = Room::all();
        return view('admin.room.index',compact('room', $room));
    }

    public function create(){
        return view('admin.room.create');
    }

    public function store(Request $request){
        $request->validate([
            'room'=>'required',
        ]);
        $room = new Room();
        $room ->room_no = $request->room;
        $data = $room ->save();
        if ($data) {
            return redirect()->back()->with('success','Room Created');
        }
        return redirect()->back()->with('error','Created Failed');

    }

}
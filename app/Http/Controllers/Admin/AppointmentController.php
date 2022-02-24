<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Client;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;


class AppointmentController extends Controller
{
    public function index(){
       
        $appointment = Appointment::all();
        return view('admin.appointment.index',compact('appointment', $appointment));
    }

    public function create(){
        $user = User::all();
        $client = Client::all();
        $room = Room::all();
        return view('admin.appointment.create',compact(['user','client','room']));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'user_id'=>'required',
            'client_id'=>'required',
            'room_id'=>'required'
        ]);
        $appointment = new Appointment();
        $appointment->name = $request->name;
        $appointment->user_id = $request->user_id;
        $appointment->client_id = $request->client_id;
        $appointment->room_id = $request->room_id;
        $appointment->date = Carbon::now();

        $data = $appointment->save();
        if ($data) {
            return redirect()->back()->with('success','Appointment Created');
        }
        return redirect()->back()->with('error','Created Failed');

    }

    public function edit($id){
        $appointment = Appointment::find($id);
        return view('admin.appointment.edit',compact('appointment'));
    }

    public function destroy($id){
        $destroy= Appointment::find($id);
        $destroy->delete();
        return back();
    }
   

}

<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{

    public function index(){
        $appointment = Appointment::all();
        return view('user.index',compact('appointment', $appointment));
    }
    public function update(Request $request)
    {
        if ($request->ajax()) {
            Appointment::find($request->pk)->update([
                $request->name => $request->value
            ]);
            return response()->json(['success' => true]);
        }
    }
}

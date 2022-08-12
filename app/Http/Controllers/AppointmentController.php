<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function bookAppointment($artiste){
        $data = Artist::where('name', $artiste)->first();
       // dd($data);
        return view('frontend.book', compact('data'));
    }

    public function saveAppointment(Request $request, $id){
    //    dd($request);

        Appointment::create([
            'user_id' => Auth::user()->id,
            'artist_id' => $id,
            'date' => $request->appt_date,
            'time' => $request->appt_time,
            'status' => 'Pending',
        ]);

        return redirect()->route('dashboard');
    }

    public function approveAppointment($status){

        $appoint = Appointment::find($status);
        $appoint->status = 'Approved';
        $appoint->save();

        return redirect()->route('dashboard');
    }
}

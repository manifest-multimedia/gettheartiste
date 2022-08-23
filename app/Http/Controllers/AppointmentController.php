<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function approveAppointment($id){

        $appoint = Appointment::find($id);
        $appoint->status = 'Approved';
        $appoint->save();

        return redirect()->route('dashboard')->with('success','Appointment has been approved');
    }

    public function unapproveAppointment($id){

        $appoint = Appointment::find($id);
        $appoint->status = 'Unapprove';
        $appoint->save();

        return redirect()->route('dashboard')->with('success','Appointment has been unapproved');
    }

    public function cancelAppointment($id){
        alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.')->showConfirmButton('Confirm', '#3085d6');
        $appoint = Appointment::find($id);
        $appoint->status = 'cancelled';
        $appoint->save();
        return redirect()->route('dashboard')->with('success','Appointment has been cancelled');
    }

    public function cancelByUserAppointment($id){

        $appoint = Appointment::find($id);
        $appoint->status = 'cancelled';
        $appoint->save();

        return redirect()->route('dashboard')->with('success','Appointment has been cancelled by User');
    }

    public function deleteAppointment($id){
        Alert::question('Question Title', 'Question Message');
        $appoint = Appointment::find($id)->delete();

        return redirect()->route('dashboard')->with('success','Appointment has been deleted');;
    }
}

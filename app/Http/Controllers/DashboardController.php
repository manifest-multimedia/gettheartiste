<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class DashboardController extends Controller

{
    public function __invoke()

    {
        if(Gate::any(['isSuperAdmin', 'isAdmin', 'isUser', 'isStaff']))

            {
                $appointments = Appointment::latest()->get();
                       // dd($appointments);
                return view('admin.appointments', compact('appointments'));
            }

            else {
                abort(403, 'Unauthorized Action');
            }



    }

    public function accountUpgrade(){

        $email=Auth::user()->email;

        return view('settings.upgrade', compact('email'));

    }
}

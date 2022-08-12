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

            {   $role=Auth::user()->user_role;

                switch($role) {

                    case "superadmin":
                        return view('dashboards.superadmin');
                    break;

                    case "admin":
                        $appointments = Appointment::get();
                        return view('admin.appointments', compact('appointments'));
                    break;

                    case "user":
                        $appointments = Appointment::get();
                        return view('appointments', compact('appointments'));
                    break;

                    case "staff":
                        return view('dashboards.staff');
                    break;

                    default:

                    abort(403, 'You are not authorized to access this resource.');

                }
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

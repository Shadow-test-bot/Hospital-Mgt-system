<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class DoctorController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->usertype == '2') {
            $doctor = Doctor::where('user_id', Auth::id())->first();
            $appointments = Appointment::where('doctor', $doctor->name)->get();
            return view('doctor.dashboard', compact('doctor', 'appointments'));
        }
        return redirect('/home');
    }

    public function patients()
    {
        if (Auth::check() && Auth::user()->usertype == '2') {
            $doctor = Doctor::where('user_id', Auth::id())->first();
            $appointments = Appointment::where('doctor', $doctor->name)->with('user')->get();
            $patients = $appointments->map(function ($appointment) {
                return User::find($appointment->user_id);
            })->unique('id');
            return view('doctor.patients', compact('patients'));
        }
        return redirect('/home');
    }

    public function schedule()
    {
        if (Auth::check() && Auth::user()->usertype == '2') {
            $doctor = Doctor::where('user_id', Auth::id())->first();
            return view('doctor.schedule', compact('doctor'));
        }
        return redirect('/home');
    }

    public function updateSchedule(Request $request)
    {
        if (Auth::check() && Auth::user()->usertype == '2') {
            $doctor = Doctor::where('user_id', Auth::id())->first();
            $doctor->working_hours = $request->working_hours;
            $doctor->save();
            return redirect()->back()->with('message', 'Schedule updated successfully');
        }
        return redirect('/home');
    }
}
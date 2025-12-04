<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Notifications\AppointmentScheduledNotification;

class DoctorController extends Controller
{
    public function appointments()
    {
        if (Auth::check() && Auth::user()->usertype == '2') {
            $doctor = Doctor::where('user_id', Auth::id())->first();
            $appointments = Appointment::where('doctor', $doctor->name)->with('user')->get();
            return view('doctor.appointments', compact('doctor', 'appointments'));
        }
        return redirect('/home');
    }

    public function userSchedule()
    {
        if (Auth::check() && Auth::user()->usertype == '2') {
            $doctor = Doctor::where('user_id', Auth::id())->first();
            // Logic for scheduling with users, perhaps showing available slots or booking
            return view('doctor.user_schedule', compact('doctor'));
        }
        return redirect('/home');
    }

    public function storeUserSchedule(Request $request)
    {
        if (Auth::check() && Auth::user()->usertype == '2') {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'date' => 'required|date',
                'message' => 'required|string',
            ]);

            $doctor = Doctor::where('user_id', Auth::id())->first();
            $user = User::find($request->user_id);

            $appointment = new Appointment();
            $appointment->name = $user->name;
            $appointment->email = $user->email;
            $appointment->phone = $user->phone ?? '';
            $appointment->doctor = $doctor->name;
            $appointment->date = $request->date;
            $appointment->message = $request->message;
            $appointment->status = 'Approved'; // Since doctor is scheduling
            $appointment->user_id = $user->id;
            $appointment->department_id = $doctor->department_id;
            $appointment->save();

            // Send notification to the user
            $user->notify(new AppointmentScheduledNotification($appointment, $doctor));

            return redirect()->back()->with('message', 'Appointment scheduled successfully');
        }
        return redirect('/home');
    }

    public function doctorSchedule()
    {
        if (Auth::check() && Auth::user()->usertype == '2') {
            $doctor = Doctor::where('user_id', Auth::id())->first();
            return view('doctor.doctor_schedule', compact('doctor'));
        }
        return redirect('/home');
    }

    public function updateDoctorSchedule(Request $request)
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
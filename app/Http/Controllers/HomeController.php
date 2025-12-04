<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Doctor;

use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user && $user->usertype == '0'){
                $doctor = Doctor::all();

                return view('user.home', compact('doctor'));
            }
            elseif($user->usertype == '1'){ // Admin
                return redirect('admin/dashboard');
            }
            elseif($user->usertype == '2'){ // Doctor
                return redirect('doctor/appointments');
            }
            else{
                return redirect('/');
            }

        }
        else {
            return redirect('/');
        }
    }

    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user && $user->usertype == '0'){
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            }
            elseif($user->usertype == '1'){ // Admin
                return redirect('admin/dashboard');
            }
            elseif($user->usertype == '2'){ // Doctor
                return redirect('doctor/appointments');
            }
            else{
                return redirect('/');
            }
        }
        else{
            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    public function showAppointmentForm()
    {
        $doctor = Doctor::all();
        return view('user.appointment', compact('doctor'));
    }

    public function appointment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'doctor' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = new Appointment;

        $doctor = Doctor::where('name', $request->doctor)->first();
        $department_id = $doctor ? $doctor->department_id : null;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->number;
        $data->doctor = $request->doctor;
        $data->date = $request->date;
        $data->message = $request->message;
        $data->status = 'In Progress';
        $data->user_id = Auth::user()->id;
        $data->department_id = $department_id;

        $data->save();

        return redirect()->back()->with('message',
        'Your appointment request is successful, we shall contact you soon');

    }

    public function myappointments()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user && $user->usertype == 0)
            {
                $userid = $user->id;
                $appoint = Appointment::where('user_id', $userid)->get();

                return view('user.my_appointments', compact('appoint'));
            }
            else
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data = Appointment::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function doctor_view(Request $request)
    {
        $query = $request->get('q');
        if($query){
            $doctor = Doctor::where('name', 'like', '%' . $query . '%')
                            ->orWhere('speciality', 'like', '%' . $query . '%')
                            ->get();
        } else {
            $doctor = Doctor::all();
        }
        return view('user.doctor_view', compact('doctor'));
    }

    public function doctor_detail($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('user.doctor_detail', compact('doctor'));
    }

    public function news()
    {
        return view('user.news');
    }

    public function notifications()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user && $user->usertype == 0)
            {
                $notifications = $user->notifications()->paginate(10);
                return view('user.notifications', compact('notifications'));
            }
            else
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function markNotificationRead($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $notification = $user->notifications()->find($id);
            if($notification) {
                $notification->markAsRead();
            }
            return redirect()->back();
        }
        return redirect('/login');
    }
}
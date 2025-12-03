<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Department;
use Notification;
use App\Notifications\MyFirstNotification;

class AdminController extends Controller
{
    public function dashboard()
    {
        if(Auth::check() && Auth::user()->usertype == 1)
        {
            $totalDoctors = Doctor::count();
            $totalPatients = User::where('usertype', '0')->count();
            $totalAppointments = Appointment::count();
            $approvedAppointments = Appointment::where('status', 'Approved')->count();
            $pendingAppointments = Appointment::where('status', 'In Progress')->count();
            $cancelledAppointments = Appointment::where('status', 'Cancelled')->count();
            $totalDepartments = Department::count();

            return view('admin.dashboard', compact(
                'totalDoctors', 'totalPatients', 'totalAppointments',
                'approvedAppointments', 'pendingAppointments', 'cancelledAppointments', 'totalDepartments'
            ));
        }
        else
        {
            return redirect('home');
        }
    }

    public function addview()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user && $user->usertype == 1)
            {
                return view('admin.add_doctor');
            }
            else
            {
                return redirect('home');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function upload(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'room' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->usertype = '2'; // doctor
        $user->save();

        // Create doctor
        $doctor = new Doctor;

        $image = $request->file('file');

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('doctorimage'), $imagename);

        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->user_id = $user->id;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor added successfully! ');
    }

    public function showappointments()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user && ($user->usertype == 1 || $user->usertype == '2'))
            {
                if($user->usertype == 1){
                    $data = Appointment::all();
                } else {
                    // For doctor, find doctor record
                    $doctor = Doctor::where('user_id', $user->id)->first();
                    if($doctor){
                        $data = Appointment::where('doctor', $doctor->name)->get();
                    } else {
                        $data = collect();
                    }
                }
                return view('admin.showappointments',compact('data'));
            }
            else
            {
                return redirect('home');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function approve($id)
    {
        $data=Appointment::find($id);
        $data->status='Approved';
        $data->save();

        return redirect()->back();
    }

    public function cancel($id)
    {
        $data=Appointment::find($id);

        $data->status='Cancelled';
        $data->save();

        return redirect()->back();
    }

    public function showdoctors()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user && $user->usertype == 1)
            {
                $data=Doctor::all();
                return view('admin.showdoctors', compact('data'));
            }
            else
            {
                return redirect('home');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function deletedoctor($id)
    {
        $data=Doctor::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $data=Doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor=Doctor::find($id);

        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;
        $doctor->education=$request->education;
        $doctor->experience_years=$request->experience_years;
        $doctor->biography=$request->biography;
        $doctor->languages=$request->languages;
        $doctor->certifications=$request->certifications;
        $doctor->awards=$request->awards;
        $doctor->working_hours=$request->working_hours;
        $doctor->address=$request->address;

        $image=$request->file('file');
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('doctorimage'), $imagename);
            $doctor->image=$imagename;
        }
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Updated Successfully!');
    }
    public function emailview($id)
    {
        $data = Appointment::find($id);

        return view('admin.emailview',compact('data'));
    }

    public function sendemail(Request $request, $id)
    {
        $data=Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart

        ];

        Notification::send($data, new MyFirstNotification($details));

        return redirect()->back()->with('message', 'Email sent succesfully!');
    }

    public function showdepartments()
    {
        if(Auth::check() && Auth::user()->usertype == 1)
        {
            $departments = Department::all();
            return view('admin.departments', compact('departments'));
        }
        else
        {
            return redirect('home');
        }
    }

    public function adddepartmentview()
    {
        if(Auth::check() && Auth::user()->usertype == 1)
        {
            return view('admin.add_department');
        }
        else
        {
            return redirect('home');
        }
    }

    public function adddepartment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Department::create($request->only(['name', 'description']));

        return redirect()->back()->with('message', 'Department added successfully!');
    }

    public function editdepartmentview($id)
    {
        if(Auth::check() && Auth::user()->usertype == 1)
        {
            $department = Department::findOrFail($id);
            return view('admin.edit_department', compact('department'));
        }
        else
        {
            return redirect('home');
        }
    }

    public function editdepartment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->only(['name', 'description']));

        return redirect()->back()->with('message', 'Department updated successfully!');
    }

    public function deletedepartment($id)
    {
        if(Auth::check() && Auth::user()->usertype == 1)
        {
            $department = Department::findOrFail($id);
            $department->delete();
            return redirect()->back()->with('message', 'Department deleted successfully!');
        }
        else
        {
            return redirect('home');
        }
    }

    public function showusers()
    {
        if(Auth::check() && Auth::user()->usertype == 1)
        {
            $users = User::all();
            return view('admin.users', compact('users'));
        }
        else
        {
            return redirect('home');
        }
    }

    public function activateuser($id)
    {
        if(Auth::check() && Auth::user()->usertype == 1)
        {
            $user = User::findOrFail($id);
            $user->status = true;
            $user->save();
            return redirect()->back()->with('message', 'User activated successfully!');
        }
        else
        {
            return redirect('home');
        }
    }

    public function deactivateuser($id)
    {
        if(Auth::check() && Auth::user()->usertype == 1)
        {
            $user = User::findOrFail($id);
            $user->status = false;
            $user->save();
            return redirect()->back()->with('message', 'User deactivated successfully!');
        }
        else
        {
            return redirect('home');
        }
    }
}

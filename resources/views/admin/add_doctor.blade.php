@extends('admin.layout')

@section('title', 'Add Doctor')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Add New Doctor</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Doctor Information</h5>
            </div>
            <div class="card-body">
                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Doctor Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter doctor name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="number" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="number" name="number" placeholder="Enter phone number" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="department_id" class="form-label">Department</label>
                            <select name="department_id" class="form-select" id="department_id" required>
                                <option value="">--Select Department--</option>
                                @foreach(\App\Models\Department::all() as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="speciality" class="form-label">Speciality</label>
                            <select name="speciality" class="form-select" id="speciality">
                                <option value="">--Select Speciality--</option>
                                <option value="skin">Skin</option>
                                <option value="orthopaedic">Orthopaedic</option>
                                <option value="paediatric">Paediatric</option>
                                <option value="heart">Heart</option>
                                <option value="optician">Optician</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="room" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="room" name="room" placeholder="Enter room number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="working_hours" class="form-label">Working Hours</label>
                        <textarea class="form-control" id="working_hours" name="working_hours" rows="3" placeholder="e.g., Monday-Friday: 9:00 AM - 5:00 PM&#10;Saturday: 9:00 AM - 1:00 PM&#10;Sunday: Closed"></textarea>
                        <div class="form-text">Optional: Describe the doctor's working schedule.</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                        <div class="col-md-6">
                            <label for="file" class="form-label">Doctor Image</label>
                            <input type="file" class="form-control" id="file" name="file" accept="image/*" required>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Add Doctor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
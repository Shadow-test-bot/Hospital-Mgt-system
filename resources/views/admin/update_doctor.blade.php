@extends('admin.layout')

@section('title', 'Update Doctor')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Update Doctor: {{ $data->name }}</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h5>Doctor Information</h5>
            </div>
            <div class="card-body">
                <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Doctor Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="number" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="number" name="number" value="{{ $data->phone }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="department_id" class="form-label">Department</label>
                            <select name="department_id" class="form-select" id="department_id" required>
                                <option value="">--Select Department--</option>
                                @foreach(\App\Models\Department::all() as $department)
                                    <option value="{{ $department->id }}" {{ $data->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="speciality" class="form-label">Speciality</label>
                            <select name="speciality" class="form-select" id="speciality">
                                <option value="skin" {{ $data->speciality == 'skin' ? 'selected' : '' }}>Skin</option>
                                <option value="orthopaedic" {{ $data->speciality == 'orthopaedic' ? 'selected' : '' }}>Orthopaedic</option>
                                <option value="paediatric" {{ $data->speciality == 'paediatric' ? 'selected' : '' }}>Paediatric</option>
                                <option value="heart" {{ $data->speciality == 'heart' ? 'selected' : '' }}>Heart</option>
                                <option value="optician" {{ $data->speciality == 'optician' ? 'selected' : '' }}>Optician</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="room" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="room" name="room" value="{{ $data->room }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="experience_years" class="form-label">Years of Experience</label>
                            <input type="number" class="form-control" id="experience_years" name="experience_years" value="{{ $data->experience_years }}" placeholder="Enter years of experience">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="languages" class="form-label">Languages Spoken</label>
                            <input type="text" class="form-control" id="languages" name="languages" value="{{ $data->languages }}" placeholder="e.g., English, Spanish, French">
                        </div>
                        <div class="col-md-6">
                            <label for="working_hours" class="form-label">Working Hours</label>
                            <textarea class="form-control" id="working_hours" name="working_hours" rows="2" placeholder="e.g., Mon-Fri: 9AM-5PM, Sat: 9AM-1PM">{{ $data->working_hours }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="education" class="form-label">Education & Qualifications</label>
                        <textarea class="form-control" id="education" name="education" rows="3" placeholder="Enter doctor's education and qualifications">{{ $data->education }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="biography" class="form-label">Biography</label>
                        <textarea class="form-control" id="biography" name="biography" rows="4" placeholder="Enter doctor's biography">{{ $data->biography }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="certifications" class="form-label">Certifications</label>
                        <textarea class="form-control" id="certifications" name="certifications" rows="3" placeholder="Enter doctor's certifications">{{ $data->certifications }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="awards" class="form-label">Awards & Recognition</label>
                        <textarea class="form-control" id="awards" name="awards" rows="3" placeholder="Enter doctor's awards and recognition">{{ $data->awards }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter doctor's address">{{ $data->address }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="working_hours" class="form-label">Working Hours</label>
                        <textarea class="form-control" id="working_hours" name="working_hours" rows="3" placeholder="e.g., Monday-Friday: 9:00 AM - 5:00 PM&#10;Saturday: 9:00 AM - 1:00 PM&#10;Sunday: Closed">{{ $data->working_hours }}</textarea>
                        <div class="form-text">Describe the doctor's working schedule.</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Current Image</label>
                            <div>
                                @if($data->image)
                                    <img src="{{ asset('doctorimage/' . $data->image) }}" alt="{{ $data->name }}" height="150" width="150" class="img-thumbnail">
                                @else
                                    <span class="text-muted">No image available</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="file" class="form-label">Change Image</label>
                            <input type="file" class="form-control" id="file" name="file" accept="image/*">
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>Update Doctor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
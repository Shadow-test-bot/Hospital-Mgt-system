@extends('doctor.layout')

@section('title', 'My Schedule')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Update My Schedule</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Current Schedule</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('doctor/doctor-schedule') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="working_hours" class="form-label">Working Hours</label>
                        <textarea class="form-control" id="working_hours" name="working_hours" rows="4" placeholder="e.g., Monday-Friday: 9:00 AM - 5:00 PM&#10;Saturday: 9:00 AM - 1:00 PM&#10;Sunday: Closed">{{ $doctor->working_hours }}</textarea>
                        <div class="form-text">Describe your working hours and schedule.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Schedule
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Profile Summary</h5>
            </div>
            <div class="card-body">
                <h6>{{ $doctor->name }}</h6>
                <p class="text-muted">{{ $doctor->speciality }}</p>
                <p><strong>Room:</strong> {{ $doctor->room }}</p>
                <p><strong>Phone:</strong> {{ $doctor->phone }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
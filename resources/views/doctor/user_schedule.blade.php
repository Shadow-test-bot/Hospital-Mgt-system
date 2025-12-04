@extends('doctor.layout')

@section('title', 'Schedule with User')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Schedule Appointments with Users</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Create New Appointment</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('doctor/user-schedule') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Select User</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">Choose a user</option>
                            @foreach(\App\Models\User::where('usertype', '0')->get() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Appointment Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-calendar-plus me-2"></i>Schedule Appointment
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Recent Appointments</h5>
            </div>
            <div class="card-body">
                <p>View and manage scheduled appointments here.</p>
                <!-- Add logic to display recent appointments if needed -->
            </div>
        </div>
    </div>
</div>
@endsection
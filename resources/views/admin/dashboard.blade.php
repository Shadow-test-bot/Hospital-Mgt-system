@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Admin Dashboard</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Total Doctors</h5>
                        <h3>{{ $totalDoctors }}</h3>
                    </div>
                    <div>
                        <i class="fas fa-user-md fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Total Patients</h5>
                        <h3>{{ $totalPatients }}</h3>
                    </div>
                    <div>
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Users with Bookings</h5>
                        <h3>{{ $usersWithBookings }}</h3>
                    </div>
                    <div>
                        <i class="fas fa-calendar-check fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Departments</h5>
                        <h3>{{ $totalDepartments }}</h3>
                    </div>
                    <div>
                        <i class="fas fa-building fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5>Appointment Status</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <span class="badge bg-success me-2">Approved: {{ $approvedAppointments }}</span>
                    <span class="badge bg-warning me-2">In Progress: {{ $pendingAppointments }}</span>
                    <span class="badge bg-danger">Cancelled: {{ $cancelledAppointments }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ url('admin/departments') }}" class="btn btn-outline-primary">
                        <i class="fas fa-building me-2"></i>Manage Departments
                    </a>
                    <a href="{{ url('showdoctors') }}" class="btn btn-outline-success">
                        <i class="fas fa-user-md me-2"></i>View Doctors
                    </a>
                    <a href="{{ url('showappointments') }}" class="btn btn-outline-info">
                        <i class="fas fa-calendar-check me-2"></i>View Appointments
                    </a>
                    <a href="{{ url('add_doctor_view') }}" class="btn btn-outline-warning">
                        <i class="fas fa-plus me-2"></i>Add New Doctor
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
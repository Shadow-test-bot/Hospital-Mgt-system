@extends('doctor.layout')

@section('title', 'Appointments')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">My Appointments</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Appointment List</h5>
            </div>
            <div class="card-body">
                @if($appointments->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->user->name }}</td>
                                        <td>{{ $appointment->user->email }}</td>
                                        <td>{{ $appointment->phone }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->message }}</td>
                                        <td>
                                            @if($appointment->status == 'In progress')
                                                <span class="badge bg-warning">In Progress</span>
                                            @elseif($appointment->status == 'Completed')
                                                <span class="badge bg-success">Completed</span>
                                            @elseif($appointment->status == 'Approved')
                                                <span class="badge bg-info">Approved</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $appointment->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($appointment->status == 'In progress')
                                                <a href="{{ url('approve/'.$appointment->id) }}" class="btn btn-success btn-sm">Approve</a>
                                                <a href="{{ url('cancel/'.$appointment->id) }}" class="btn btn-danger btn-sm">Cancel</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No appointments found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.layout')

@section('title', 'All Appointments')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">All Appointments</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Doctor</th>
                                <th>Department</th>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $appoint)
                            <tr>
                                <td>{{ $appoint->name }}</td>
                                <td>{{ $appoint->email }}</td>
                                <td>{{ $appoint->phone }}</td>
                                <td>{{ $appoint->doctor }}</td>
                                <td>{{ $appoint->department->name ?? 'N/A' }}</td>
                                <td>{{ $appoint->date }}</td>
                                <td>{{ $appoint->message }}</td>
                                <td>
                                    @if($appoint->status == 'Approved')
                                        <span class="badge bg-success">{{ $appoint->status }}</span>
                                    @elseif($appoint->status == 'Cancelled')
                                        <span class="badge bg-danger">{{ $appoint->status }}</span>
                                    @else
                                        <span class="badge bg-warning">{{ $appoint->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($appoint->status != 'Approved')
                                        <a class="btn btn-success btn-sm me-2" href="{{ url('approve', $appoint->id) }}">
                                            <i class="fas fa-check"></i> Approve
                                        </a>
                                    @endif
                                    @if($appoint->status != 'Cancelled')
                                        <a class="btn btn-danger btn-sm me-2" href="{{ url('cancel', $appoint->id) }}">
                                            <i class="fas fa-times"></i> Cancel
                                        </a>
                                    @endif
                                    <a class="btn btn-primary btn-sm" href="{{ url('emailview', $appoint->id) }}">
                                        <i class="fas fa-envelope"></i> Email
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
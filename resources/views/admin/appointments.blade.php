@extends('admin.layout')

@section('title', 'Appointments')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Appointments</h2>
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
                                <th>ID</th>
                                <th>Patient Name</th>
                                <th>Doctor</th>
                                <th>Date</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $appointment)
                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->name }}</td>
                                    <td>{{ $appointment->doctor }}</td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ $appointment->phone }}</td>
                                    <td>
                                        @if($appointment->status == 'Approved')
                                            <span class="badge bg-success">{{ $appointment->status }}</span>
                                        @elseif($appointment->status == 'Cancelled')
                                            <span class="badge bg-danger">{{ $appointment->status }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ $appointment->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($appointment->status != 'Approved')
                                            <form action="{{ url('approve/' . $appointment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success me-2">
                                                    <i class="fas fa-check"></i> Approve
                                                </button>
                                            </form>
                                        @endif
                                        @if($appointment->status != 'Cancelled')
                                            <form action="{{ url('cancel/' . $appointment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger me-2">
                                                    <i class="fas fa-times"></i> Cancel
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ url('emailview/' . $appointment->id) }}" class="btn btn-sm btn-info">
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
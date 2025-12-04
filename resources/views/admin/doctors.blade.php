@extends('admin.layout')

@section('title', 'Doctors')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Doctors</h2>
            <a href="{{ url('add_doctor_view') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Doctor
            </a>
        </div>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Speciality</th>
                                <th>Phone</th>
                                <th>Room</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $doctor)
                                <tr>
                                    <td>{{ $doctor->id }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->user ? $doctor->user->email : 'N/A' }}</td>
                                    <td>{{ $doctor->speciality }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->room }}</td>
                                    <td>
                                        <a href="{{ url('updatedoctor/' . $doctor->id) }}" class="btn btn-sm btn-warning me-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ url('deletedoctor/' . $doctor->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
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
@extends('admin.layout')

@section('title', 'All Doctors')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>All Doctors</h2>
            <a href="{{ url('add_doctor_view') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Doctor
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>Speciality</th>
                                <th>Room</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $doctor)
                            <tr>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->department->name ?? 'N/A' }}</td>
                                <td>{{ $doctor->speciality }}</td>
                                <td>{{ $doctor->room }}</td>
                                <td>
                                    @if($doctor->image)
                                        <img src="{{ asset('doctorimage/' . $doctor->image) }}" alt="{{ $doctor->name }}" height="60" width="60" class="rounded">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('updatedoctor/' . $doctor->id) }}" class="btn btn-warning btn-sm me-2">
                                        <i class="fas fa-edit"></i> Update
                                    </a>
                                    <form action="{{ url('deletedoctor/' . $doctor->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this doctor?')">
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
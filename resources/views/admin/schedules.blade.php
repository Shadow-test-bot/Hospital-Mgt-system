@extends('admin.layout')

@section('title', 'Doctor Schedules')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Doctor Schedules Management</h2>
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
                                <th>Department</th>
                                <th>Speciality</th>
                                <th>Room</th>
                                <th>Current Schedule</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->department->name ?? 'N/A' }}</td>
                                <td>{{ $doctor->speciality }}</td>
                                <td>{{ $doctor->room }}</td>
                                <td>
                                    <span class="text-muted small">
                                        {{ $doctor->working_hours ?: 'Not set' }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onclick="editSchedule({{ $doctor->id }}, '{{ addslashes($doctor->working_hours ?: '') }}')">
                                        <i class="fas fa-edit"></i> Edit Schedule
                                    </button>
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

<!-- Edit Schedule Modal -->
<div class="modal fade" id="editScheduleModal" tabindex="-1" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editScheduleModalLabel">Edit Doctor Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editScheduleForm" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="editScheduleId" name="id">
                    <div class="mb-3">
                        <label for="working_hours" class="form-label">Working Hours</label>
                        <textarea class="form-control" id="working_hours" name="working_hours" rows="4" placeholder="e.g., Monday-Friday: 9:00 AM - 5:00 PM&#10;Saturday: 9:00 AM - 1:00 PM&#10;Sunday: Closed"></textarea>
                        <div class="form-text">Describe the doctor's working schedule and hours.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function editSchedule(id, workingHours) {
    document.getElementById('editScheduleId').value = id;
    document.getElementById('working_hours').value = workingHours;
    document.getElementById('editScheduleForm').action = '{{ url("admin/schedules") }}/' + id;
    new bootstrap.Modal(document.getElementById('editScheduleModal')).show();
}
</script>
@endsection
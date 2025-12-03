<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard - One Health</title>
    <link rel="stylesheet" href="{{ asset('assets/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Doctor Dashboard</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Your Profile</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $doctor->name }}</p>
                        <p><strong>Speciality:</strong> {{ $doctor->speciality }}</p>
                        <p><strong>Phone:</strong> {{ $doctor->phone }}</p>
                        <p><strong>Room:</strong> {{ $doctor->room }}</p>
                        <p><strong>Working Hours:</strong> {{ $doctor->working_hours ?? 'Not set' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('doctor/schedule') }}" class="btn btn-primary btn-block mb-2">Update Schedule</a>
                        <a href="{{ url('doctor/patients') }}" class="btn btn-secondary btn-block">View Patients</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Your Appointments</h5>
                    </div>
                    <div class="card-body">
                        @if($appointments->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->name }}</td>
                                            <td>{{ $appointment->email }}</td>
                                            <td>{{ $appointment->phone }}</td>
                                            <td>{{ $appointment->date }}</td>
                                            <td>{{ $appointment->status }}</td>
                                            <td>{{ $appointment->message }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No appointments yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

</body>
</html>
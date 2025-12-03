<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Schedule - One Health</title>
    <link rel="stylesheet" href="{{ asset('assets/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Update Your Working Hours</h1>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Current Working Hours</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Current Hours:</strong> {{ $doctor->working_hours ?? 'Not set' }}</p>

                        <form action="{{ url('doctor/schedule') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="working_hours">Update Working Hours</label>
                                <textarea name="working_hours" id="working_hours" class="form-control" rows="4" placeholder="e.g., Monday-Friday: 9 AM - 5 PM, Saturday: 10 AM - 2 PM">{{ $doctor->working_hours }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Update Schedule</button>
                        </form>
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
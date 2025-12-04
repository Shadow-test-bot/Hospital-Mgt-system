
@extends('admin.layout')

@section('title', 'Send Email')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Send Email to Patient</h2>
        <p><strong>Patient:</strong> {{ $data->name }} | <strong>Email:</strong> {{ $data->email }}</p>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Email Details</h5>
            </div>
            <div class="card-body">
                <form action="{{url('sendemail',$data->id)}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="greeting" class="form-label">Greeting</label>
                        <input type="text" class="form-control" id="greeting" name="greeting" placeholder="e.g., Dear Patient" required>
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="form-control" id="body" name="body" rows="4" placeholder="Enter the main message" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="actiontext" class="form-label">Action Text</label>
                        <input type="text" class="form-control" id="actiontext" name="actiontext" placeholder="e.g., View Details" required>
                    </div>

                    <div class="mb-3">
                        <label for="actionurl" class="form-label">Action URL</label>
                        <input type="url" class="form-control" id="actionurl" name="actionurl" placeholder="e.g., https://example.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="endpart" class="form-label">End Part</label>
                        <input type="text" class="form-control" id="endpart" name="endpart" placeholder="e.g., Best regards, Hospital Team" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-2"></i>Send Email
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
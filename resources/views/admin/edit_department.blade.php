<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department - Admin</title>
    @include('admin.css')
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">
            <div class="container" style="padding-top: 20px;">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <h2>Edit Department</h2>

                <form action="{{ url('admin/department/' . $department->id . '/edit') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div style="padding: 15px;">
                        <label>Department Name</label>
                        <input type="text" style="color: black;" name="name" value="{{ $department->name }}" required>
                    </div>
                    <div style="padding: 15px;">
                        <label>Description</label>
                        <textarea name="description" style="color: black;" rows="4">{{ $department->description }}</textarea>
                    </div>
                    <div style="padding: 15px;">
                        <input type="submit" class="btn btn-success" value="Update Department">
                        <a href="{{ url('admin/departments') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments - Admin</title>
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

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Departments</h2>
                    <a href="{{ url('admin/add_department') }}" class="btn btn-primary">Add Department</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->description }}</td>
                                <td>
                                    <a href="{{ url('admin/department/' . $department->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ url('admin/department/' . $department->id . '/delete') }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>
</html>
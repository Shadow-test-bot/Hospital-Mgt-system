<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department - Admin</title>
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

                <form action="{{ url('admin/add_department') }}" method="POST">
                    @csrf
                    <div style="padding: 15px;">
                        <label>Department Name</label>
                        <input type="text" style="color: black;" name="name" placeholder="Enter department name" required>
                    </div>
                    <div style="padding: 15px;">
                        <label>Description</label>
                        <textarea name="description" style="color: black;" rows="4" placeholder="Enter description"></textarea>
                    </div>
                    <div style="padding: 15px;">
                        <input type="submit" class="btn btn-success" value="Add Department">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>
</html>
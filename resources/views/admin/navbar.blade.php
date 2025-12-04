<div class="admin-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4 class="mb-0 fw-bold text-primary">
                    <span class="text-primary">One</span>-Health Admin Panel
                </h4>
            </div>
            <div class="col-md-6 text-end">
                <span class="text-muted me-3">
                    Welcome, {{ Auth::user()->name }}
                </span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="mai-log-out me-1"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
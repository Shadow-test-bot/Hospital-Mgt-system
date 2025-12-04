<div class="admin-sidebar">
    <div class="p-4">
        <h4 class="text-primary fw-bold mb-4">
            <span class="text-primary">One</span>-Health
        </h4>
        <span class="text-muted small">Admin Panel</span>
    </div>

    <ul class="nav flex-column px-3">
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('admin/dashboard') }}">
                <i class="mai-dashboard me-2"></i>Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('add_doctor_view') ? 'active' : '' }}" href="{{ url('add_doctor_view') }}">
                <i class="mai-plus me-2"></i>Add Doctor
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('showappointments') ? 'active' : '' }}" href="{{ url('showappointments') }}">
                <i class="mai-calendar-check me-2"></i>Appointments
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('showdoctors') ? 'active' : '' }}" href="{{ url('showdoctors') }}">
                <i class="mai-people me-2"></i>All Doctors
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('admin/departments*') ? 'active' : '' }}" href="{{ url('admin/departments') }}">
                <i class="mai-hospital me-2"></i>Departments
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('admin/schedules*') ? 'active' : '' }}" href="{{ url('admin/schedules') }}">
                <i class="mai-calendar me-2"></i>Doctor Schedules
            </a>
        </li>
    </ul>
</div>
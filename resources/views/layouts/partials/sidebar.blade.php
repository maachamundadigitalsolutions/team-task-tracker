{{-- Only for Admin --}}
@role('admin')
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user-shield"></i>
        <p>
            Admin Panel
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Settings</p>
            </a>
        </li>
    </ul>
</li>
@endrole

{{-- Only for User --}}
@role('user')
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
            User Panel
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.profile') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>My Profile</p>
            </a>
        </li>
    </ul>
</li>
@endrole

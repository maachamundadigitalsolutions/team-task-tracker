<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <span class="brand-text font-weight-light d-none d-sm-inline">
    Maa Chamunda
</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">

                {{-- Common link --}}
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                {{-- Admin only --}}
                @role('admin')
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Admin Dashboard</p>
                    </a>
                </li>
                @endrole

                {{-- User only --}}
                @role('user')
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User Dashboard</p>
                    </a>
                </li>
                @endrole
                {{-- Mobile Role User only --}}
                @role('mobile')
                <li class="nav-item">
                    <a href="{{ route('mobile.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-mobile-alt"></i>
                        <p>Mobile User Dashboard</p>
                    </a>
                </li>
                @endrole                

            </ul>
        </nav>
    </div>
</aside>

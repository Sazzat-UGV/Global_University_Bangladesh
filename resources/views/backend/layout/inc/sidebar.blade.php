<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
    </a>

    <hr class="sidebar-divider my-0">

    @can('access-dashboard')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endcan
    <hr class="sidebar-divider">


    @if (Auth::user()->haspermission('slider-list') ||
            Auth::user()->haspermission('faculty-list') ||
            Auth::user()->haspermission('result-list') ||
            Auth::user()->haspermission('contact-list') ||
            Auth::user()->haspermission('notice-list'))
        <div class="sidebar-heading">
            Interfaces
        </div>
        @can('slider-list')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#slider"
                    aria-expanded="true" aria-controls="slider">
                    <i class="fas fa-fw fa-sliders-h"></i>
                    <span>Sliders</span>
                </a>
                <div id="slider" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('slider.index') }}">Slider List</a>
                        @can('slider-create')
                            <a class="collapse-item" href="{{ route('slider.create') }}">Add New Slider</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan
        @can('faculty-list')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#faculty"
                    aria-expanded="true" aria-controls="faculty">
                    <i class="fas fa fa-user-alt"></i>
                    <span>Faculty</span>
                </a>
                <div id="faculty" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('faculty.index') }}">Faculty List</a>
                        @can('faculty-create')
                            <a class="collapse-item" href="{{ route('faculty.create') }}">Add New Faculty</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan
        @can('result-list')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#result"
                    aria-expanded="true" aria-controls="result">
                    <i class="fas fa-file-pdf"></i>
                    <span>Results</span>
                </a>
                <div id="result" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('result.index') }}">Result List</a>
                        @can('result-create')
                            <a class="collapse-item" href="{{ route('result.create') }}">Add New Result</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan
        @can('notice-list')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#notice"
                    aria-expanded="true" aria-controls="notice">
                    <i class="fas fa-paperclip"></i>
                    <span>Notices</span>
                </a>
                <div id="notice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('notice.index') }}">Notice List</a>
                        @can('notice-create')
                            <a class="collapse-item" href="{{ route('notice.create') }}">Add New Notice</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan

        @can('contact-list')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact.index') }}">
                    <i class="fas fa-fw fa-phone-alt"></i>
                    <span>Contacts</span></a>
            </li>
        @endcan
    @endif







































    <hr class="sidebar-divider">
    @if (Auth::user()->haspermission('role-list') || Auth::user()->haspermission('admin-list'))
        <div class="sidebar-heading">
            System Administration
        </div>
        @can('role-list')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#role" aria-expanded="true"
                    aria-controls="role">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>System Roles</span>
                </a>
                <div id="role" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('role.index') }}">Role List</a>
                        @can('role-create')
                            <a class="collapse-item" href="{{ route('role.create') }}">Add New Role</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan

        @can('admin-list')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
                    aria-expanded="true" aria-controls="admin">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>System Admins</span>
                </a>
                <div id="admin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.index') }}">Admin List</a>
                        @can('admin-create')
                            <a class="collapse-item" href="{{ route('admin.create') }}">Add New Admin</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan
    @endif


    <hr class="sidebar-divider">
    @if (Auth::user()->haspermission('backup-list'))
        <div class="sidebar-heading">
            Settings
        </div>
        @can('backup-list')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backup.index') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Database Backup</span></a>
            </li>
        @endcan
    @endif
</ul>

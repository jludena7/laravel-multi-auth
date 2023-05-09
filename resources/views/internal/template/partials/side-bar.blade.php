<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Start Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('internal.security.dashboard.main') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>
    <!-- End Brand -->

    <!-- Start Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('internal.security.dashboard.main') }}"><i class="fas fa-fw fa-folder"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMenu1"
           aria-expanded="true" aria-controls="collapseMenu1">
            <i class="fas fa-fw fa-folder"></i>
            <span>Security</span>
        </a>
        <div id="collapseMenu1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Users</a>
                <a class="collapse-item" href="#">Roles</a>
            </div>
        </div>
    </li>
    <!-- End Brand -->

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

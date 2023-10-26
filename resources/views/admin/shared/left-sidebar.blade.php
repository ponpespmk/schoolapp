<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="#" class="logo logo-light">
        <span class="logo-lg">
            <img src="/backend/assets/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="/backend/assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="#" class="logo logo-dark">
        <span class="logo-lg">
            <img src="/backend/assets/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="/backend/assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end">5+</span>
                    <span> Dashboard </span>
                </a>
            </li>

        @if (Auth::user()->can('type.menu'))

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages"
                    class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Property Type </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        @if (Auth::user()->can('all.type'))
                        <li>
                            <a href="{{ route('all.type') }}">All Type</a>
                        </li>
                        @endif

                        @if (Auth::user()->can('add.type'))
                        <li>
                            <a href="{{ route('add.type') }}">Add Type</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>

        @endif

        @if (Auth::user()->can('amenities.menu'))

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false"
                    aria-controls="sidebarPagesAuth" class="side-nav-link">
                    <i class="ri-group-2-line"></i>
                    <span> Amenities </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesAuth">
                    <ul class="side-nav-second-level">
                        @if (Auth::user()->can('all.amenities'))
                        <li>
                            <a href="{{ route('all.amenitie') }}">All Amenities</a>
                        </li>
                        @endif

                        @if (Auth::user()->can('add.amenities'))
                        <li>
                            <a href="{{ route('add.amenitie') }}">Add Amenities</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>

        @endif

        @if (Auth::user()->can('role.menu'))

            <li class="side-nav-title">Role & Permission</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI"
                    class="side-nav-link">
                    <i class="ri-shield-keyhole-line"></i>
                    <span>Role & Permission</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBaseUI">
                    <ul class="side-nav-second-level">
                        <li>
                            <li><a href="{{ route('all.permission') }}">All Permission</a></li>
                            <li><a href="{{ route('all.roles') }}">All Roles</a></li>
                            <li><a href="{{ route('add.roles.permission') }}">Roles In Permission</a></li>
                            <li><a href="{{ route('all.roles.permission') }}">All Roles In Permission</a></li>
                        </li>
                    </ul>
                </div>
            </li>
        @endif

        @if (Auth::user()->can('admin.menu'))

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false"
                    aria-controls="sidebarExtendedUI" class="side-nav-link">
                    <i class="ri-admin-line"></i>
                    <span>Manage Admin User</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarExtendedUI">
                    <ul class="side-nav-second-level">
                        <li>
                            <li><a href="{{ route('all.admin') }}">All Admin</a></li>
                            <li><a href="{{ route('add.admin') }}">Add Admin</a></li>
                        </li>
                    </ul>
                </div>
            </li>
        @endif

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->

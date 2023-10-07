<div class="vertical-menu">

    <div class="h-100">

        @php
            $id = Auth::user()->id;
            $profileData = App\Models\User::find($id);
        @endphp

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.png') }}" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-body fw-medium font-size-16 text-uppercase">{{ $profileData->role }}</a>
                <p class="text-muted mt-1 mb-0 font-size-13">{{ $profileData->name }}</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if (Auth::user()->can('type.menu'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-toolbox"></i>
                        <span>Property Type</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            @if(Auth::user()->can('all.type'))
                            <a href="{{ route('all.type') }}">All Type</a>
                            @endif
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            @if(Auth::user()->can('add.type'))
                            <a href="{{ route('add.type') }}">Add Type</a>
                            @endif
                        </li>
                    </ul>
                </li>
                @endif

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span>Amenities</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.amenitie') }}">All Amenities</a></li>
                        <li><a href="#">Add Amenities</a></li>
                    </ul>
                </li>


                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-card-details-outline"></i>
                        <span>Santri</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html">Data Santri</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" class="has-arrow">Mutasi</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-compact-sidebar.html">Mutasi Masuk</a></li>
                                <li><a href="layouts-icon-sidebar.html">Mutasi Keluar</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript: void(0);" class="has-arrow">Akademik</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.html">Daftar Alumni</a></li>
                            </ul>
                        </li>
                    </ul>

                </li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-supervisor-circle"></i>
                        <span>Ustadz</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html">Daftar Ustadz</a></li>
                    </ul>
                </li> --}}

                <li class="menu-title">Role & Permission</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-security-network"></i>
                        <span>Role & Permission</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.permission') }}">All Permission</a></li>
                        <li><a href="{{ route('all.roles') }}">All Roles</a></li>
                        <li><a href="{{ route('add.roles.permission') }}">Roles In Permission</a></li>
                        <li><a href="{{ route('all.roles.permission') }}">All Roles In Permission</a></li>
                    </ul>
                </li>


                <li class="menu-title">Manage Admin User</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-settings-outline"></i>
                        <span>Manage Admin User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.admin') }}">All Admin</a></li>
                        <li><a href="{{ route('add.admin') }}">Add Admin</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-file-tree"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html" class="text-danger waves-effect bx-flashing-hover text-bold" aria-expanded="false">
                        <i class="mdi mdi-power text-danger"></i>
                        <span>Log Out</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

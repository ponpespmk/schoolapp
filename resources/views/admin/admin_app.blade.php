<!DOCTYPE html>
<html lang="en" data-sidenav-size="{{ $sidenav ?? 'default' }}" data-layout-mode="{{ $layoutMode ?? 'fluid' }}" data-layout-position="{{ $position ?? 'fixed' }}" data-menu-color="{{ $menuColor ?? 'dark' }}" data-topbar-color="{{ $topbarColor ?? 'light' }}">

<head>
    @include('admin.shared/title-meta', ['title' => $title])
    @yield('css')
    @include('admin.shared/head-css', ['mode' => $mode ?? '', 'demo' => $demo ?? ''])
    @yield('toast-css')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        @include('admin.shared/topbar')
        @include('admin.shared/left-sidebar')

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container -->

            </div>
            <!-- content -->

            @include('admin.shared/footer')
        </div>

    </div>
    <!-- END wrapper -->

    @yield('modal')

    @include('admin.shared/right-sidebar')

    <script src="/backend/assets/js/vendor.min.js"></script>

    @yield('toast-script')

    @yield('script')

    <script src="/backend/assets/js/app.min.js"></script>

    {{-- @vite(['resources/js/layout.js', 'resources/js/main.js']) --}}

    {{-- <script>
        window.onload = function() {
            document.getElementById('label').className = 'text-warning';
        };
    </script> --}}


</body>

</html>

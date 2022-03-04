<!DOCTYPE html>
<html lang="en">
@include('layouts.component.head')
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start       -->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
@include('layouts.component.header')
<!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        @role('admin')
    @include('layouts.component.sidebar.sidebar-admin')
        @endrole
        @role('manager')
    @include('layouts.component.sidebar.sidebar-manager')
        @endrole
        @role('kasir')
    @include('layouts.component.sidebar.sidebar-user')
        @endrole
        @role('chef')
    @include('layouts.component.sidebar.sidebar')
        @endrole

    <!-- Page Sidebar Ends-->
        <div class="page-body">
            <!-- Container-fluid starts-->
            <div class="container-fluid dashboard-default-sec">
                @yield('content')
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('layouts.component.footer')
    </div>
</div>

@include('layouts.component.js')
<!-- Plugin used-->
</body>
</html>

@include('sweetalert::alert')

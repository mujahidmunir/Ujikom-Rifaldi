<!DOCTYPE html>
<html lang="en">
@include('layouts.menu.head')
<body>
@include('layouts.menu.header')
@include('layouts.menu.slider')
<div class="section pb_70">
    <div class="container-fluid">
        @yield('orders')
        <div class="col-lg-12 p-5">
            @yield('tab-menu')
            @yield('content')
        </div>
    </div>
</div>
@include('sweetalert::alert')





<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

@include('layouts.menu.js')
</body>
</html>

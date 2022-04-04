<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('images/logo/head.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('images/logo/head.png')}}" type="image/x-icon">
    <title>Caffe Coffee</title>


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
</head>
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{asset('assets/images/login/5.png')}}" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card" >
                    <form class="theme-form login-form" action="{{route('login')}}" method="post" style="border-radius: 15px;">
                        @csrf
                        <div class="text-center">
                        <h4 >Login</h4>
                        <h6>Welcome back! Log in to your account.</h6>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="input-group">
                                <input class="form-control @error('email') is-invalid @enderror"  name="email" type="text" required="" placeholder=""style="border-radius: 13px;">
                                @error('email')
                                <span class="text-danger">{{$massage}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"  style="border-radius: 13px;">
                            @error('password')
                                <span class="text-danger">{{$massage}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-grid">
                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page-wrapper end-->
<!-- latest jquery-->
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/js/config.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- Plugins JS start-->
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>

@include('sweetalert::alert')
<!-- login js-->
<!-- Plugin used-->
</body>
</html>

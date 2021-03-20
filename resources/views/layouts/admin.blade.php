<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Muslimhood TV</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('vendor/adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('vendor/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('vendor/adminLTE/css/adminlte.min.css')}}">
    @stack('style')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        @include('partials.admin.navbar')
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset('img/mLogo.png')}}" alt="mLogo" class="brand-image img-circle"
                    style="opacity: .8; border-radius: 0%;">
                <span class="brand-text font-weight-light" style="top: 10%">Muslimhood TV</span>
            </a>
            @include('partials.admin.sidebar')
        </aside>
        <div class="content-wrapper">
            @yield('konten')
        </div>
        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="#">Muslimhood TV</a> | <b>Version</b> 1.0.0.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <strong>Powered By &copy; 2014 - 2021 <a href="https://adminlte.io">AdminLTE</a> All rights reserved.</strong> | 
                <b>Version</b> 3.1.0-rc
            </div>
        </footer>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset('vendor/adminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendor/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('vendor/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('vendor/adminLTE/js/adminlte.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('vendor/adminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('vendor/adminLTE/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('vendor/adminLTE/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('vendor/adminLTE/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('vendor/adminLTE/plugins/chart.js/Chart.min.js')}}"></script>
    
    @stack('script')
</body>

</html>
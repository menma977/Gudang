<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AdminLTE 3</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('startCSS')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
    @yield('endCSS')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.include.header')

        @include('layouts.include.slider')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    @yield('title')
                </div>
            </section>

            <section class="content">
                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <strong>Programmer : Copyright &copy; 2020 <a
                        href="{{ url('http://Instagram.com/altair.kenway_') }}">Wisnu Putra Dewa</a>.</strong>
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="{{ url('http://adminlte.io') }}">AdminLTE.io</a>.</strong> All
            rights
            reserved.
        </footer>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('startJS')
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    @yield('endJS')
</body>

</html>

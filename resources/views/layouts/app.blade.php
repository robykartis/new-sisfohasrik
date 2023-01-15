<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- 
    <link rel="shortcut icon" href="{{ asset('assets/logo/logosiap.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/logo/logosiap.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/logo/logosiap.png') }}"> --}}


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css') }}">
    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed pace-warning">
    <!-- Site wrapper -->
    <div class="wrapper">
        {{-- <div class="preloader flex-column justify-content-center align-items-center"> --}}
        {{-- <img class="animation__shake" src="{{ asset('assets/logo/logosiap.png') }}" alt="AdminLTELogo"
                height="60" width="60"> --}}
        {{-- </div> --}}
        <!-- Navbar -->
        @include('layouts._header')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-warning elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                {{-- <img src="{{ asset('assets/logo/logosiap.png') }}" alt="AdminLTE Logo" class="brand-image "
                    style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (Auth::user()->level == 'admin')
                            <img src="{{ asset('images/akun/' . Auth::user()->image) }}" class="img-circle elevation-2"
                                height="20px" alt="User Image">
                        @elseif (Auth::user()->level == 'operator')
                            <img src="{{ asset('images/akun/' . Auth::user()->image) }}" class="img-circle elevation-2"
                                alt="User Image">
                        @else
                            <img src="{{ asset('images/akun/' . Auth::user()->image) }}" class="img-circle elevation-2"
                                alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    @include('layouts._sidebar')
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @yield('breadcrumbs')
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
            @yield('modal')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.0.1
            </div>
            <strong>Copyright &copy; 2022-<?php
            $tgl = date('Y');
            echo $tgl;
            ?> <a href="#">{{ config('app.name') }}</a>.</strong>
            All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pace-progress/pace.min.js') }}"></script>
    @stack('js')
</body>

</html>

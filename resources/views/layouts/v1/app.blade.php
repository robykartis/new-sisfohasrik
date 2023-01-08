<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/logo/logosiap.png') }}" type="image/png" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--plugins-->
    <!--plugins-->
    <link href="{{ asset('ltr/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('ltr/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('ltr/assets/css/pace.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('ltr/assets/fontawesome-free/css/all.min.css') }}">

    <!--Theme Styles-->
    <link href="{{ asset('ltr/assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/css/header-colors.css') }}" rel="stylesheet" />
    @stack('css')
    <title>{{ config('app.name') }} - @yield('title')</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        @include('layouts.v1.component.header')
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('assets/logo/logosiap.png') }}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">{{ config('app.name') }}</h4>
                </div>
                <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
                </div>
            </div>
            <!--navigation-->
            @if (Auth::user()->level == 'admin')
                @include('layouts.v1.component.com_sidebar._admin')
            @elseif(Auth::user()->level == 'operator')
                @include('layouts.v1.component.com_sidebar._operator')
            @else
                @include('layouts.v1.component.com_sidebar._readonly')
            @endif
            <!--end navigation-->
        </aside>

        <!--start content-->
        <main class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="ps-3">
                    @yield('breadcrumbs')
                </div>

            </div>
            <!--end breadcrumb-->
            @yield('content')
            <!--end row-->


            @yield('modal')
        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                    class="bi bi-paint-bucket me-0"></i></button>
            <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <h6 class="mb-0">Theme Variation</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme"
                            value="option1">
                        <label class="form-check-label" for="LightTheme">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme"
                            value="option2">
                        <label class="form-check-label" for="DarkTheme">Dark</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme"
                            value="option3" checked>
                        <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
                    </div>
                    <hr>


                </div>
            </div>
        </div>
        <!--end switcher-->

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('ltr/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('ltr/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('ltr/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('ltr/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('ltr/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('ltr/assets/js/pace.min.js') }}"></script>
    <!--app-->
    <script src="{{ asset('ltr/assets/js/app.js') }}"></script>

    @stack('js')
</body>

</html>

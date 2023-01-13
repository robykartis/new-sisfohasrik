<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <meta name="description" content="{{ config('app.name') }}">
    <meta name="author" content="robyfulldev">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="{{ config('app.name') }}- robyfulldev">
    <meta property="og:site_name" content="{{ config('app.name') }}- robyfulldev">
    <meta property="og:description" content="{{ config('app.name') }}- robyfulldev">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    {{-- <link rel="shortcut icon" href="{{ asset('assets/logo/logosiap.png') }}"> --}}
    {{-- <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/logo/logosiap.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/logo/logosiap.png') }}"> --}}
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('backend/assets/css/oneui.min.css') }}">
    <!-- END Stylesheets -->
</head>

<body>

    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            @yield('content')
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ asset('backend/assets/js/oneui.app.min.js') }}"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{ asset('backend/assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('backend/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('backend/assets/js/pages/op_auth_signin.min.js') }}"></script>
</body>

</html>

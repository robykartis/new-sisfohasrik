<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} &mdash; @yield('title')</title>


    <link rel="shortcut icon" href="{{ asset('assets/logo/logosiap.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/logo/logosiap.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/logo/logosiap.ico') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />


    <link rel="stylesheet" href="{{ asset('auth/vendor/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('auth/assets/css/style.css') }}">
    <!-- <link rel="stylesheet" href="../vendor/themify-icons/themify-icons.css"> -->
    <link rel="stylesheet" href="{{ asset('auth/assets/css/bootstrap-override.css') }}">
</head>

<body>
    <section class="container h-100">
        <div class="row justify-content-sm-center h-100 align-items-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
                @yield('content')
                <div class="text-center mt-5 text-muted">
                    Copyright &copy; 2022 &mdash; {{ config('app.name') }}
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('auth/assets/js/login.js') }}"></script>
    @stack('js')
</body>

</html>

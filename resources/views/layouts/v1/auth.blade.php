<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('ltr/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('ltr/assets/css/bootstrap.min.cs') }}s" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('ltr/assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('ltr/assets/css/pace.min.css" rel="stylesheet') }}" />

    <title>{{ config('app.name') }} - @yield('title')</title>
</head>

<body class="bg-login">

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        @yield('content')

        <!--end page main-->

    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="{{ asset('ltr/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('ltr/assets/js/pace.min.js') }}"></script>


</body>

</html>

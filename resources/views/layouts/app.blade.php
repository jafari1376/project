<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>


    <!-- Styles -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body class="bg-light">

    @include('layouts.header')
    <br><br><br>
    <div id="app">
            @include('sweet::alert')
        <main class="container-fluid py-4 h-100">

            @yield('content')
        </main>

    </div>
    @include('layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    @yield('script')
</body>
</html>

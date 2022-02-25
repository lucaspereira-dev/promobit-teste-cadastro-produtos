<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Promobit')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/datatables.min.css') }}">
    @yield('styleHead')

    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/datatables.min.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
    @yield('scriptHead')
</head>

<body class="{{ Route::current()->getName() == 'login' ? 'text-center' : '' }}">
    @yield('body')
</body>
<footer>

    @yield('scriptFooter')
</footer>

</html>

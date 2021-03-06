<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('vendor/techlink/cms/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/techlink/cms/css/bootstrap.min.css') }}">.
    @stack('styles')
    <style>
        .invalid-feedback {
            display: block !important;
        }
        .textarea-description {
            height: 550px !important;
        }
    </style>
</head>
<body>
    @yield('content')
    <script src="{{ asset('vendor/techlink/cms/js/plugins.min.js') }}"></script>
    @include('sweetalert::alert')
    @stack('scripts')
</body>
</html>

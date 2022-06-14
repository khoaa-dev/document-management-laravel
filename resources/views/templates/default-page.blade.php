<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document Management</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
</head>
<body>
    <!-- header -->
    @include("includes.header")

    @yield('content')

    <!-- header -->
    @include("includes.footer")


    @yield('js')
    <script src="{{ asset('public/js/app.js') }}"></script>

</body>
</html>
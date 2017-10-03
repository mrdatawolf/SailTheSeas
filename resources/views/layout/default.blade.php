<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('css')
</head>
<body>
@yield('content')

</body>
</html>
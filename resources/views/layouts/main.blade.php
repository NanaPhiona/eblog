<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learning Laravel</title>
</head>
<body>
    <h1>@yield('title')</h1>
    <a href="{{ route('home')}}">Home</a>
    <a href="{{ route('about')}}">About Us</a>
    <a href="{{ route('contact')}}">Contact Us</a>
    <hr>
    @yield('content')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Learning Laravel</title>
</head>
<body class="container pt-0 mt-o">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">HOME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">NEWS</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('about')}}">ABOUT US</a>
                </li>
                
                    @auth
                    <li class="nav-item">
                        <a href="{{ route('dashboard')}}" class="nav-link">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout')}}" class="nav-link">Logout</a>
                    </li>   
                    @endauth
                    
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                    </li>
                    @endguest
                    
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search news..." aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>


    <h1>@yield('title')</h1>
    {{-- <a href="{{ route('home')}}">Home</a>
    <a href="{{ route('about')}}">About Us</a>
    <a href="{{ route('contact')}}">Contact Us</a>

    <head><u>MODEL</u></head>
    <a href="{{ route('model-saving')}}">Model Saving</a>
    <a href="{{ route('model-querying')}}">Model Querying</a>
    <a href="{{ route('model-relation')}}">Model Relationship</a> --}}

    <hr>
    @yield('content')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="http://127.0.0.1:8000">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Admin dashboard</title>
</head>
<body class="container pt-0 mt-o">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard')}}">HOME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('')}}">WEBSITE</a>
                </li>
                    
              
            </ul>
            <a href="{{ route('logout')}}" class="nav-link btn-md btn btn-primary" role="button">Logout</a>
            </div>
        </div>
    </nav>


    <div class="row">
        <div class="col-md-4">
            <div class="list-group rounded-0">
                <a href="#" class="list-group-item list-group-item-action">Create News Post</a>
                <a href="#" class="list-group-item list-group-item-action">News Posts</a>
                <a href="{{ route('categories') }}" class="list-group-item list-group-item-action">News Categories</a>
              </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-10">
                    <h1>@yield('title')</h1>
                </div>
                <div class="col-md-2">
                        @yield('create_button')
                </div>
            </div>
            @yield('content')
        </div>
    </div>
   
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $project_name = "Simple <br> Project";
    ?>
    <h1>Home Page for {!! $project_name !!}</h1>
    <p>This is the home page</p>
    <hr>
    <p>Name: </b> {{ $name }}</p>
    <p>Sex: </b> {{ $sex }}</p>
    {{-- Using PHP print function --}}
    @php
        print_r($colors);
    @endphp
     {{-- id-else condition --}}
     @if (9 > (6-5))
         <p>Hello 9 is way bigger than 6-5</p>
     @else
         <p>6-5 must be proud to be bigger than 9</p>
     @endif
     {{-- foreach loop --}}
    @foreach ($colors as $color)
        <p>{{ $color }}</p>
    @endforeach
    {{-- for loop --}}
    @for ($i = 0; $i < 50; $i++)
        <li>{{ $i }}</li>
    @endfor
</body>
</html>
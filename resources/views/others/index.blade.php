@extends('layouts/main')
<p>Hello there, this is the home page</p>
@section('title')
    Home Page
@endsection
@section('content')
    <h4>Home Content</h4>
    @for ($i = 0; $i < 10; $i++)
    @include(
    'components/products-ui',
    ['id'=>$i]
    ) 
    @endfor

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab consequuntur natus vel, quisquam aspernatur atque praesentium qui quo sapiente inventore a exercitationem. Vel cupiditate nam odit atque aliquam perspiciatis nesciunt.</p>
@endsection





@extends('layouts/admin')
@section('title')
   Categories
@endsection
@section('create_button')
    <a class="btn btn-success mt-2" href="{{ route('create_categories') }}">NEW</a>
@endsection

@section('content')
 <p>Hello to you</p>
@endsection
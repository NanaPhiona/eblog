@extends('layouts/admin')
@section('title')
    New Category
@endsection
@section('create_button')
    <a class="btn btn-danger mt-2" href="{{ route('categories') }}">LIST</a>
@endsection
@section('content')
<form enctype="multipart/form-data" method="POST">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name" class="form-label">News Category</label>
        <input type="text" required value="{{ old('name') }}" class="form-control" name="name" placeholder="Enter Name" id="name">
    </div>
    <div class="form-group">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" required class="form-control" name="photo" id="photo" accept=".png, .jpg, .jpeg">
    </div>
    <div class="form-group mb-3">
        <label for="details" class="form-label">Details</label>
        <textarea name="details" id="details" class="form-control">"{{ old('details') }}"</textarea>
    </div>
    <button class="btn btn-success">SUBMIT</button>
</form>
@endsection
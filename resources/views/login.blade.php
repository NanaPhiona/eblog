@extends('layouts/main')
@section('title')
    Register or Login 
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 mb-md-3">
            <h2 class="text-center">REGISTER</h2>
            <form action="{{ route('register')}}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" required value="{{ old('name') }}" class="form-control" name="name" placeholder="Name" id="name">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" required value="{{ old('email')}}" class="form-control" name="email" placeholder="Email Address" id="email">
                    <p class="small text-danger">{{ $errors->first('email')}}</p>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" required class="form-control" name="password" placeholder="Password" id="password">
                    <p class="small text-danger">{{ $errors->first('password') }}</p>
                </div>
                <div class="form-group pb-3">
                    <label for="comfirm_password" class="form-label">Confirm Password</label>
                    <input type="password" required class="form-control" name="comfirm_password" placeholder="Confirm Password" id="comfirm_password">
                </div>
                <button class="btn btn-danger">REGISTER</button>
            </form>
        </div>

        <div class="col-md-6 mb-md-3">
            <h2 class="text-center">LOGIN</h2>
            <form action="{{ route('login')}}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="login_email" class="form-label">Email</label>
                    <input type="email" required value="{{ old('login_email')}}" class="form-control" name="login_email" placeholder="Enter Email Address" id="login_email">
                    <p class="small text-danger">{{ $errors->first('login_email')}}</p>
                </div>
                <div class="form-group">
                    <label for="login_password" class="form-label">Password</label>
                    <input type="password" required class="form-control" name="login_password" placeholder="Password" id="login_password">
                    <p class="small text-danger">{{ $errors->first('login_password') }}</p>
                </div>
                <button class="btn btn-success">LOGIN</button>
            </form>
        </div>
    </div>
@endsection
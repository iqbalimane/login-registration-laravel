
@extends('layout')

    @section('content')
    <div class="col-sm-8">
        <h3>Login User</h3>
        @if(Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {Session::get('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        </div>
        @endif
        <form action="loginUser" method="post">
        @csrf
        <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required>
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    @endsection
@extends('layout')

@section('content')
    <div class="col-sm-8">
        <h3>Register User</h3>
    @if(Session::get('register_status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('register_status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
        <form action="registerUser" method="post" return="false">
        <div class="form-group">
        <label>Name
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name" required>
        </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
         @enderror
            @csrf
            <div class="form-group">
        <label>Email
        <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required>
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                <div class="form-group">
            <label>Password
            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter Password" required>
                </div>
                @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
            <label>Confirm Password
            <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control" placeholder="Confirm Password" required>
            </div>
            @error('confirm_password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                <div class="form-group">
                <label>Mobile</label>
                <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="Enter Mobile Number" required>
                </div>
                @error('mobile')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            @endsection
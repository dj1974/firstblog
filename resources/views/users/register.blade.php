@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Register</h3>

            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">E-mail:</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group {{$errors->has('first_name') ? 'has-error' : ''}}">
                    <label for="first_name">First Name:</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{Request::old('first_name')}}">
                </div>
                <div class="form-group {{$errors->has('last_name') ? 'has-error' : ''}}">
                    <label for="last_name">Last Name:</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{Request::old('last_name')}}">
                </div>
                <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
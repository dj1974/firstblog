@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Login</h3>

            <form action="{{ route('signin') }}" method="post">
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">Your E-mail:</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                    <label for="password">Your Password:</label>
                    <input class="form-control" type="password" name="password" id="password"
                           value="{{Request::old('password')}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    @include('flash::message')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <form action="{{ route('image.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}"
                           id="first_name" disabled>
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}"
                           id="last_name" disabled>
                    <label for="type">Type:</label>
                    <input type="text" name="type" class="form-control" value="{{$user->type}}"
                           id="type" disabled >
                    <label for="type">Profession:</label>
                    <input type="text" name="profession" class="form-control" value="{{$user->profession}}"
                           id="type" @if(Auth::user()->type =='guest') disabled @endif>
                </div>
                <div class="form-group">
                    <label for="image">User Image:</label>
                    <input type="file" name="avatar" class="form-control" id="file">
                    <button type="submit" class="btn btn-toolbar bar">Save Account</button>
                    <input type="hidden" value="{{Session::token()}}" name="_token">
                </div>

                <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
        </div>
    </section>
    <section class="row ">
        <div class="col-md-6 col-md-offset-3">
            <img src="/src/image/users/{{$user->avatar}}"
                 alt="" style="width:150px;height:150px;border-radius: 50%" />
        </div>
    </section>
@endsection
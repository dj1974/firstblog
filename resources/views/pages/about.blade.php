@extends('layouts.master')
@section('title')
    About Us
@endsection
@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Team</h2>
        </div>
        <div class="col-lg-4 col-sm-6 ">
            <img class="img-circle img-responsive img-center" src="/src/image/users/{{$superuser->avatar}}" alt="">

            <h3>{{$superuser->first_name}} {{$superuser->last_name}}
                <small>{{$superuser->profession}}</small>
            </h3>
            <p></p>
        </div>
        @foreach($admin as $ad)
            <div class="col-lg-4 col-sm-6 ">
                <img class="img-circle img-responsive img-center" src="/src/image/users/{{$ad->avatar}}" alt="">

                <h3>{{$ad->first_name}} {{$ad->last_name}}
                    <small>{{$ad->profession}}</small>
                </h3>
                <p></p>
            </div>
        @endforeach
    </div>

    <hr>
@endsection

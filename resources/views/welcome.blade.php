@extends('layouts.master')

@section('title')
    Welcome
@endsection

@section('content')
    @include('flash::message')
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                <img class="img-responsive img-rounded" src="{{URL::asset('WelcomePicture.png')}}"  alt="miss picture!!">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1>Our Blog</h1>

                <h4>This is the blog various topic in medical pediatric and lawyer science in Serbia</h4>
                <a class="btn btn-primary btn-lg" href="{{route('dashboard')}}">Go to Blog!</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    <p>This is a blog for people interesting in medical, law!</p>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4">
                <h2>About Us</h2>

                <p>Young and inventive team</p>
                <a class="btn btn-toolbar" href="{{route('about')}}">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Projects</h2>

                <p>Some java project for free </p>
                <a class="btn btn-toolbar" href="{{route('project')}}">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Services</h2>

                <p>Web projects , Web sites , Desktop application , Training</p>
                <a class="btn btn-toolbar" href="{{route('service')}}">More Info</a>
            </div>
            <!-- /.col-md-4 -->
        </div>

    </div>
    <hr>
    <!-- /.row -->
@endsection
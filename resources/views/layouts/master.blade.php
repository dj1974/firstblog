<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'/>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'/>
    <link rel="shortcut icon" href="{{ asset('IconBlog.png') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">
</head>
<body>
@include('includes.header')
<div class="container spark-screen" style="padding: 70px">
    @yield('content')
</div>
@include('includes.footer')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"
        integrity="sha256-SOuLUArmo4YXtXONKz+uxIGSKneCJG4x0nVcA0pFzV0=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="{{URL::to('src/js/app.js')}}"></script>
<script src="{{URL::to('src/js/checkbox.js')}}"></script>
<script>
    $('#flash-overlay-modal').modal();
</script>
</body>
</html>

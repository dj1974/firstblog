{{--@if(count($errors) > 0)--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-4 col-md-offset-4 error">--}}
            {{--<ul>--}}
                {{--@foreach($errors->all() as $error)--}}
                    {{--<li>{{$error}}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endif--}}
{{--@if(Session::has('message'))--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-4 col-md-offset-4 success">--}}
            {{--{{Session::get('message')}}--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endif--}}
@if (isset($errors) && $errors->any())
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-danger alert-alt">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                            class="fa fa-times"></i></a>
                <strong><i class="fa fa-bug fa-fw"></i> Something went wrong! </strong><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <br/>
@endif
{{--@if(Session::has('flash_message'))--}}
    {{--<div class="alert alert-success col-md-6 col-md-offset-3">--}}
        {{--<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>--}}
        {{--{{ Session::get('flash_message') }}--}}
    {{--</div>--}}
{{--@endif--}}

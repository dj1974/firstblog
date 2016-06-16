@extends('layouts.master')

@section('title')
    View Post
@endsection

@section('content')
    @include('includes.message-block')
    <section>
        <div class="container spark-screen">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>{{ $post->name}}</h3>
                        </div>

                        <div class="panel-body">
                            <section>
                                <div class="row">
                                    <div class="col-md-10">

                                        @foreach($post->details as $details)
                                            <div class="pull-left">
                                                @if( ! empty($details['image']))
                                                    <img src="/src/image/posts/{{$details['image']}}"
                                                         alt="" style="width:300px;height:300px;"/>
                                                    <h4>{{$details['image_title']}}</h4>
                                                @endif
                                                @if( ! empty($details['video']))
                                                    <iframe width="560" height="315"
                                                            src="http://www.youtube.com/embed/{{$details['video']}}"
                                                            frameborder="0" allowfullscreen></iframe>
                                                @endif

                                                @if(! empty($details['video_title']))
                                                    <h4>{{$details['video_title']}}</h4>
                                                @endif
                                                @if( ! empty($details['body']))
                                                    <h3>{{$details['body']}}</h3>
                                                @endif
                                                <hr>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                            @if(Auth::check() && Auth::user()->type == 'superuser')
                                <a href="{{ route('create.details', $post->id) }}" class="btn btn-toolbar pull-left"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>Create details</a>

                            @endif
                            <a href="{{ route('dashboard') }}" class="btn btn-toolbar pull-right"><i
                                        class="fa fa-arrow-left"></i>
                                Back</a>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::check())
                <section class="row new-comments">
                    <div class="col-md-12">
                        <header><h4>Please put your comment here:</h4></header>
                        <form action="{{route('comment.create',['post_id' => $post->id])}}" method="post">
                            <div class="form-group">
                                    <textarea class="form-control" name="content" id="new-comments" rows="2"
                                              placeholder="Your Comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-toolbar bar"><i class="fa fa-comment"
                                                                                 aria-hidden="true"></i> Post
                                Comment
                            </button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>

                    {{--@if(Auth::check())--}}
                    {{--<a href="#" class="btn toolbar"><i class="fa fa-comment" aria-hidden="true"></i> Comment</a>--}}
                    {{--@endif--}}
                </section>
            @endif
            <section class="row posts">
                <div class="container spark-screen">
                    <div class="col-md-6 col-md-offset-2">
                        <header><h3>Previous comments:</h3></header>
                        @foreach($comments as $comment)
                            <article class="post">
                                <h5>{{$comment->content}}</h5>

                                <div class="info">
                                    Commented by {{$comment->user->first_name}} {{$comment->user->last_name}}
                                    on {{$comment->created_at}}
                                </div>
                                {{--<div class="interactive">--}}
                                {{--@if(Auth::user()->type == 'superuser')--}}
                                {{--|--}}
                                {{--<a href="#" class="edit btn btn-toolbar"><i class="fa fa-pencil-square-o"--}}
                                {{--aria-hidden="true"></i> Edit</a> |--}}
                                {{--<a href="{{route('post.delete',['post_id' => $post->id])}}" class="btn btn-toolbar"><i--}}
                                {{--class="fa fa-times" aria-hidden="true"></i> Delete</a>--}}
                                {{--@endif--}}

                                {{--</div>--}}
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>

    </section>


@endsection
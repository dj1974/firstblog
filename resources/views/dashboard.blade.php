@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    @include('includes.message-block')
    @if(Auth::check() && Auth::user()->type != 'guest')
        <section class="row new-post">
            <div class="container spark-screen">
                <div class="col-md-6 col-md-offset-2">
                    <header><h3>Post:</h3></header>
                    <form action="{{ route('post.create') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Title of the Post:</label>
                            <input class="form-control" type="text" id="name" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="post_image">Add title image of the Post:</label>
                            <input class="form-control" type="file" id="post_image" name="post_image"/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input class="form-control" type="text" id="description" name="description"/>
                        </div>
                        <button type="submit" class="btn btn-toolbar bar"><i class="fa fa-plus" aria-hidden="true"></i>
                            Create Post
                        </button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </section>
    @endif
    <section class="row posts">
        <div class="container spark-screen">
            <div class="col-md-6 col-md-offset-2">
                <header><h3>Previous posts:</h3></header>
                @foreach($posts as $post)
                    <article class="post" data-postid="{{$post->id}}">
                        <h3>{{$post->name}}</h3>
                        @if( ! empty($post->post_image))
                            <a href="{{route('post.show',['post_id' => $post->id])}})"> <img
                                        src="/src/image/posts/title/{{$post['post_image']}}"
                                        alt="" style="width:560px;height:315px;"/></a>
                        @endif
                        <a href="{{route('post.show',['post_id' => $post->id])}}"
                                class="btn btn-toolbar bar">{{$post->description}}
                        </a>

                        <div class="info">
                            Posted by {{$post->user->first_name}} {{$post->user->last_name}} on {{$post->created_at}}
                        </div>
                        <div class="interactive">
                            @if(!Auth::check())
                                <a href="{{route('login')}}" class="btn btn-toolbar bar"><i class="fa fa-sign-in"
                                                                                            aria-hidden="true"></i>
                                    Login to
                                    comment </a> |
                            @endif
                            <a href="{{route('post.show',['post_id' => $post->id])}}" class="btn btn-toolbar bar"><i
                                        class="fa fa-eye" aria-hidden="true"></i>
                                View</a>

                            @if(Auth::user() == $post->user)
                                |
                                <a href="#" class="edit btn btn-toolbar"><i class="fa fa-pencil-square-o"
                                                                            aria-hidden="true"></i> Edit</a> |
                                <a href="{{route('post.delete',['post_id' => $post->id])}}" class="btn btn-toolbar"><i
                                            class="fa fa-times" aria-hidden="true"></i> Delete</a>
                            @endif

                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label>Name:</label>
                            <input class="form-control" id="post-name" name="post-name"/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        var token = '{{Session::token()}}';
        var url = '{{route('edit')}}';
    </script>
@endsection
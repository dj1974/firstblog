@extends('layouts.master')

@section('title')
    Create Post Details
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Create Post Details</h3>

            <form action="{{ route('save.details',['post_id' => $post->id]) }}" method="post" enctype="multipart/form-data" >
                <div class="form-group ">
                    <label for="image">If You Have Image:</label>
                    <input class="form-control" type="file" name="image" id="image" >
                </div>
                <div class="form-group">
                    <label for="image_title">Add Image Title: </label>
                    <input class="form-control" type="text" name="image_title" id="image_title">
                </div>
                <div class="form-group">
                    <label for="video">If You Have Video:</label>
                    <input class="form-control" type="file" name="video" id="video">
                </div>
                <div class="form-group">
                    <label for="video_title">Add Video Title:</label>
                    <input class="form-control" type="text" name="video_title" id="video_title">
                </div>
                <div class="form-group ">
                    <label for="body">Text Content:</label>
                    <textarea class="form-control"  name="body" id="body" placeholder="Your text" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-toolbar bar">Save details</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
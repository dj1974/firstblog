<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use App\Postdetails;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class PostdetailsController extends Controller
{
    /**
     * @param $post_id
     * @return $this
     */
    public function createDetails($post_id)
    {
        $post = Post::where('id', $post_id)->first();
//        dd($post);

        return view('pages.posts.details.create')->with('post', $post);
    }

    /**
     * @param Request $request
     * @param $post_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saveDetails(Request $request, $post_id)
    {
        $post = Post::where('id', $post_id)->first();

//        dd($post);
        $details = new Postdetails();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $post->name . '-' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/src/image/posts/' . $filename));
//            dd($image);
            $details->image = $filename;
            $details->image_title = $request['image_title'];
        }

        $details->image_title = $request['image_title'];

        if ($request->hasFile('video')) {
            $video = $request->file('video');
//            dd($video);
            $name = $video->getClientOriginalName();
            $n = $video->getBasename();
            $e = $video->getRealPath();
            $path = $video->getPath();
//            dd($path);
            $mime = $video->getClientMimeType();
            $ext = $video->getClientOriginalExtension();
            $destination = public_path() . '/uploads';
//            dd($destination);

            $details->body = $request['body'];
            $details->post_id = $post->id;
            $details->video = $name;
            $details->mime = $mime;
            $details->video_title = $request['video_title'];

//            dd($details);

            $video->move($destination, $name);

            $details->save();


        }


        return redirect()->route('post.show', ['post_id' => $post->id]);
    }


//
//    public function getVideo($details_id)
//    {
//        $details = PostDetails::where('id',$details_id)->first();
////        dd($details);
//        $file = new Filesystem();
//        $content = $file->get(public_path('/src/video/posts/') . $details->video);
//        $response = new Response();
//        $response = $response->create($content, 200, ['Content-Type', "video/mp4"]);
//        dd($response);
//        return $response;
//    }
}

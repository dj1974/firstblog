<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use App\Postdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
use Symfony\Component\HttpFoundation\File;

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

        $details = new Postdetails();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $post->name . '-' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(560, 315)->save(public_path('/src/image/posts/' . $filename));
//            dd($image);
            $details->image = $filename;
            $details->image_title = $request['image_title'];
        }

        $details->image_title = $request['image_title'];

        if (Input::has('video')) {
            $link = $request['video'];;

            if (strlen($link) > 11) {
                $video = substr($link, strpos($link, "=") + 1);
                $details->video = $video;
                $details->video_title = $request['video_title'];
            }
        }

        $details->body = $request['body'];
        $details->post_id = $post->id;

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $name = $video->getClientOriginalName();
            $mime = $video->getClientMimeType();
            $dest = public_path() . '/src/video/posts/';

            $details->mime = $mime;
            $details->video = $name;
            $details->video_title = $request['video_title'];
            if ($video->isValid()) {
                $video->move($dest, $name);
//                $text = 'uspelo!';
            }else{
//                $text = 'nije uspelo';
            }
//            $video->move($dest, $name);



        }

        $details->save();

        return redirect()->route('post.show', ['post_id' => $post->id]);
    }

}

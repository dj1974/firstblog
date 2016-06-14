<?php
/**
 * Created by PhpStorm.
 * User: Gile1974
 * Date: 26.5.2016
 * Time: 9:54
 */

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;


class PostController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

//        $path = public_path();
//        $xml = XmlParser::load($path.'/src/files/catalog.xml');
//
//        $books = $xml->parse([
//            'books' =>['uses' => 'book[::id,author,title,genre,price,publish_date,description]'],
//        ]);

//        dd($books);
        $data = array(
            'posts' => $posts
//        , 'books' => $books
        );

        Flash::success('Welcome to Blog Page');
        return view('dashboard')->with($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $post = new Post();
        $post->name = $request['name'];

//        $message = 'There was an error!';
        if ($request->user()->posts()->save($post)) {
            Flash::success('Post successfully added!');
        }

        return redirect()->route('dashboard');
    }

    /**
     * @param $post_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->delete();
        Flash::success('Post successfully deleted!');

        return redirect()->route('dashboard');
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->name = $request['name'];
        $post->update();
//        $request->session()->flash('flash_message', 'Post successfully updated!');
        Flash::succes('Post successfully updated!');
        return response()->json(['new_name' => $post->name, 'new_body' => $post->body], 200);
    }

    /**
     * @param $post_id
     * @return mixed
     */
    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();
 /*       $comment = $comments->first();
        $user = $comment;
        dd($comments);*/
        $data = array(
            'post' => $post,
            'comments' => $comments
        );
        return view('pages.posts.show')->with($data);
    }


}

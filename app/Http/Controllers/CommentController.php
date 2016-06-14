<?php
/**
 * Created by PhpStorm.
 * User: Gile1974
 * Date: 8.6.2016
 * Time: 11:22
 */

namespace app\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @param $post_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreateComment($post_id, Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:500'
        ]);
        $post = Post::where('id', $post_id)->first();
        $user = Auth::user();


        $comment = new Comment();

        $comment->content = $request['content'];
        $comment->post_id = $post->id;
        $comment->user_id = $user->id;

//        dd($comment);
        $comment->save();

        Flash::success('Comment successfully added!');

        return redirect()->back();
    }

    /**
     *
     */
//    public function postParseXml()
//    {
//        $xml = (new Reader(new Document()))->load('path/to/above.xml');
//        $products = $xml->parse([
//            'Rank' => ['uses' => 'product.rank'],
//            'ProductType' => ['uses' => 'product.type']
//        ]);
//
//        return view('dashboard',['products' => $products]);
//    }
}
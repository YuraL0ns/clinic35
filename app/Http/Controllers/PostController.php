<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function getPostsList()
    {
        return view('tmp.sait.page.posts.list', [
        'posts' => Post::all(),
    ]);
    }


    public function getPostData($post_alias)
    {
        $post = Post::where('post_alias', $post_alias)->first();

        return view('tmp.sait.page.posts.show', [
            'post' => $post,
        ]);
    }
}

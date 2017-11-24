<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(Post $post) {
        $post = Post::latest()->get();
        return view('posts.index', ['posts' => $post]);
    }

    public function show(Post $post) {
        // dd($post->comment);
        return view('posts.show',['post' => $post]);
    }
}

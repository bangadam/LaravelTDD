<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	public function __construct() {
		$this->middleware('auth')->only('store');
	}

    public function index(Post $post) {
        $post = Post::latest()->get();
        return view('posts.index', ['posts' => $post]);
    }

    public function show(Post $post) {
        // dd($post->comment);
        return view('posts.show',['post' => $post]);
    }

    public function store(Request $request) {
    	$post = Post::create([
    		'user_id'  => auth()->id(),
    		'title'  => $request->title,
    		'body'  => $request->body
    	]);
    	return redirect('/blog/'.$post->id);
    }

    public function create() {
    	return view('posts.create');
    }
}

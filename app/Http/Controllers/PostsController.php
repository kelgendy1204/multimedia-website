<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

	public function index() {
		// $posts = DB::table('posts')->latest()->get();
		// $posts = Post::all();
		// $posts = Post::where('visible', 0)->get();

		$posts = Post::get_all_visible();
		return view('posts.posts', ['posts' => $posts]);
	}

	// public function show($id) {
	// 	// $post = DB::table('posts')->find($id);

	// 	$post = Post::find($id);
	// 	return view('posts.show', ['post' => $post]);
	// }

	public function show(Post $post) {
		return view('posts.show', ['post' => $post]);
	}

}

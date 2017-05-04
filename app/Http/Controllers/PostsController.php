<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;
use App\Category;

class PostsController extends Controller
{

	// get : / home page
	public function index(Request $request) {
		$parameters = Input::except('page');
		$category = $request->input('category');
		$search = $request->input('search');

		$categories = Category::all();
		$posts = Post::get_all_visible($category, $search);

		return view('posts.posts', [
			'posts' => $posts,
			'categories' => $categories,
			'parameters' => $parameters
		]);
	}

/*	public function show($id) {
		$post = DB::table('posts')->find($id);
		$post = Post::find($id);
		return view('posts.show', ['post' => $post]);
	}*/

	// get : posts/{id} - show a post
	public function show(Post $post) {
		$category = Category::find($post->category_id);
		return view('posts.show', ['post' => $post, 'category' => $category->name]);
	}

	// get : posts/create - create a post view
	public function create() {
		$categories = Category::all();
		return view('posts.create', ['categories' => $categories]);
	}

	// post : posts/store - save a post
	public function store(Request $request) {
		$post = new Post;
		$post->title = request('title');
		$post->description = request('description');
		$post->short_description = request('short_description');
		$post->visible = request('visible') == "on" ? true : false;
		$post->pinned = request('pinned') == "on" ? true : false;
		$post->category_id = request('category');
		$post->save();

		$imageFile = $request->file('postimage');
		$uniqid = uniqid($post->id, true) . "." . $imageFile->getClientOriginalExtension();
		if($request->hasFile('postimage') && $imageFile->isValid()) {
			$imageFile->move('postimages/', $uniqid);
			$post->photo_url = "/postimages/" . $uniqid;
			$post->save();
		}

		return redirect('/');
	}
}

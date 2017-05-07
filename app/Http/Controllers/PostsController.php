<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;
use App\Category;
use App\Advertisement;

class PostsController extends Controller
{

	public function __construct()
	{
		$this->middleware('IsAdmin')->only(['create', 'store']);
	}

	// get : / home page
	public function index(Request $request) {
		$parameters = Input::except('page');
		$category = $request->input('category');
		$search = $request->input('search');

		$categories = Category::all();
		$advertisements = Advertisement::all()->keyBy('name');
		$posts = Post::get_all_visible($category, $search);

		return view('posts.posts', [
			'posts' => $posts,
			'categories' => $categories,
			'parameters' => $parameters,
			'advertisements' => $advertisements,
		]);
	}

	// get : posts/{id} - show a post
	public function show(Post $post) {
		$category = Category::find($post->category_id);
		return view('posts.show', ['post' => $post, 'category' => $category]);
	}

	// get : posts/{id}/download - show a post links
	public function download(Post $post) {
		$category = Category::find($post->category_id);
		return view('posts.download', ['post' => $post, 'category' => $category]);
	}

	// get : posts/{id}/online - watch post online
	public function online(Post $post) {
		$category = Category::find($post->category_id);
		return view('posts.online', ['post' => $post, 'category' => $category]);
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
		$post->download_page = request('download_page');
		$post->online_page = request('online_page');
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

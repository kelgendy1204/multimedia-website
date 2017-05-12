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
		$this->middleware('IsAdmin')->only(['adminindex', 'create', 'store', 'edit', 'update']);
	}

	// get : / home page
	public function index(Request $request) {
		$parameters = Input::except('page');
		$category = $request->input('category');
		$search = $request->input('search');

		$categories = Category::all();
		$advertisements = Advertisement::all()->keyBy('name');
		$posts = Post::get_all_visible($category, $search, null);

		return view('posts.posts', [
			'posts' => $posts,
			'categories' => $categories,
			'parameters' => $parameters,
			'advertisements' => $advertisements,
		]);
	}

	// get : admin/posts - show all posts
	public function adminindex() {
		$categories = Category::all();
		$parameters = Input::except('page');
		$search = request()->input('search');
		$category = request()->input('category');

		$posts = Post::get_all_posts($category, $search);

		return view('admin.posts.index' , [
			'categories' => $categories,
			'posts' => $posts,
			'parameters' => $parameters
		]);

	}

	// get : posts/{id} - show a post
	public function show(Post $post) {
		$category = Category::find($post->category_id);
		$subpost = $post->subposts()->where('visible', '1')->latest()->first();
		return view('posts.show', ['post' => $post, 'category' => $category, 'subpost' => $subpost]);
	}

	// get : posts/{id}/download - show a post links
	public function download(Post $post) {
		$category = Category::find($post->category_id);
		return view('posts.download', ['post' => $post, 'category' => $category]);
	}

	// // get : admin/posts/{id}/edit - edit a post view
	public function edit($post) {
		$post = Post::find($post);
		if(!$post){
			return redirect()->action('PostsController@create');
		}
		$categories = Category::all();
		$post->subposts;
		return view('admin.posts.create', ['categories' => $categories, 'post' => $post]);
	}

	// // post : admin/posts/{id}/update - edit a post view
	public function update(Post $post) {
		$categories = Category::all();
		$post->title = request('title');
		$post->description = request('description');
		$post->download_page = request('download_page');
		$post->visible = request('visible') == "on" ? true : false;
		$post->pinned = request('pinned') == "on" ? true : false;
		$post->category_id = request('category');
		$imageFile = request()->file('postimage');
		if(request()->hasFile('postimage') && $imageFile->isValid()) {
			$uniqid = uniqid($post->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move('postimages/', $uniqid);
			$post->photo_url = "/postimages/" . $uniqid;
		}
		$post->save();

		return redirect()->action(
			'PostsController@adminindex'
		);

	}

	// get : admin/posts/create - create a post view
	public function create() {
		$categories = Category::all();
		return view('admin.posts.create', ['categories' => $categories]);
	}

	// post : admin/posts - save a post
	public function store(Request $request) {
		$post = new Post;
		$post->title = request('title');
		$post->description = request('description');
		$post->download_page = request('download_page');
		$post->visible = request('visible') == "on" ? true : false;
		$post->pinned = request('pinned') == "on" ? true : false;
		$post->category_id = request('category');
		$post->save();

		$imageFile = $request->file('postimage');
		if($request->hasFile('postimage') && $imageFile->isValid()) {
			$uniqid = uniqid($post->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move('postimages/', $uniqid);
			$post->photo_url = "/postimages/" . $uniqid;
			$post->save();
		}

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

}

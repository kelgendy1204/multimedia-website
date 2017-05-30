<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Advertisement;

class PostsController extends Controller
{

	public function __construct()
	{
		$this->middleware('IsAdmin')->only(['adminindex', 'create', 'store', 'edit', 'update', 'delete', 'adminindexbycategory']);
	}

	// get : / home page
	public function index(Request $request) {
		$parameters = Input::except('page');
		$search = $request->input('search');

		$categories = Category::all();
		$advertisements = Advertisement::all()->keyBy('name');
		$posts = Post::get_all_visible(null, $search, null);

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

		$posts = Post::get_all_posts(null, $search);

		return view('admin.posts.index' , [
			'categories' => $categories,
			'posts' => $posts,
			'parameters' => $parameters
		]);
	}

	// get : /{postdesc} - show a post
	public function show($postdesc) {
		$categories = Category::all();
		$post = Post::where('description', $postdesc)->latest()->first();
		$post->increment('visits');
		$category = Category::find($post->category_id);
		$subpost = $post->subposts()->where('visible', '1')->latest()->first();
		return view('posts.show', ['post' => $post, 'category' => $category, 'subpost' => $subpost, 'categories' => $categories]);
	}

	// get : admin/posts/{id}/edit - edit a post view
	public function edit($post) {
		$post = Post::find($post);
		$maxposition = Post::select('position')->max('position');
		if(!$post){
			return redirect()->action('PostsController@create');
		}
		$categories = Category::all();
		$post->subposts;
		return view('admin.posts.create', ['categories' => $categories, 'post' => $post, 'maxposition' => $maxposition]);
	}

	// // post : admin/posts/{id}/update - edit a post view
	public function update(Post $post) {
		$categories = Category::all();
		$post->title = request('title');
		$post->description = request('description');
		$post->download_page = request('download_page');
		$post->long_description = request('long_description');
		$post->visible = request('visible') == "on" ? true : false;
		$post->pinned = request('pinned') == "on" ? true : false;
		$post->category_id = request('category');
		$post->meta_description = request('meta_description');
		$post->position = request('position');
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
		$post->key_words = request('key_words');
		$post->download_page = request('download_page');
		$post->long_description = request('long_description');
		$post->visible = request('visible') == "on" ? true : false;
		$post->pinned = request('pinned') == "on" ? true : false;
		$post->category_id = request('category');
		$post->meta_description = request('meta_description');
		$post->user_id = Auth::id();
		$post->save();


		$imageFile = $request->file('postimage');

		if($request->hasFile('postimage') && $imageFile->isValid()) {
			$uniqid = uniqid($post->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move('postimages/', $uniqid);
			$post->photo_url = "/postimages/" . $uniqid;
		}

		$maxposition = Post::select('position')->max('position');

		if($maxposition) {
			$post->position = ($maxposition >= $post->id) ? ($maxposition + 1) : $post->id;
		} else {
			$post->position = $post->id;
		}

		$post->save();

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

	// post : /admin/posts/{postid}/delete
	public function delete($postid)
	{
		$post = Post::find($postid);

		foreach ($post->subposts as $subpost) {
			$subpost->servers()->delete();
		}
		$post->subposts()->delete();

		foreach ($post->downloadlinks as $downloadlink) {
			$downloadlink->downloadservers()->delete();
		}
		$post->downloadlinks()->delete();

		$post->delete();

		return redirect()->action(
			'PostsController@adminindex'
		);
	}

	// get: show admin posts by category
	public function adminindexbycategory($categoryname)
	{

		$category = Category::where('name', $categoryname)->first();
		$parameters = Input::except('page');
		$search = request()->input('search');
		$categories = Category::all();
		$posts = Post::get_all_posts($category->name_en, $search, null);

		return view('admin.posts.index', [
			'categories' => $categories,
			'posts' => $posts,
			'parameters' => $parameters
		]);
	}

}

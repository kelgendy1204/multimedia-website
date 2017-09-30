<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Metadata;
use App\Advertisement;

class PostsController extends Controller
{

	public function __construct()
	{
		$this->middleware('IsAdminAtLeast')->only(['delete', 'adminindexbycategory']);
		$this->middleware('IsEditorAtLeast')->only(['adminindex', 'create', 'store', 'edit', 'update']);
	}

	private function getCategoriesForUser()
	{
		$categories = collect();
		if(request()->user()->hasRole('editor')) {
			$filtered_roles = request()->user()->roles->filter(function ($item) {
				return $item['name'] != 'editor';
			});

			foreach (Category::all() as $category) {

				$isRoleExist = $filtered_roles->every(function ($role) use ($category) {
					return $category['name_en'] == $role->name;
				});

				if($isRoleExist) {
					$categories->push($category);
				}
			}
		} else{
			$categories = Category::all();
		}

		return $categories;
	}

	private function showActivePost($postdesc)
	{
		$categories = Category::all();
		$post = Post::where('description', $postdesc)->where('visible', '1')->latest()->first();
		if(!$post){
			return redirect()->action(
				'PostsController@index'
			);
		}
		$post->increment('visits');
		$advertisements = Advertisement::all()->keyBy('name');
		$category = Category::find($post->category_id);
		$subpost = $post->subposts()->where('visible', '1')->latest()->first();
		$playlist = $post->playlists()->where('visible', '1')->latest()->first();
		return view('posts.show', array_merge([
			'post' => $post,
			'category' => $category,
			'subpost' => $subpost,
			'playlist' => $playlist,
			'categories' => $categories,
			'advertisements' => $advertisements
		], Metadata::getMetadata()) );
	}

	// get : / home page
	public function index(Request $request) {
		$parameters = Input::except('page');
		$search = $request->input('search');

		$categories = Category::all();
		$advertisements = Advertisement::all()->keyBy('name');
		$posts = Post::get_all_visible(null, $search, null);

		return view('posts.posts', array_merge([
			'posts' => $posts,
			'categories' => $categories,
			'parameters' => $parameters,
			'advertisements' => $advertisements,
		], Metadata::getMetadataForHome()) );

	}

	// get : admin/posts - show all posts
	public function adminindex() {
		$search = request()->input('search');
		$parameters = Input::except('page');

		if( request()->user()->hasRole('editor') ) {
			$posts = Post::get_posts_for_editor( request()->user()->id , $search );
			$categories = [];
			return view('admin.posts.index' , [
				'categories' => $categories,
				'posts' => $posts,
				'parameters' => $parameters
			]);
		}

		$userid = request()->input('userid');
		$categories = Category::all();
		$posts = Post::get_all_posts(null, $search, $userid);
		return view('admin.posts.index' , [
			'categories' => $categories,
			'posts' => $posts,
			'parameters' => $parameters
		]);
	}

	// get : /{postdesc} - show a post
	public function show($postdesc) {
		return $this->showActivePost($postdesc);
	}

	// get : /{postdesc}/alt/{num} - show a post
	public function showalt($postdesc, $num) {
		return $this->showActivePost($postdesc);
	}

	// get : admin/posts/{id}/edit - edit a post view
	public function edit($post) {

		$maxposition = Post::select('position')->max('position');
		$categories = $this->getCategoriesForUser();

		$activepost = null;
		if( request()->user()->hasRole('editor') ) {
			$activepost = Post::where('id' , $post)->where('user_id', request()->user()->id)->with('subposts')->with('downloadlinks')->with('playlists')->first();
		} else {
			$activepost = Post::where('id' , $post)->with('subposts')->with('downloadlinks')->with('playlists')->first();
		}

		if(!$activepost){
			return redirect()->action('PostsController@create');
		}

		return view('admin.posts.create', ['categories' => $categories, 'post' => $activepost, 'maxposition' => $maxposition]);
	}

	// // post : admin/posts/{id}/update - edit a post view
	public function update(Post $post) {
		$post->title = request('title');
		$post->key_words = request('key_words');
		$post->description = str_replace(" ","-", request('description'));
		$post->download_page = request('download_page');
		$post->long_description = request('long_description');
		$post->meta_description = request('meta_description');

		if(request()->user()->hasRole('editor')) {
			$category_id = request('category');
			$category_check = request()->user()->hasRole(Category::find($category_id)['name_en']);
			if($category_check) {
				$post->category_id = $category_id;
			} else {
				abort(403, 'Unauthorized action.');
			}
		} else {
			$post->alt_link = request('alt_link');
			$post->visible = request('visible') == "on" ? true : false;
			$post->pinned = request('pinned') == "on" ? true : false;
			$post->category_id = request('category');
			$post->position = request('position');
		}

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
		$categories = $this->getCategoriesForUser();
		return view('admin.posts.create', ['categories' => $categories]);
	}

	// post : admin/posts - save a post
	public function store(Request $request) {
		$post = new Post;
		$post->title = request('title');
		$post->key_words = request('key_words');
		$post->description = str_replace(" ","-", request('description'));
		$post->download_page = request('download_page');
		$post->long_description = request('long_description');
		$post->meta_description = request('meta_description');

		if(request()->user()->hasRole('editor')) {
			$post->alt_link = null;
			$post->visible = false;
			$post->pinned = false;

			$category_id = request('category');
			$category_check = request()->user()->hasRole(Category::find($category_id)['name_en']);
			if($category_check) {
				$post->category_id = $category_id;
			} else {
				abort(403, 'Unauthorized action.');
			}
		} else {
			$post->alt_link = request('alt_link');
			$post->visible = request('visible') == "on" ? true : false;
			$post->pinned = request('pinned') == "on" ? true : false;
			$post->category_id = request('category');
		}

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

		foreach ($post->playlists as $playlist) {
			$playlist->audios()->delete();
		}
		$post->playlists()->delete();

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

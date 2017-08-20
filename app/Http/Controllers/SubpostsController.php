<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Subpost;
use App\Server;
use App\Category;
use App\Metadata;
use App\Advertisement;
use \Helpers\CheckUser;

class SubpostsController extends Controller
{

	public function __construct()
	{
		$this->middleware('IsEditorAtLeast')->except(['show']);
	}

	// get : /{postdesc}/مشاهدة مباشرة/{subposttitle} - watch post online
	public function show($postdesc, $subposttitle) {
		$categories = Category::all();
		$advertisements = Advertisement::all()->keyBy('name');

		$post = Post::where('description', $postdesc)->with('downloadlinks')->with('playlists')->with('subposts')->latest()->first();

		$latestplaylist = $post->playlists()->where('visible', '1')->latest()->first();

		$subpost = $post->subposts()->where('visible', '1')->where('title', $subposttitle)->latest()->first();

		$subposts = $post->subposts()->where('visible', '1')->latest()->get();

		$category = Category::find($post->category_id);

		$randomPosts = collect(Post::get_random_posts($post->category_id))->shuffle();

		$servers = [];
		if($subpost){
			$servers = $subpost->servers()->orderBy('position')->get();
		}

		return view('posts.online',  array_merge([
			'categories' => $categories,
			'post' => $post, 'subposts' => $subposts,
			'category' => $category,
			'activesubpost' => $subpost,
			'servers' => $servers,
			'latestplaylist' => $latestplaylist,
			'advertisements' => $advertisements,
			'randomPosts' => $randomPosts], Metadata::getMetadata()) );
	}

	// get : admin/posts/{id}/online/create - create a post view
	public function create($post)
	{
		if(!CheckUser::checkUserPost(request() , $post)) {
			return redirect()->action('PostsController@adminindex');
		}

		$post = Post::find($post);
		return view('admin.subposts.create', ['post' => $post]);
	}

	// post : admin/posts/{id}/online/create - create a post view
	public function store($post)
	{
		if(!CheckUser::checkUserPost(request() , $post)) {
			return redirect()->action('PostsController@adminindex');
		}

		$post = Post::find($post);
		$subpost = new Subpost;
		$subpost->title = request('title');
		$subpost->visible = request('visible') == "on" ? true : false;
		$post->subposts()->save($subpost);

		$servers = [];
		$servernames = request('servername');
		$serverlinks = request('serverlink');
		$serverpositions = request('serverposition');

		if($serverlinks){
			foreach ($serverlinks as $index => $serverlink) {
				if($serverlink){
					$server = new Server;
					$server->name = $servernames[$index];
					$server->position = $serverpositions[$index] ? $serverpositions[$index] : $index;
					$server->link = $serverlink;
					$servers[] = $server;
				}
			}
			$subpost->servers()->saveMany($servers);
		}

		$imageFile = request()->file('photo_url');

		if(request()->hasFile('photo_url') && $imageFile->isValid()) {
			$uniqid = uniqid($subpost->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move('subpostimages/', $uniqid);
			$subpost->photo_url = "/subpostimages/" . $uniqid;
		}

		$subpost->save();

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

	// get : admin/posts/{post_id}/online/{subpost_id}/edit - edit a post view
	public function edit($post, $subpostid)
	{
		if(!CheckUser::checkUserPost(request() , $post)) {
			return redirect()->action('PostsController@adminindex');
		}

		$post = Post::find($post);
		$subpost= $post->subposts()->where('id', $subpostid)->with([
			'servers' => function ($query){
				$query->orderBy('position');
			}])->first();

		if($subpost){
			return view('admin.subposts.create', ['post' => $post, 'subpost' => $subpost]);
		}

		return redirect()->action(
			'SubpostsController@create', ['post' => $post]
		);
	}

	// post : admin/posts/{post_id}/online/{subpost_id}/edit - update a post view
	public function update($post, $subpostid)
	{
		if(!CheckUser::checkUserPost(request() , $post)) {
			return redirect()->action('PostsController@adminindex');
		}

		$post = Post::find($post);
		$subpost = $post->subposts()->where('id', $subpostid)->first();
		$subpost->title = request('title');
		$subpost->visible = request('visible') == "on" ? true : false;

		$servers = [];
		$servernames = request('servername');
		$serverlinks = request('serverlink');
		$serverpositions = request('serverposition');

		if($serverlinks){
			foreach ($serverlinks as $index => $serverlink) {
				if($serverlink){
					$server = new Server;
					$server->name = $servernames[$index];
					$server->position = $serverpositions[$index] ? $serverpositions[$index] : $index;
					$server->link = $serverlink;
					$servers[] = $server;
				}
			}
		}

		$subpost->servers()->delete();
		$subpost->servers()->saveMany($servers);

		$imageFile = request()->file('photo_url');

		if(request()->hasFile('photo_url') && $imageFile->isValid()) {
			$uniqid = uniqid($subpost->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move('subpostimages/', $uniqid);
			$subpost->photo_url = "/subpostimages/" . $uniqid;
		}

		$subpost->save();

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

	public function delete($post, $subpost)
	{
		if(!CheckUser::checkUserPost(request() , $post)) {
			return redirect()->action('PostsController@adminindex');
		}

		$post = Post::find($post);

		$subpost = Subpost::find($subpost);

		if($subpost){
			$subpost->servers()->delete();
			$subpost->delete();
		}

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Subpost;
use App\Server;
use App\Category;

class SubpostsController extends Controller
{

	public function __construct()
	{
		$this->middleware('IsAdmin')->except(['show']);
	}

	// get : /{postdesc}/مشاهدة مباشرة/{subposttitle} - watch post online
	public function show($postdesc, $subposttitle) {
		$categories = Category::all();

		$post = Post::where('description', $postdesc)->latest()->first();

		$subpost= $post->subposts()->where('visible', '1')->where('title', $subposttitle)->latest()->first();

		$subposts = $post->subposts()->where('visible', '1')->latest()->get();

		$category = Category::find($post->category_id);

		$randomPosts = collect(Post::get_random_posts($post->category_id))->shuffle();

		$servers = [];
		if($subpost){
			$servers = $subpost->servers()->orderBy('name')->get();
		}

		return view('posts.online', ['categories' => $categories, 'post' => $post, 'subposts' => $subposts, 'category' => $category, 'activesubpost' => $subpost, 'servers' => $servers, 'randomPosts' => $randomPosts]);
	}

	// get : admin/posts/{id}/online/create - create a post view
	public function create(Post $post)
	{
		return view('admin.subposts.create', ['post' => $post]);
	}

	// post : admin/posts/{id}/online/create - create a post view
	public function store(Post $post)
	{
		$subpost = new Subpost;
		$subpost->title = request('title');
		$subpost->visible = request('visible') == "on" ? true : false;
		$post->subposts()->save($subpost);

		$servers = [];
		$servernames = request('servername');
		$serverlinks = request('serverlink');

		if($serverlinks){
			foreach ($serverlinks as $index => $serverlink) {
				if($serverlink){
					$server = new Server;
					$server->name = $servernames[$index];
					$server->link = $serverlink;
					$servers[] = $server;
				}
			}
			$subpost->servers()->saveMany($servers);
		}

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

	// get : admin/posts/{post_id}/online/{subpost_id}/edit - edit a post view
	public function edit(Post $post, $subpostid)
	{
		$subpost= $post->subposts()->where('id', $subpostid)->with('servers')->first();

		if($subpost){
			return view('admin.subposts.create', ['post' => $post, 'subpost' => $subpost]);
		}

		return redirect()->action(
			'SubpostsController@create', ['post' => $post]
		);
	}

	// post : admin/posts/{post_id}/online/{subpost_id}/edit - update a post view
	public function update(Post $post, $subpostid)
	{
		$subpost = $post->subposts()->where('id', $subpostid)->first();
		$subpost->title = request('title');
		$subpost->visible = request('visible') == "on" ? true : false;

		$servers = [];
		$servernames = request('servername');
		$serverlinks = request('serverlink');

		if($serverlinks){
			foreach ($serverlinks as $index => $serverlink) {
				if($serverlink){
					$server = new Server;
					$server->name = $servernames[$index];
					$server->link = $serverlink;
					$servers[] = $server;
				}
			}
		}

		$subpost->servers()->delete();
		$subpost->servers()->saveMany($servers);
		$subpost->save();

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

	public function delete(Post $post, $subpost)
	{

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

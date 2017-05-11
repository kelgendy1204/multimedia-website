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
		$this->middleware('IsAdmin')->only(['create', 'store' ]);
	}

	// get : posts/{postid}/online/{subpostid} - watch post online
	public function show(Post $post, $subpostid) {
		$subpost= $post->subposts()->where('id', $subpostid)->first();

		$subposts = $post->subposts()->where('visible', '1')->get();

		$category = Category::find($post->category_id);

		$servers = [];

		$randomPosts = Post::get_all_visible($category->category_name_en, null, 20)->shuffle();

		if($subpost){
			$servers = $subpost->servers;
		}

		return view('posts.online', ['post' => $post, 'subposts' => $subposts, 'category' => $category, 'activesubpost' => $subpost, 'servers' => $servers, 'randomPosts' => $randomPosts]);
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
		foreach ($serverlinks as $index => $serverlink) {
			if($serverlink){
				$server = new Server;
				$server->name = $servernames[$index];
				$server->link = $serverlink;
				$servers[] = $server;
			}
		}
		$subpost->servers()->saveMany($servers);
		return back()->with(['post' => $post]);
	}
}

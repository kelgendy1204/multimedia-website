<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Downloadlink;
use App\Downloadserver;
use \Helpers\Urlshorten;

class DownloadlinksController extends Controller
{

	public function __construct()
	{
		$this->middleware('IsAdmin')->except(['show']);
	}

	// get : posts/{postid}/download - show a post links
	public function show($post) {
		$post = Post::find($post);

		$downloadlinks = $post->downloadlinks()->with('downloadservers')->where('visible', '1')->get();

		$category = Category::find($post->category_id);

		$randomPosts = Post::get_all_visible($category->category_name_en, null, 20)->where('category_id', $post->category_id)->shuffle();

		return view('posts.download', ['post' => $post, 'downloadlinks' => $downloadlinks, 'category' => $category, 'randomPosts' => $randomPosts]);

	}

	// get : admin/posts/{id}/download/create - create download links
	public function create($post)
	{
		$post = Post::find($post);
		return view('admin.downloadlinks.create', ['post' => $post]);
	}

	// post : admin/posts/{id}/download/create - store download links
	public function store($post)
	{
		$post = Post::find($post);

		$downloadlink = new Downloadlink;
		$downloadlink->name = request('name');
		$downloadlink->visible = request('visible') == "on" ? true : false;
		$post->downloadlinks()->save($downloadlink);

		$downloadservers = [];
		$downloadservernames = request('downloadservername');
		$downloadserverlinks = request('downloadserverlink');

		if($downloadserverlinks){
			foreach ($downloadserverlinks as $index => $downloadserverlink) {
				if($downloadserverlink){
					$downloadserver = new Downloadserver;
					$downloadserver->name = $downloadservernames[$index];
					$link = Urlshorten::makeGetShortenUrl($downloadserverlink);
					$downloadserver->link = url('/') . "/generatelink/" . $link->hash;
					$downloadservers[] = $downloadserver;
				}
			}
			$downloadlink->downloadservers()->saveMany($downloadservers);
		}

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

	// get : admin/posts/{post_id}/download/edit/{downloadlink_id} - edit a download links
	public function edit($post, $downloadlink)
	{
		$post = Post::find($post);

		$downloadlink = $post->downloadlinks()->where('id', $downloadlink)->with('downloadservers')->first();

		if($downloadlink){
			return view('admin.downloadlinks.create', ['post' => $post, 'downloadlink' => $downloadlink]);
		}

		return redirect()->action(
			'DownloadlinksController@create', ['post' => $post]
		);
	}

	// post : admin/posts/{post_id}/online/{subpost_id}/edit - update a post view
	public function update($post, $downloadlink)
	{
		$post = Post::find($post);

		$downloadlink = $post->downloadlinks()->where('id', $downloadlink)->first();
		$downloadlink->name = request('name');
		$downloadlink->visible = request('visible') == "on" ? true : false;

		$downloadservers = [];
		$downloadservernames = request('downloadservername');
		$downloadserverlinks = request('downloadserverlink');

		if($downloadserverlinks){
			foreach ($downloadserverlinks as $index => $downloadserverlink) {
				if($downloadserverlink){
					$downloadserver = new Downloadserver;
					$downloadserver->name = $downloadservernames[$index];
					$link = Urlshorten::makeGetShortenUrl($downloadserverlink);
					$downloadserver->link = url('/') . "/generatelink/" . $link->hash;
					$downloadservers[] = $downloadserver;
				}
			}
		}

		$downloadlink->downloadservers()->delete();
		$downloadlink->downloadservers()->saveMany($downloadservers);
		$downloadlink->save();

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

	public function delete($post, $downloadlink)
	{
		$post = Post::find($post);
		$downloadlink = Downloadlink::find($downloadlink);

		if($downloadlink){
			$downloadlink->downloadservers()->delete();
			$downloadlink->delete();
		}

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Downloadlink;
use App\Downloadserver;
use App\Metadata;
use App\Advertisement;
use \Helpers\Urlshorten;
use \Helpers\CheckUser;

class DownloadlinksController extends Controller
{

	public function __construct()
	{
		$this->middleware('IsEditorAtLeast')->except(['show']);
	}

	// get : /{postdesc}/تحميل مباشر - show a post links
	public function show($postdesc) {
		$categories = Category::all();
		$advertisements = Advertisement::all()->keyBy('name');

		$post = Post::where('description', $postdesc)->where('visible', '1')->with('downloadlinks')->with('playlists')->with('subposts')->latest()->first();

		$latestsubpost = $post->subposts()->where('visible', '1')->latest()->first();
		$latestplaylist = $post->playlists()->where('visible', '1')->latest()->first();

		$downloadlinks = $post->downloadlinks()->with([
			'downloadservers' => function ($query){
				$query->orderBy('position');
			}])->where('visible', '1')->latest()->get();

		$category = Category::find($post->category_id);

		$randomPosts = collect(Post::get_random_posts($post->category_id))->shuffle();

		return view('posts.download', array_merge([
			'categories' => $categories,
			'post' => $post,
			'downloadlinks' => $downloadlinks,
			'category' => $category,
			'randomPosts' => $randomPosts,
			'latestsubpost' => $latestsubpost,
			'advertisements' => $advertisements,
			'latestplaylist' => $latestplaylist], Metadata::getMetadata()) );
	}

	// get : admin/posts/{id}/download/create - create download links
	public function create($post)
	{
		if(!CheckUser::checkUserPost(request() , $post)) {
			return redirect()->action('PostsController@adminindex');
		}

		$post = Post::find($post);
		return view('admin.downloadlinks.create', ['post' => $post]);
	}

	// post : admin/posts/{id}/download/create - store download links
	public function store($post)
	{
		if(!CheckUser::checkUserPost(request() , $post)) {
			return redirect()->action('PostsController@adminindex');
		}

		$post = Post::find($post);

		$downloadlink = new Downloadlink;
		$downloadlink->name = request('name');
		$downloadlink->visible = request('visible') == "on" ? true : false;
		$post->downloadlinks()->save($downloadlink);

		$downloadservers = [];
		$downloadservernames = request('downloadservername');
		$downloadserverlinks = request('downloadserverlink');
		$downloadserverpositions = request('downloadserverposition');

		if($downloadserverlinks){
			foreach ($downloadserverlinks as $index => $downloadserverlink) {
				if($downloadserverlink){
					$downloadserver = new Downloadserver;
					$downloadserver->name = $downloadservernames[$index];
					$downloadserver->position = $downloadserverpositions[$index] ? $downloadserverpositions[$index] : $index;
					$link = Urlshorten::makeGetShortenUrl($downloadserverlink);
					$downloadserver->link = "/generatelink/" . $link->hash;
					$downloadservers[] = $downloadserver;
				}
			}
			$downloadlink->downloadservers()->saveMany($downloadservers);
		}

		$imageFile = request()->file('photo_url');

		if(request()->hasFile('photo_url') && $imageFile->isValid()) {
			$uniqid = uniqid($downloadlink->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move('downloadimages/', $uniqid);
			$downloadlink->photo_url = "/downloadimages/" . $uniqid;
		}

		$downloadlink->save();

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

	// get : admin/posts/{post_id}/download/edit/{downloadlink_id} - edit a download links
	public function edit($post, $downloadlink)
	{
		if(!CheckUser::checkUserPost(request() , $post)) {
			return redirect()->action('PostsController@adminindex');
		}

		$post = Post::find($post);

		$downloadlink = $post->downloadlinks()->where('id', $downloadlink)->with([
			'downloadservers' => function ($query){
				$query->orderBy('position');
			}])->first();

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
		if(!CheckUser::checkUserPost(request() , $post)) {
			return redirect()->action('PostsController@adminindex');
		}

		$post = Post::find($post);

		$downloadlink = $post->downloadlinks()->where('id', $downloadlink)->first();
		$downloadlink->name = request('name');
		$downloadlink->visible = request('visible') == "on" ? true : false;

		$downloadservers = [];
		$downloadservernames = request('downloadservername');
		$downloadserverlinks = request('downloadserverlink');
		$downloadserverpositions = request('downloadserverposition');

		if($downloadserverlinks){
			foreach ($downloadserverlinks as $index => $downloadserverlink) {
				if($downloadserverlink){
					$downloadserver = new Downloadserver;
					$downloadserver->name = $downloadservernames[$index];
					$downloadserver->position = $downloadserverpositions[$index] ? $downloadserverpositions[$index] : $index;
					$link = Urlshorten::makeGetShortenUrl($downloadserverlink);
					$downloadserver->link = "/generatelink/" . $link->hash;
					$downloadservers[] = $downloadserver;
				}
			}
		}

		$downloadlink->downloadservers()->delete();
		$downloadlink->downloadservers()->saveMany($downloadservers);
		$downloadlink->save();

		$imageFile = request()->file('photo_url');

		if(request()->hasFile('photo_url') && $imageFile->isValid()) {
			$uniqid = uniqid($downloadlink->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move('downloadimages/', $uniqid);
			$downloadlink->photo_url = "/downloadimages/" . $uniqid;
		}

		$downloadlink->save();

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

	public function delete($post, $downloadlink)
	{
		if(!CheckUser::checkUserPost(request() , $post)) {
			return redirect()->action('PostsController@adminindex');
		}

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Playlist;
use App\Audio;
use App\Category;
use App\Metadata;
use File;

class PlaylistController extends Controller
{
	public function __construct()
	{
		$this->middleware('IsAdmin')->except(['show']);
	}

	private function isValidAudio($file)
	{
		$type = $file->getClientOriginalExtension();
		switch ($type) {
			case 'mp3':
				return true;
			case 'ogg':
				return true;
			case 'mp4':
				return true;
			case 'wav':
				return true;
			default:
				return false;
		}
	}

	// get : /{postdesc}/مشاهدة مباشرة/{playlisttitle} - watch post online
	public function show($postdesc, $playlisttitle) {
		$categories = Category::all();

		$post = Post::where('description', $postdesc)->latest()->first();

		$playlist = $post->playlists()->where('visible', '1')->where('title', $playlisttitle)->latest()->first();

		$playlists = $post->playlists()->where('visible', '1')->with('audios')->latest()->get();

		$category = Category::find($post->category_id);

		$randomPosts = collect(Post::get_random_posts($post->category_id))->shuffle();

		$audios = [];
		if($playlist){
			$audios = $playlist->audios()->orderBy('name')->get();
		}

		return view('posts.playlist', array_merge([
			'categories' => $categories,
			'post' => $post,
			'playlists' => $playlists,
			'category' => $category,
			'activeplaylist' => $playlist,
			'audios' => $audios,
			'randomPosts' => $randomPosts], Metadata::getMetadata()) );
	}

	// get : admin/posts/{id}/playlist/create - create a post view
	public function create(Post $post)
	{
		return view('admin.playlists.create', ['post' => $post]);
	}

	// post : admin/posts/{id}/online/create - create a post view
	public function store(Post $post)
	{
		$playlist = new Playlist;
		$playlist->title = request('title');
		$playlist->visible = request('visible') == "on" ? true : false;
		$post->playlists()->save($playlist);

		$audios = [];
		$audionames = request('audioname');

		if($audionames){
			foreach ($audionames as $index => $audioname) {
				if ($audioname){
					$audiolink = request('audiolink')[$index];
					$audiofile = array_key_exists( $index, ((!request()->file('audiofile')) ? [] : request()->file('audiofile')) ) ? request()->file('audiofile')[$index] : null;

					if ($audiolink) {
						$audio = new Audio;
						$audio->name = $audionames[$index];
						$audio->link = $audiolink;
						$audios[] = $audio;
					} elseif ($audiofile) {
						if(request()->file('audiofile')[$index] && $this->isValidAudio($audiofile)) {
							$audio = new Audio;
							$audio->name = $audionames[$index];

							$uniqid = uniqid($playlist->id, true) . "." . $audiofile->getClientOriginalExtension();
							$audiofile->move('playlistaudios/' . $playlist->title . '/' , $uniqid);
							$audio->link = '/playlistaudios/' . $playlist->title . '/' . $uniqid;
							$audios[] = $audio;
						}
					}
				}
			}
			$playlist->audios()->saveMany($audios);
		}

		$imageFile = request()->file('photo_url');

		if(request()->hasFile('photo_url') && $imageFile->isValid()) {
			$uniqid = uniqid($post->id . $playlist->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move('playlistimages/', $uniqid);
			$playlist->photo_url = "/playlistimages/" . $uniqid;
		}

		$playlist->save();

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

	// get : admin/posts/{post_id}/playlist/{playlist_id}/edit - edit a playlist view
	public function edit(Post $post, $playlist)
	{
		$playlist= $post->playlists()->where('id', $playlist)->with('audios')->first();

		if($playlist){
			return view('admin.playlists.create', ['post' => $post, 'playlist' => $playlist]);
		}

		return redirect()->action(
			'PlaylistController@create', ['post' => $post]
		);
	}

	// post : admin/posts/{post_id}/online/{subpost_id}/edit - update a post view
	public function update(Post $post, $playlist)
	{
		$playlist = $post->playlists()->where('id', $playlist)->first();
		$playlist->title = request('title');
		$playlist->visible = request('visible') == "on" ? true : false;

		$audios = [];
		$audionames = request('audioname');

		if ($audionames){
			foreach ($audionames as $index => $audioname) {
				if ($audioname){
					$audiolink = request('audiolink')[$index];
					$audiofile = array_key_exists( $index, ((!request()->file('audiofile')) ? [] : request()->file('audiofile')) ) ? request()->file('audiofile')[$index] : null;

					if($audiolink) {
						$audio = new Audio;
						$audio->name = $audionames[$index];
						$audio->link = $audiolink;
						$audios[] = $audio;
					} elseif ($audiofile) {
						if(request()->file('audiofile')[$index] && $this->isValidAudio($audiofile)) {
							$audio = new Audio;
							$audio->name = $audionames[$index];

							$uniqid = uniqid($playlist->id, true) . "." . $audiofile->getClientOriginalExtension();
							$audiofile->move('playlistaudios/' . $playlist->title . '/' , $uniqid);

							$audio->link = '/playlistaudios/' . $playlist->title . '/' . $uniqid;
							$audios[] = $audio;
						}
					}
				}
			}
		}

		$playlist->audios()->delete();
		$playlist->audios()->saveMany($audios);

		$imageFile = request()->file('photo_url');

		if(request()->hasFile('photo_url') && $imageFile->isValid()) {
			$uniqid = uniqid($post->id . $playlist->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move('playlistimages/', $uniqid);
			$playlist->photo_url = "/playlistimages/" . $uniqid;
		}

		$playlist->save();

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}


	public function delete(Post $post, $playlist)
	{

		$playlist = Playlist::find($playlist);
		File::deleteDirectory(public_path('playlistaudios/' . $playlist->title));

		if($playlist){
			$playlist->audios()->delete();
			$playlist->delete();
		}

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

}

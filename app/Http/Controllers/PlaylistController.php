<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Playlist;
use App\Audio;

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
			case 'wav':
				return true;
			default:
				return false;
		}
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
		// $post->playlists()->save($playlist);

		$audios = [];
		$audionames = request('audioname');

		if($audionames){
			foreach ($audionames as $index => $audioname) {
				if($audioname){
					$audiolink = request('audiolink')[$index];
					$audiofile = request()->file('audiofile')[$index];

					if($audiolink) {
						$audio = new Audio;
						$audio->name = $audionames[$index];
						$audio->link = $audiolink;
						$audios[] = $audio;
					} else if($audiofile) {
						if(request()->file('audiofile')[$index] && $this->isValidAudio($audiofile)) {
							$audio = new Audio;
							$audio->name = $audionames[$index];

							$uniqid = uniqid($playlist->id, true) . "." . $audiofile->getClientOriginalExtension();
							$audiofile->move('playlistaudios/', $uniqid);
							$audio->link = '/playlistaudios/' . $uniqid;
							$audios[] = $audio;
						}
					}
				}
			}
			$playlist->audios()->saveMany($audios);
		}

		return redirect()->action(
			'PostsController@edit', ['post' => $post]
		);
	}

}

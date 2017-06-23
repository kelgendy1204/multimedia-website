<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PlaylistController extends Controller
{
	public function __construct()
	{
		$this->middleware('IsAdmin')->except(['show']);
	}

	// get : admin/posts/{id}/playlist/create - create a post view
	public function create(Post $post)
	{
		return view('admin.playlists.create', ['post' => $post]);
	}
}

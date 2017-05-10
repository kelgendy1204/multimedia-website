<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinksController extends Controller
{

	public function create()
	{
		return view('links.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'link' => 'required'
		]);

		$link = Link::where('url','=', $request->link)->first();
			//If we have the URL saved in our database already, we provide that information back to view.
		if($link) {
			return redirect('/links/create')->withInput()->with('link', $link->hash);
			//Else we create a new unique URL
		} else {
			//First we create a new unique Hash
			do {
				$newHash = str_random(10);
			} while(Link::where('hash', '=', $newHash)->count() > 0);

			//Now we create a new database record
			Link::create(array('url' => $request->link, 'hash' => $newHash));

			//And then we return the new shortened URL info to our action
			return redirect('links/create')->withInput()->with('link', $newHash);
		}
	}

	public function translate($hash)
	{
		//First we check if the hash is from a URL from our database
		$link = Link::where('hash', '=', $hash)->first();
		//If found, we redirect to the URL
		if($link) {
			return redirect($link->url);
			//If not found, we redirect with error message
		} else {
			abort(403, 'Page Not Found!');
		}
	}
}
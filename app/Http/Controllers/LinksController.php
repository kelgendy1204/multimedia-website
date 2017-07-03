<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Metadata;

class LinksController extends Controller
{

	function __construct()
	{
		$this->middleware('IsAdmin')->only(['create', 'store']);
	}

	public function create()
	{
		return view('admin.links.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'link' => 'required|url'
		]);

		$link = \Helpers\Urlshorten::makeGetShortenUrl($request->link);

		return redirect('/admin/links/create')->withInput()->with('link', $link->hash);
	}

	public function generate($hash)
	{
		return view('links.getlink', array_merge(['hash' => $hash], Metadata::getMetadata()) );
	}

	public function translate($hash)
	{
		//First we check if the hash is from a URL from our database
		$link = Link::where('hash', '=', $hash)->first();
		//If found, we redirect to the URL
		if($link) {
			return view('links.getlink', array_merge(['link' => $link->url], Metadata::getMetadata()) );
			//If not found, we redirect with error message
		} else {
			abort(403, 'Page Not Found!');
		}
	}
}

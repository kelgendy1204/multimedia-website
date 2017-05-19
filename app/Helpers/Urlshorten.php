<?php

namespace Helpers;

use App\Link;

/**
*
*/
class Urlshorten
{

	public static function makeGetShortenUrl($url)
	{

		$link = Link::where('url','=', $url)->first();

			//If we have the URL saved in our database already, we provide that information back to view.
		if($link) {
			return $link;
			//Else we create a new unique URL
		} else {
			//First we create a new unique Hash
			do {
				$newHash = str_random(10);
			} while(Link::where('hash', '=', $newHash)->count() > 0);

			//Now we create a new database record
			$link = Link::create(array('url' => $url, 'hash' => $newHash));

			//And then we return the new shortened URL info to our action
			return $link;
		}
	}


}
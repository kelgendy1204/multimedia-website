<?php

namespace Helpers;

use App\Post;


/**
*
*/
class CheckUser
{

	public static function CheckUserPost($request, $postid)
	{
		if( $request->user()->hasRole('editor') ) {
			$activepost = Post::where('id' , $postid)->where('user_id', $request->user()->id)->first();
			if($activepost) {
				return true;
			} else {
				return false;
			}
		}
		return true;
	}

	public static function CheckUserName($request)
	{
		$laravelUser = $request->user();
		// $sessionUserName = $request->session()->get('username');
		if (isset($_COOKIE["username"])) {
			$cookieUserName = $_COOKIE["username"];
		} else {
			auth()->logout();
		}

		if( $laravelUser && ($laravelUser->name != $cookieUserName) ) {
			auth()->logout();
		}

	}

}
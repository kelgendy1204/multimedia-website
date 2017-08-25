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
		$sessionUserName = $request->session()->get('username');
		// $cookieUserName = $request->cookie('username');

		if( $laravelUser && ($laravelUser->name != $sessionUserName) ) {
			auth()->logout();
		}

	}

}
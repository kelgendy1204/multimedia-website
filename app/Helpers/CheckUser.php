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

}
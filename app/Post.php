<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	public static function get_all_visible()
	{
		return static::where('visible', 1)->get();
	}

	public static function get_all_none_visible()
	{
		return static::where('visible', 0)->get();
	}

	public static function get_all_posts()
	{
		return static::all();
	}

	public static function get_all_pinned()
	{
		return static::where('pinned', 1)->get();
	}
}

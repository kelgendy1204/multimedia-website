<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	// public function category()
	// {
	// 	return $this->hasOne('App\Category');
	// }

	public static function get_all_visible($category_name_en)
	{

		$query = static::where('visible', 1)->join('categories', 'categories.id', '=', 'posts.category_id')->select('posts.*', 'categories.name_en as category_name_en', 'categories.name as category_name');

		if($category_name_en) {
			return $query->where('categories.name_en', $category_name_en)->get();
		}

		return $query->get();

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

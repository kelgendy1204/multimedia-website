<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public static $paginate = 50;

	// public function category()
	// {
	// 	return $this->hasOne('App\Category');
	// }

	public static function get_all_visible($category_name_en, $search)
	{

		$query = static::where('visible', 1)->leftJoin('categories', 'categories.id', '=', 'posts.category_id')->select('posts.*', 'categories.name_en as category_name_en', 'categories.name as category_name');

		if($category_name_en) {
			$query->where('categories.name_en', $category_name_en);
		}

		if($search) {
			$query->where('posts.title', 'like', '%' . $search . '%');
		}

		return $query->paginate(static::$paginate);
	}

	public static function get_all_none_visible()
	{
		return static::where('visible', 0)->paginate(static::$paginate);
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

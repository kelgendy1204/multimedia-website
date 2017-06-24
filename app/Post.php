<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
	public static $paginate = 54;

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function subposts()
	{
		return $this->hasMany('App\Subpost', 'post_id', 'id');
	}

	public function downloadlinks()
	{
		return $this->hasMany('App\Downloadlink', 'post_id', 'id');
	}

	public static function get_all_visible($category_name_en, $search, $limit)
	{

		$query = static::where('visible', 1)->leftJoin('categories', 'categories.id', '=', 'posts.category_id')->select('posts.*', 'categories.name_en as category_name_en', 'categories.name as category_name', 'categories.color as category_color')->orderBy('pinned', 'desc')->orderBy('position', 'desc')->orderBy('updated_at', 'desc');

		if($category_name_en) {
			$query->where('categories.name_en', $category_name_en);
		}

		if($search) {
			$query->where('posts.title', 'like', '%' . $search . '%');
		}

		if($limit){
			return $query->latest()->limit($limit)->get();
		}

		return $query->paginate(static::$paginate);
	}

	public static function get_random_posts($category_id)
	{
		$limit = 20;

		$rows = DB::select("SELECT * FROM posts where visible = 1 AND category_id = $category_id order by created_at desc limit $limit");

		return $rows;
	}

	public static function get_all_none_visible()
	{
		return static::where('visible', 0)->paginate(static::$paginate);
	}

	public static function get_all_posts($category_name_en, $search)
	{
		$query = static::leftJoin('categories', 'categories.id', '=', 'posts.category_id')->select('posts.*', 'categories.name_en as category_name_en', 'categories.name as category_name')->orderBy('pinned', 'desc')->orderBy('position', 'desc')->orderBy('updated_at', 'desc');

		if($category_name_en) {
			$query->where('categories.name_en', $category_name_en);
		}

		if($search) {
			$query->where('posts.title', 'like', '%' . $search . '%');
		}

		return $query->paginate(200);
	}

	public static function get_all_pinned()
	{
		return static::where('pinned', 1)->get();
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'tag_post');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}

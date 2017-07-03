<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\Advertisement;
use App\Post;
use App\Metadata;

class CategoriesController extends Controller
{

	public function __construct()
	{
		$this->middleware('IsAdmin')->except(['index']);
	}

		// get : /category/{categoryname} home page
	public function index($categoryname) {
		$category = Category::where('name', $categoryname)->first();

		$parameters = Input::except('page');
		$search = request()->input('search');

		$categories = Category::all();
		$advertisements = Advertisement::all()->keyBy('name');
		$posts = Post::get_all_visible($category->name_en, $search, null);

		return view('posts.posts', array_merge([
			'posts' => $posts,
			'activecategory' => $category,
			'categories' => $categories,
			'parameters' => $parameters,
			'advertisements' => $advertisements,
		], Metadata::getMetadata()) );

	}

	public function create()
	{
		$categories = Category::all();
		$colors = ['red', 'grey1', 'blue', 'orange', 'green1', 'green2', 'green3', 'yellow', 'grey2', 'pink'];
		return view('categories.create', ['categories' => $categories, 'colors' => $colors ]);
	}

	public function store(Request $request) {
		$category = new Category;
		$category->name = request("category");
		$category->name_en = request("category_en");
		$category->key_words = request("key_words");
		$category->meta_description = request("meta_description");
		$category->color = request("color");
		$category->parent_id = request("parent");
		$category->save();

		$imageFile = $request->file("categoryimage");
		if($request->hasFile("categoryimage") && $imageFile->isValid()) {
			$uniqid = uniqid($category->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move("categoryimages/", $uniqid);
			$category->photo_url = "/categoryimages/" . $uniqid;
			$category->save();
		}

		return redirect()->action(
			'CategoriesController@adminindex'
		);
	}


	// get : /admin/categories/{category}/edit - edit a category
	public function edit(Category $category) {
		$categories = Category::all();
		$colors = ['red', 'grey1', 'blue', 'orange', 'green1', 'green2', 'green3', 'yellow', 'grey2', 'pink'];
		return view('categories.create', ['activecategory' => $category, 'categories' => $categories, 'colors' => $colors ]);
	}

	// post : /admin/categories/{category}/edit - update a category
	public function update(Category $category) {

		$category->name = request("category");
		$category->name_en = request("category_en");
		$category->key_words = request("key_words");
		$category->meta_description = request("meta_description");
		$category->color = request("color");
		$category->parent_id = request("parent");

		$imageFile = request()->file('categoryimage');
		if(request()->hasFile("categoryimage") && $imageFile->isValid()) {
			$uniqid = uniqid($category->id, true) . "." . $imageFile->getClientOriginalExtension();
			$imageFile->move("categoryimages/", $uniqid);
			$category->photo_url = "/categoryimages/" . $uniqid;
		}

		$category->save();

		return redirect()->action(
			'CategoriesController@edit', ['category' => $category->id]
		);
	}

	// get : admin/categories - show all posts
	public function adminindex() {
		$categories = Category::all();
		return view('admin.categories.index' , [
			'categories' => $categories
		]);
	}

}

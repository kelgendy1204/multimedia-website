<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{

	public function __construct()
	{
		$this->middleware('IsAdmin');
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
		$category->color = request("color");
		$category->parent_id = request("parent");
		$category->save();

		$imageFile = $request->file("categoryimage");
		$uniqid = uniqid($category->id, true) . "." . $imageFile->getClientOriginalExtension();
		if($request->hasFile("categoryimage") && $imageFile->isValid()) {
			$imageFile->move("categoryimages/", $uniqid);
			$category->photo_url = "/categoryimages/" . $uniqid;
			$category->save();
		}

		return redirect('/admin/categories/create');
	}

}

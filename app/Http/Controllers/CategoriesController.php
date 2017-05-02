<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
	public function create()
	{
		$categories = Category::all();
		return view('categories.create', ['categories' => $categories ]);
	}


	public function store(Request $request) {
		$category = new Category;
		$category->name = request("category");
		$category->parent_id = request("parent");
		$category->save();

		$imageFile = $request->file("categoryimage");
		$uniqid = uniqid($category->id, true) . "." . $imageFile->getClientOriginalExtension();
		if($request->hasFile("categoryimage") && $imageFile->isValid()) {
			$imageFile->move("categoryimages/", $uniqid);
			$category->photo_url = "/categoryimages/" . $uniqid;
			$category->save();
		}

		return redirect('/');
	}
}

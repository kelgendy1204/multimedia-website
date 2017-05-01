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


	public function store() {
		$category = new Category;
		$category->name = request('category');
		$category->parent_id = request('parent');
		$category->save();

		return redirect('/');
	}
}

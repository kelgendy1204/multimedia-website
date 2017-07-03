<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Metadata;

class MetadataController extends Controller
{
    public function __construct()
    {
		$this->middleware('IsSuperAdmin');
    }


    public function index()
    {
    	$metadata = Metadata::all();

    	$keywords = $metadata->filter(function($item) {
		    return $item->name == 'keywords';
		})->first();

    	$description = $metadata->filter(function($item) {
		    return $item->name == 'description';
		})->first();

    	$scripts = $metadata->filter(function($item) {
		    return $item->name == 'scripts';
		})->first();

    	return view('admin.metadata.create', ['keywords' => $keywords, 'description' => $description, 'scripts' => $scripts]);
    }

    public function save()
    {
    	$keywords = Metadata::where('name', 'keywords')->first();
    	$keywords->value = request('keywords');
    	$keywords->save();

    	$description = Metadata::where('name', 'description')->first();
    	$description->value = request('description');
    	$description->save();

    	$scripts = Metadata::where('name', 'scripts')->first();
    	$scripts->value = request('scripts');
    	$scripts->save();

    	return redirect()->action(
    		'MetadataController@index'
    	);
    }

}

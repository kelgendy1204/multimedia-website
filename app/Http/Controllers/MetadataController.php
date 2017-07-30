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

    	$home_banner = $metadata->filter(function($item) {
		    return $item->name == 'home_banner';
		})->first();

    	return view('admin.metadata.create', ['keywords' => $keywords, 'description' => $description, 'scripts' => $scripts, 'home_banner' => $home_banner]);
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

    	$home_banner = Metadata::where('name', 'home_banner')->first();
        $home_banner_image = request()->file('home_banner');
        if(request()->hasFile('home_banner') && $home_banner_image->isValid()) {
            $uniqid = uniqid( (new \DateTime())->getTimestamp() , true ) . "." . $home_banner_image->getClientOriginalExtension();
            $home_banner_image->move('bansimages/', $uniqid);
        	$home_banner->value = "/bansimages/" . $uniqid;
        }
    	$home_banner->save();

    	return redirect()->action(
    		'MetadataController@index'
    	);
    }

}

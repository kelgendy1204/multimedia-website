<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    //
	public static function getMetadata()
	{
    	$metadata = static::all();

    	$keywords = $metadata->filter(function($item) {
		    return $item->name == 'keywords';
		})->first();

    	$description = $metadata->filter(function($item) {
		    return $item->name == 'description';
		})->first();

    	$scripts = $metadata->filter(function($item) {
		    return $item->name == 'scripts';
		})->first();

		return [
			'keywords' => $keywords,
			'description' => $description,
			'scripts' => $scripts,
		];

	}
}

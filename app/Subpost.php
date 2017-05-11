<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subpost extends Model
{
	public function servers()
	{
		return $this->hasMany('App\Server', 'subpost_id', 'id');
	}

	public function post() {
		return $this->belongsTo('App\Post');
	}
}

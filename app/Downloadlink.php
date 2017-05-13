<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downloadlink extends Model
{
	public function downloadservers()
	{
		return $this->hasMany('App\Downloadserver', 'downloadlink_id', 'id');
	}

	public function post() {
		return $this->belongsTo('App\Post');
	}

}

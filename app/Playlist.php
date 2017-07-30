<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function audios()
    {
    	return $this->hasMany('App\Audio', 'playlist_id', 'id');
    }

    public function post() {
    	return $this->belongsTo('App\Post');
    }
}

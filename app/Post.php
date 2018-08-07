<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'body'];

	public function category(){
		return $this->belongsTo('App\Category');

	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function tags(){
		return $this->belongsToMany('App\Tag');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function comments(){
		return $this->hasMany('App\Comment');
	}
}

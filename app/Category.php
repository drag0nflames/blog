<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Telling category model to use categories table//
	protected $table = "categories";

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

}

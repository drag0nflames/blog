<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	protected $table = 'comment_post';

	public function post(){
		return $this->belongsTo('App\Post');
	}
}
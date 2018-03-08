<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
	protected $table = 'posts';

	protected $fillable = array('title','content','slug','category','author_id');

	public $timestamps = true;

	public function Author(){

      return $this->belongsTo('User','author_id');
}

}

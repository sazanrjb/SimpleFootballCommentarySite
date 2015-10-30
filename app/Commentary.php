<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model {

	protected $table = 'commentaries';

	public function match(){
		return $this->belongsTo('App\Match');
	}

}

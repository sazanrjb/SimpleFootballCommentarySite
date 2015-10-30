<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model {

	protected $table = 'matches';

	public function commentaries(){
		return $this->hasMany('App\Commentary','id');
	}

	public function users(){
		return $this->belongsTo('App\User');
	}

}

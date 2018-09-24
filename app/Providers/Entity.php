<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    //
		public function users(){
		return $this->hasMany('App\User');
	}
		public function specs(){
		return $this->hasMany('App\Specification');
	}	
}

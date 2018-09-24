<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entity extends Model
{
    //
	
		public function matgroups(){
		return $this->hasMany(Matgroup::class);
		}
}

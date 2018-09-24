<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matgroup extends Model
{
    //
		public function entity(){
		return $this->belongsTo(Entity::class);
		}
}

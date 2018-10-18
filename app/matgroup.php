<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matgroup extends Model
{
    //
		public function entity(){
		return $this->belongsTo(Entity::class);
		}
		public function products(){
		return $this->hasMany('App\product','mat_id');
		}		
		public function measuregrps(){
		return $this->hasMany('App\measuregrp', 'mat_id');
		}	
		
}

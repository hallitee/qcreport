<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
	
		public function matgroup(){
		return $this->belongsTo('App\matgroup', 'mat_id');
		}
		public function measures(){
		return $this->belongsToMany(Measuregrp::class,'specifications');
		//return $this->belongsToMany('App\measuregrp', 'specifications', 'user_id', 'role_id');
		
		}
		public function qcpasses(){
		return $this->hasMany(Qcpass::class);
		}		
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
	
		public function matgroup(){
		return $this->belongsTo(Matgroup::class);
		}
		public function measures(){
		return $this->belongsToMany(Measuregrp::class);
		}
		public function qcpasses(){
		return $this->hasMany(Qcpass::class);
		}		
}

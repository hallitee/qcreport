<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measuregrp extends Model
{
    //
		public function matgroup(){
		return $this->belongsTo(Matgroup::class, 'mat_id');
		}	
		public function products(){
		return $this->belongsToMany(Product::class,'specification');
		}	
		public function probes(){
		return $this->hasMany('App\probe', 'measuregrps_id');
		}
}

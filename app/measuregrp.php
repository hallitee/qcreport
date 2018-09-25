<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measuregrp extends Model
{
    //
		public function matgroup(){
		return $this->belongsTo(Matgroup::class);
		}	
		public function products(){
		return $this->belongsToMany(Product::class,'specification');
		}	
}

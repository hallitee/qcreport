<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measuregrp extends Model
{
    //
		public function products(){
		return $this->belongsToMany(Product::class);
		}	
}

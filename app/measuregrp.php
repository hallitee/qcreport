<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measuregrp extends Model
{
	protected $fillable = ['name', 'props','units', 'method', 'target', 'coa', 'metric1','metric2','metric3','metric4'];
    //
		public function matgroup(){
		return $this->belongsTo(Matgroup::class, 'mat_id');
		}	
		public function products(){
		return $this->belongsToMany(Product::class,'specifications');
		}	
		public function probes(){
		return $this->hasMany('App\probe', 'measuregrps_id');
		}
}

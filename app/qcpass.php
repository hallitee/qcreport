<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qcpass extends Model
{
    //
	
		public function product(){
		return $this->belongsTo(Product::class)->with('matgroup.entity');
		}
		public function samples(){
		return $this->hasMany(Sample::class);
		}	
		public function sampled(){
			
			return $this::with('product.measures.probes')->hasMany(Sample::class);
		}
		
}

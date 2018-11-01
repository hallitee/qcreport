<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qcpass extends Model
{
    //
	
		public function product(){
		return $this->belongsTo(Product::class);//->with('matgroup')->with('measures.probes');
		}
		public function samples(){
		return $this->hasMany(Sample::class);
		}		
		
}

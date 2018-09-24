<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
	protected $table='product';
	
	public function spec(){
	return $this->belongsTo('App\Specification');
	}
	
}

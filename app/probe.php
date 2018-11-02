<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class probe extends Model
{
	protected $fillable = ['prop', 'unit','method', 'target','tarRem', 'tarName', 'tarType','low', 'high', 'iLow', 'iHigh','error'];
    //
		public function measuregrp(){
		return $this->belongsTo(Measuregrp::class, 'measuregrps_id');
		}
}

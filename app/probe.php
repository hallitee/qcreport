<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class probe extends Model
{
    //
		public function measuregrp(){
		return $this->belongsTo(Measuregrp::class);
		}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sample extends Model
{
    //
		public function qcpass(){
		return $this->belongsTo(Qcpass::class);
		}


		
}

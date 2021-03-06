<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dailyreport extends Model
{
    //
	protected $table = 'daily';
	public function user(){
		return $this->belongsTo('App\User');
		}

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }

    public function fromDateTime($value)
    {
        return substr(parent::fromDateTime($value), 0, -3);
    }
		
}


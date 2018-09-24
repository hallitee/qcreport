<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodOrder extends Model
{
    //
	protected $connection = 'sqlsrv';
	
	protected $primarykey = 'PROD_NUMBER';
	protected $table = 'dbo.PROD_ORDER';
	
}

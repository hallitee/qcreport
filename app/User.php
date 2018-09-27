<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email','company', 'password','role', 'priv'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $p = explode('@',$model->email);
			$q = explode('.', $p[1]);
			switch($q[0]){
				case "natural-prime":
				$model->company = 'NPRNL';
				$model->entitycode = '01-234-002';
				break;
				case "esrnl":
				$model->company = 'ESRNL';
				$model->entitycode = '01-234-001';
				break;
				case "primerafood-nigeria":
				$model->company = 'PFNL';
				$model->entitycode = '01-234-003';
				break;	
				default :
				$model->company = '';
				break;					
			}
        });
    }		
	public function isAdmin(){
		
		return $this->role;
	}
	
		public function isApprover(){
		
		return $this->priv;
	}
	public function priv(){
		
		return $this->priv;
	}
		public function reports(){
		return $this->hasMany('App\dailyreport');
		}
}

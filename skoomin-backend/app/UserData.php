<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
	/**
	 * The table associated with model
	 * @var string
	 */
    protected $table = 'users_data';

    /**
     * Return the user basic information
     * @return array
     */
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}

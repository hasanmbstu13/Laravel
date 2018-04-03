<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, BelongsToTenants, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',
    ];

    /**
     * Return the related user information from the users_data table
     * @return array
     */
    public function user_data(){
        return $this->hasOne('App\UserData', 'user_id');
    }

    /**
     * Return all classes associated with the teacher
     * @return array
     */
    public function class(){
    	return $this->hasMany('App\Classes', 'user_id');
    }

    /**
     * Return all the subjects of a teacher
     * @return array of objects
     */
    public function subject(){
        return $this->hasMany('App\Subject', 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	/**
	 * The table associated with the model
	 * @var string
	 */
    protected $table = 'subjects';

    /**
     * The attributes that are mass-assignable
     * @var [type]
     */
    protected $fillable = ['name', 'class_id', 'user_id'];

    /**
     * The teacher of a subject
     * @return array of objects
     */
    public function user(){
    	$this->belongsTo('App\User', 'user_id');
    }

    /**
     * The subject of a class
     * @return array of objcts
     */
    public function class(){
    	$this->belongsTo('App\Class', 'class_id');
    }
}

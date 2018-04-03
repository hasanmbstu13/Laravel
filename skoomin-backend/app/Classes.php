<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
	use softDeletes;
	
	/**
	 * The attributes that should be mutated to dates
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	
	/**
	 * The table associated with the model
	 * @var string
	 */
    protected $table = 'classes';

    /**
     * The attributes that are mass-assignable
     * @var array
     */
    protected $fillable = ['name', 'user_id'];

    /**
     * Return the teacher of the class
     * @return array
     */
    public function user(){
    	$this->belongsTo('App\User', 'user_id');
    }

    /**
     * A class has many subjects
     * @return array of objects
     */
    public function subject(){
        $this->hasMany('App\Subject', 'class_id');
    }
}

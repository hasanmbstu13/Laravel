<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	// fillable is used mass-assignable at instance label
	// Here it means anyhting outside of body if we want to update will completely ignored
	protected $fillable = ['body'];
	
	// public function user() {
 //    	// return $this->hasMany(Note::class);
 //    	return $this->hasMany('App\User');
 //    }

	public function card() {
	    // return $this->belongsTo(Card::calss);
	    return $this->belongsTo('App\Models\Card');
	}

	public function user() {
	    // return $this->belongsTo(Card::calss);
	    return $this->belongsTo('App\User');
	}
}

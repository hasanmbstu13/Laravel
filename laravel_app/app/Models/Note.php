<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = ['body'];
	
	public function card() {
	    // return $this->belongsTo(Card::calss);
	    return $this->belongsTo('App\Models\Card');
	}
}

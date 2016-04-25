<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function notes() {
    	// return $this->hasMany(Note::class);
    	return $this->hasMany('App\Models\Note');
    }
}

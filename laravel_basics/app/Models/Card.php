<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    // Any given Card has any number of notes 
    // So Card has many notes
    public function notes() {
        // string representation of the class
    	// return $this->hasMany(Note::class);
        // reference the associate model
    	return $this->hasMany('App\Models\Note');
    }

    // Here Note $note means we expect Note instance

    public function addNote(Note $note) {
    	
        $note->user_id = Auth::id();
        
    	return $this->notes()->save($note);
    	
    }
}

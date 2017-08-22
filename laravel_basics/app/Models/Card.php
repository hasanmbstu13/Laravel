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
    // This method will create new note in database
    public function addNote(Note $note) {
    	
        $note->user_id = Auth::id();
        
    	return $this->notes()->save($note);
    	
    }

    // This is useful if path is so completed
    public function path() {
        // return $this;
        // return $this->id;
        return '/cards/' . $this->id;
    }
}

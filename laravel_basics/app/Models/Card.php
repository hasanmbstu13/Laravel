<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function notes() {
    	// return $this->hasMany(Note::class);
    	return $this->hasMany('App\Models\Note');
    }

    // Here Note $note means we expect Note instance

    public function addNote(Note $note) {
    	
        $note->user_id = $userId;
        
    	return $this->notes()->save($note);
    	
    }
}

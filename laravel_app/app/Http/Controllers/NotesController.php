<?php

namespace App\Http\Controllers;

use App\Models\Card;

use App\Models\Note;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class NotesController extends Controller
{
	// Card $card will return instance we don't need to query or fetching data its just worked fine
    public function store(Request $request, Card $card) {
    // public function store() {
    	// return $card;

    	// a way to store data in notes table
    	// $note = new Note;

    	// $note->body = $request->body;

    	// $card->notes()->save($note);


    	// another way to store data in notes table
    	// $note = new Note(['body' => $request->body]);

    	// $card->notes()->save($note);
    	

    	// another way to store data in notes table
    	// $card->notes()->save(
    	// 	new Note(['body' => $request->body])
    	// );
    	
    	// another options
    	// $card->notes()->create([
    	// 	'body' => $request->body
    	// ]);
    	
    	// another options 
    	// This is dangerous because we should confirm what items should be submitted
    	// but in our case we protect by using fillable
    	// $card->notes()->create($request->all()); // [] return an array wiht request data like body : 'add note'.

    	// Truly final options
    	// All options are also worked fine
    	$card->addNote(
    		new Note($request->all())
    	);

    	// return $request->all();
    	// return \Request::all();
    	// return request()->all();
    	// card_id will automatically applied on the note row by eloquent
    	// $card->notes()->save($note);

    	// return \Redirect::to('/some/new/uri');
    	// return redirect()->to('somewhere');
    	// return redirect()->to('foo/');

    	return back();
    }

    public function edit(Note $note) {
    	
    	return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note) {
    	// die & dump
    	// dd('hit');

    	// $request->all() fetch all of the form data from the note
    	$note->update($request->all());
    	// We using this by array
    	// $note->update([]);

    	// We can redirect anywhere but for the time we redirect in the same page
    	return back();

    }

}

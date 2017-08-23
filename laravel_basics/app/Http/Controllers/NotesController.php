<?php

namespace App\Http\Controllers;

use Validator;

use App\Models\Card;

use App\Models\Note;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;


class NotesController extends Controller
{
	// Card $card will return instance we don't need to query or fetching data its just worked fine
    public function store(Request $request, Card $card) {

        // return $request;
    
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
    	// $card->notes()->create($request->all()); // [] return an array with request data like body : 'add note'.

    	// Truly final options
    	// All options are also worked fine
        // $request->all() fetch all our request data
    	
        // Here we pass through all the requests by $request & array is used for set of rules
        // $request is the submitted data of form
        // Laravel validate data with rule here like 'body' => 'required'
        // Anytime if validation thrown any exception laravel takes care the error for us

        // $validator = Validator::make($request->all(), [
        //         'body' => 'required'
        //     ]);
        // dd('hit');
        $this->validate($request,[

            'body' => 'required'
        ]);

        // return $validator;

        // return $errors->all();

        // return $validator->errors();

        // $validator = $this->validate($request,[

        //     'body' => 'required'
        // ]);
        // var_dump($validator); exit;
        // return $errors;

        // if ($validator->fails()) {
        //     $errors = $validator->errors();
        //     // return $validator->errors();
        //     // return back()
        //                 // ->withErrors($validator)
        //                 // ->withInput();
        //     return view('cards.show', compact('card', 'errors'));
        // }

        $note = new Note($request->all());
        // $note->user_id = Auth::id();
        // $note->by(Auth::user());
       
       // $note->user_id = 1;

        // we can also use the trick like so
        $card->addNote($note,1);

        // $card->addNote($note,$user);

     //    $card->addNote(
     //        // include user_id
     //        // new Note($request->all())['user_id']
    	// 	new Note($request->all())
    	// );

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
        // fetch all of the form data from the note
        // form data means submitted data
    	// $request->all() 
    	$note->update($request->all());
    	// We using this by array
    	// $note->update([]);

    	// We can redirect anywhere but for the time we redirect in the same page
    	return back();

    }

}

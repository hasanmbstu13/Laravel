<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Card;
// \DB use Db all are same
// use DB;

class CardsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('auth', ['except' => ['index']]); //@MH thats apply every single route of this controller
    }

    public function index() {
        // Query builder approach
    	// Here \DB means use the root folder for searching namespace
        // We can fetch data by query builder like following
    	// $cards = \DB::table('cards')->get();

        // Eloquent Approach
        // In some cases we need to use query builder but most often need to use Eloquent ORM for fetching data from database
    	$cards = Card::all();
    	return view('cards.index', compact('cards'));
    }

    // public function show($id) {
        // that will return only the id
         // return $id;
       // public function show(Card $card){
       //  // that will return the $card object automatically query for us by using $card 
       //  // $card is the id
        // One cavet is that wildcard and variable name must be same
        // Route::get('cards/{card}', 'CardsController@show');
        // So our variable name should be card matching with the wildcard
        // If we use 
        // public function show(Card $foobar){
            // that will return nothing
            // return $foobar; 
        // }
       //   return $card;
       // }
         // that will return the specific card
        // $card = Card::find($id);
        // Laravel is smart enough to return the json object
        // return $card;
    // here $card means the instance of Card
    // one caveat is that wildcard must be match with the variable name
    // in our case wildcard is {card} & variable name is also $card
    // Here $card is a id
    // }

    public function show(Card $card) {
        // ignore $card object lets start from scratch
        // $card = Card::all();
        // This keyword coming from Card notes() method
        // Eager loaded with all of the associated notes with the card
        // $card = Card::with('notes')->get();
        // To load a single card object
        // $card = Card::with('notes')->find(1);
        // This is mean that with the relationship or eager load return all notes associated with the Card
        // Then return all user associated with the notes
        // $card = Card::with('notes.user')->find(1);
        // we have $card instance so we can call eager load
        // notes is the notes method in the Card model
        // and user is the user method in the Note model
        $card->load('notes.user');
        // var_export($card);
        // dd($card);
        // echo '<pre>';
        //     var_dump($card);
        // echo '</pre>';
        // return $card;
        // This will return $card object
        // return $card;
        // return $card->notes;
        // 
        // return $card->notes->users;
        // This will call at every single that's why we get n+1 query
    	// return $card->notes[0]->user; // n+1
    	// $card = Card::find($id);
    	// return $card;
        // Here we return card object 
    	return view('cards.show',compact('card'));
    }

    public function path() {
        return '/cards/' . $this->id;
    }
}

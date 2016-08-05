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
    	// Here \DB means use the root folder for searching namespace
    	// $cards = \DB::table('cards')->get();
    	$cards = Card::all();
    	return view('cards.index', compact('cards'));
    }

    // public function show($id) {
    // here $card means the instance of Card
    // one caveat is that wildcard must be match with the variable name
    // in our case wildcard is {card} & variable name is also $card
    public function show(Card $card) {
        // ignore $card object lets start from scratch
        // $card = Card::all();
        // This keyword coming from Card notes() method
        // Eager loaded with all of the associated notes with the card
        // $card = Card::with('notes')->get();
        // To load a single card object
        // $card = Card::with('notes')->find(1);
        // we have $card instance so we can call eager load
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

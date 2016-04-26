<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Card;
// \DB use Db all are same
// use DB;

class CardsController extends Controller
{
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
        $card = Card::with('notes')->get();
        // var_export($card);
        // dd($card);
        // echo '<pre>';
        //     var_dump($card);
        // echo '</pre>';
        return $card;
        // This will return $card object
        // return $card;
        // return $card->notes;
        // 
        return $card->notes[0]->users;
    	// return $card->notes->users;
    	// $card = Card::find($id);
    	// return $card;
        // Here we return card object 
    	return view('cards.show',compact('card'));
    }

    public function path() {
        return '/cards/' . $this->id;
    }
}

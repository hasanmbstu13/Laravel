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
    	// return $card;
    	// $card = Card::find($id);
    	// return $card;
    	return view('cards.show',compact('card'));
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// To show or get data from database we use following route
// Route::get('cards', 'CardsController@index');
// For submitting form data we generally use following route
// Route::post('cards', 'CardsController@store');
// Show specific card 
// {card} is the identifier or passing the wildcard like here it is card id
// Route::get('cards/{card}', 'CardsController@show'); 
// or Route::get('cards/1', 'CardsController@show');
// Edit specific card
// Route::post('cards/1/edit', 'CardsController@edit');
// Update a card use either put or patch request
// Route::put('cards/1', 'CardsController@update');
// or Route::patch('cards/1', 'CardsController@update');
// For deleting card use following route
// Route::delete('cards/1', 'CardsController@destroy');


// Instead placing all routes placed sepcific one
// Route::group(['middleware' => ['web']], function(){
	Route::get('/', function(){
		// Session::flash()
		// or session->flash()
		
		
		// Session::flash('flash_message', 'Hello There');
		// session()->flash('flash_message', 'Here is my status.');
		// session()->flash('flash_message_level', 'success');

		flash('You are now signed in!', 'success');
		return view('welcome');
	});

	Route::get('begin', function(){
		// session()->flash('flash_message', 'Here is my status.');
		// session()->flash('flash_message_level', 'success');
		// Put in the message in session
		// session(['foo' => 'bar']); // Session::get('foo');
		// or session('foo'); // Session::get('foo');
		// Session::put('foo', 'bar');
		// Access the session
		// Session::get('foo');

		// Session flash is only available for one request
		// Session::flash('flash_message', 'My status goes there');		
		// thats mean redirect to the home page
		return redirect('/');
		// The above & below case is same thing
		return Rediret::to('/');
	});

Route::group(['middleware' => ['web']], function(){
	Route::get('cards', 'CardsController@index');
	// Here card is the identifier it can be anything like id or others etc.
	Route::get('cards/{card}', 'CardsController@show');

	// Route::post('cards/{card}/notes', 'CardsController@storeNote');
	// Route::post('cards/{card}/notes', 'CardsController@addNote');
	Route::post('cards/{card}/notes', 'NotesController@store');
	// This actually says when we visit on the note with on id of whatever might be
	// followed by edit that should load the edit method of notes controller
	Route::get('/notes/{note}/edit','NotesController@edit');
	// patch almost synonym of update
	Route::patch('notes/{note}','NotesController@update');

	Route::auth();
	Route::get('/home', 'HomeController@index');
	Route::get('/dashboard', 'HomeController@index');
	// Route::get('/dashboard', 'HomeController@index')->middleware('auth');
	Route::get('/','HomeController@index');
	Route::post('change_pm_delete_user/{user_id}',['as' => 'change_pm_delete_user', 'uses' => 'ProjectController@change_pm_delete_user']);
	// Route::get('/','PagesController@home');
});


Route::get('about/directions',function(){
	return 'Directions go here.';
});

Route::get('about/{theSubject}',function($theSubject){
	return $theSubject.' content goes here.';
});

Route::get('about/classes/{theSubject}',function($theSubject){
	return "Content {$theSubject} classes goes here.";
});






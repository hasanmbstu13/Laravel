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
// Route::group(['middleware' => ['web']], function(){
	Route::get('cards', 'CardsController@index');
	// Here card is the identifier it can be anything like id or others etc.
	Route::get('cards/{card}', 'CardsController@show');

	// Route::post('cards/{card}/notes', 'CardsController@storeNote');
	// Route::post('cards/{card}/notes', 'CardsController@addNote');
	Route::post('cards/{card}/notes', 'NotesController@store');
	// This actually says when we visit on the note with on id of whatever might be
	// followed by edit that should load the edit method of notes controller
	Route::get('/notes/{note}/edit','NotesController@edit');
	Route::patch('notes/{note}','NotesController@update');
// });

// if Mutually exclusive
// Route::post('cards/{card}/notes', 'CardNotesController@store');
// Route::get('/', function() {
// 	$people = ['Taylor', 'Matt', 'Jeffry'];

// 	// return View::make(); // This & following are functionally equivalent
// 	// pass data to the view
//     // return view('welcome',['people'=> $people]);
//     // Or
//     // Compact function will create an array with key people & value $people
//     return view('welcome',compact('people'));
//     // Or
//     // return view('welcome')->with('people',$people);
//     // Or
//     // return view('welcome')->withPeople($people);
// });

// Call Controller from Route
// Route::get('/','PagesController@home');
// Route::get('about','PagesController@about');

/*Route::get('/', function () {
	Schema::create('art', function ($newtable) {
	    $newtable->increments('id');
	    $newtable->string('artist');
	    $newtable->string('title',500);
	    $newtable->text('description');
	    $newtable->date('created');
	    $newtable->date('exhibition_date');
	    $newtable->timestamps();
	});
	Schema::table('art', function($newtable) {
	    $newtable->boolean('alumni');
	    $newtable->dropColumn('exhibition_date');
	});
    return view('welcome');
});*/

// Route::get('about', function() {
//     // return view('about'); // that translates resources/views/about.blade.php
//     // return view('pages.about'); // that translates resources/views/pages/about.blade.php
//     return view('pages/about'); // that translates resources/views/pages/about.blade.php
// });

// Work with basics of routing
// Route::get('about',function(){
// 	return 'About content goes here.';
// });

// Route::get('about/directions',function(){
// 	return 'Directions go here.';
// });

// Route::get('about/{theSubject}',function($theSubject){
// 	return $theSubject.' content goes here.';
// });

// Route::get('about/classes/{theSubject}',function($theSubject){
// 	return "Content {$theSubject} classes goes here.";
// });

// Route::group(['middleware' => 'web'], function(){
	Route::auth();
	Route::get('/home', 'HomeController@index');
// });


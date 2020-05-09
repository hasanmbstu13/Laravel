<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/about', function() {
	return view('about', [
		'articles' => App\Article::take(3)->latest()->get()
	]);
});

Route::get('/', function() {
	return view('welcome');
});

Route::get('/articles', 'ArticlesController@index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// Route::get('/', function() {
// 	$name = request('name');
// 	return $name;
// 	// return 'Hello World';
// });

// Root url
// Route::get('/', function () {
//     return view('welcome');
// });

// Add an url
Route::get('/welcome', function(){
	return view('welcome');
});

// Pass data to the view
Route::get('test', function() {
	$name = request('name');

	return view('test', [
		'name' => $name
	]);
});

Route::get('/posts/{post}', 'PostsController@show');

// Database wildcards
// Wildcard is available in callback function
// This is helpful small size application
/*
Route::get('/posts/{post}', function($post) {
	$posts = [
		'my-first-post' => 'Hello, this my first blog post',
		'my-second-post' => 'Now I am getting the hang of this blogging thing.'
	];

	if(!array_key_exists($post, $posts)) {
		abort(404, 'Sorry, that post was not found.');
	}

	return view('posts', [
		'post' => $posts[$post] ?? 'Nothing here yet.'
	]);

	// return view('posts', [
	// 	'post' => $posts[$post] ?? 'Nothing here yet.'
	// ]);
});
*/
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

Route::get('/', function() {
	$container = new \App\Container();

	$container->bind('example', function() {
		return new \App\Example();
	});

	$example = $container->resolve('example');

	$example->go();
});

Route::get('/about', function() {
	return view('about', [
		'articles' => App\Article::take(3)->latest()->get()
	]);
});

// Route::get('/', function() {
// 	return view('welcome');
// });

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
// Named routes to avoid refactoring multiple places and name consistency
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');

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
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

Route::get('/{name}', [
    'as' => 'index', 
    'uses' => 'IndexController@index'
  ]
)->where('name', '|index');

Route::get('blog_one', 'BlogsController@blog_one');
Route::get('blog_two', 'BlogsController@blog_two');
Route::get('contact', 'ContactController@index');
Route::get('invest', 'InvestController@index');

